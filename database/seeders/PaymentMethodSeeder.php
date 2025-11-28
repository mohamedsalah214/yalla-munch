<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    public function run(): void
    {
        $methods = [
            ['name_en' => 'Cash on Delivery', 'name_ar' => 'الدفع عند الاستلام'],
            ['name_en' => 'Credit Card',      'name_ar' => 'بطاقة ائتمان'],
            ['name_en' => 'Wallet',           'name_ar' => 'المحفظة'],
        ];

        foreach ($methods as $method) {
            PaymentMethod::create($method);
        }
    }
}
