<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Country;
use App\Models\City;
use App\Models\Area;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems  = session('cart', []); // افتراض أن الكارت مخزن في السشن
        $total      = collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']);
        $country    = Country::all();
        $cities     = City::all();
        $areas      = Area::all();

        return view('checkout.index', compact('cartItems', 'total', 'cities', 'areas'));
    }

    public function store(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'firstname'     => 'required|string|max:120',
            'lastname'      => 'required|string|max:120',
            'phone'         => 'required|string|max:120',
            'email'         => 'email|required',
            'notes'         => 'nullable|string',
            'city'          => 'required|integer',
            'area'          => 'required|integer',
            'street'        => 'required|string',
            'property_type' => 'required|string',
            'building'      => 'required|string',
            'floor'         => 'required|string',
            'apartment'     => 'required|string',
        ]);

        $cartItems  = session('cart', []);

        // dd($cartItems);

        $total      = collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']);

        $order = Order::create([
            'user_id'           => 1,
            'firstname'         => $validated['firstname'],
            'lastname'          => $validated['lastname'],
            'phone'             => $validated['phone'],
            'email'             => $validated['email'],
            'city_id'           => $validated['city'],
            'area_id'           => $validated['area'],
            'street'            => $validated['street'],
            'property_type'     => $validated['property_type'],
            'building'          => $validated['building'],
            'floor'             => $validated['floor'],
            'apartment'         => $validated['apartment'],
            'order_number'      => 'ORD-' . strtoupper(uniqid()),
            'status'            => 'pending',
            'payment_status'    => 'unpaid',
            'payment_method'    => 'cash_on_delivery',
            'total_amount'      => $total,
            'notes'             => $validated['notes'] ?? '',
        ]);

        // dd($cartItems);

        foreach ($cartItems as $item) {
            $weightLabel = is_object($item['weight']) ? $item['weight']->label : $item['weight'];
            $order->items()->create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'quantity'   => $item['quantity'],
                'weight'     => $weightLabel, // مثلاً تخزن الـ label "250"
                'price'      => $item['price'],
                'subtotal'   => $item['total'],
            ]);
        }



        // بعد إنشاء الطلب ممكن تمسح السلة من السشن
        // session()->forget('cart');

        // نروح لصفحة اختيار طريقة الدفع للطلب الجديد
        return redirect()->route('checkout.payment', $order->id);
    }


    // public function success()
    // {
    //     return view('checkout-success');
    // }

    public function payment(Order $order)
    {
        $paymentMethods = PaymentMethod::all();
        $cartItems      = session('cart', []);
        $total          = collect($cartItems)->sum(fn($item) => $item['price'] * $item['quantity']);
        return view('checkout.payment', compact('order', 'paymentMethods', 'cartItems', 'total'));
    }

    public function processPayment(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_method' => 'required|integer',
        ]);

        $order->update(['payment_method' => $validated['payment_method']]);

        // if ($validated['payment_method'] === 'online') {
        // dd($validated['payment_method']);
        return $this->payWithPaymobUnified($order);
        //

        return redirect()->route('checkout.success')->with('success', 'تم اختيار الدفع عند الاستلام!');
    }

    private function payWithPaymobUnified(Order $order)
    {
        $apiKey = env('PAYMOB_API_KEY');
        $integrationId = (int) env('PAYMOB_INTEGRATION_ID');
        $iframeId = env('PAYMOB_IFRAME_ID');
        $baseUrl = rtrim(env('PAYMOB_BASE_URL', 'https://accept.paymob.com'), '/');

        $payload = [
            "amount" => (int) round($order->total_amount * 100),
            "currency" => "EGP",
            "payment_methods" => [$integrationId],
            "items" => [
                [
                    "name" => "Order #{$order->id}",
                    "amount" => (int) round($order->total_amount * 100),
                    "description" => "Order payment",
                    "quantity" => 1
                ]
            ],
            "billing_data" => [
                "apartment" => $order->apartment ?? 'NA',
                "first_name" => $order->firstname ?? 'NA',
                "last_name" => $order->lastname ?? 'NA',
                "street" => $order->street ?? 'NA',
                "building" => $order->building ?? 'NA',
                "phone_number" => $order->phone ?? 'NA',
                "city" => optional($order->city)->name ?? 'Cairo',
                "country" => 'EG',
                "email" => $order->email ?? 'no-reply@example.com',
                "floor" => $order->floor ?? 'NA',
                "state" => 'NA'
            ],
            "special_reference" => "order_{$order->id}",
            "expiration" => 3600,
            "notification_url" => env('PAYMOB_NOTIFICATION_URL', 'https://webhook.site/xxxxxx'),
            "redirection_url" => route('checkout.success'),
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $apiKey,
            'Content-Type' => 'application/json'
        ])->post($baseUrl . '/v1/intention', $payload);

        Log::info('Paymob Response', ['body' => $response->body()]);

        // dd($response->json());

        if (!$response->successful()) {
            // handle error - سجل اللوق أو ارجع رسالة واضحة للمستخدم
            Log::error('Paymob intention failed', ['response' => $response->body()]);
            abort(500, 'Payment gateway error');
        }

        $json = $response->json();

        // اضمن وجود payment_keys
        if (empty($json['payment_keys'][0]['key'])) {
            Log::error('Paymob no payment key', ['resp' => $json]);
            abort(500, 'Payment token not returned');
        }

        $paymentToken = $json['payment_keys'][0]['key'];

        return redirect("https://accept.paymob.com/api/acceptance/iframes/{$iframeId}?payment_token={$paymentToken}");
    }

    public function success()
    {
        return view('checkout-success');
    }

    // public function processPayment(Request $request, Order $order)
    // {
    //     $validated = $request->validate([
    //         'payment_method' => 'required|string|in:cod,online',
    //     ]);

    //     // تحديث طريقة الدفع للطلب
    //     $order->update([
    //         'payment_method' => $validated['payment_method'],
    //     ]);

    //     // هنا ممكن تبدأ بوابة الدفع لو أونلاين
    //     if ($validated['payment_method'] === 'online') {
    //         // redirect to online payment gateway
    //         return redirect()->route('checkout.success')->with('success', 'تم الدفع أونلاين بنجاح!');
    //     }

    //     // إذا الدفع عند الاستلام
    //     return redirect()->route('checkout.success')->with('success', 'تم اختيار الدفع عند الاستلام!');
    // }
}
