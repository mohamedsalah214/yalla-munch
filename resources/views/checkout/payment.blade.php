@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">{{ __('messages.checkout-title') }}</h2>
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5 shadow rounded-3">
                    <form action="{{ route('checkout.processPayment', $order->id) }}" method="POST">
                        @csrf

                        <h4 class="mb-4">{{ __('messages.checkout-choose-payment') }}</h4>
                        <div class="payment-methods">
                            @foreach ($paymentMethods as $method)
                                <div class="payment-card" onclick="selectPayment('{{ $method->id }}')">
                                    <input type="radio" name="payment_method" id="method-{{ $method->id }}"
                                        value="{{ $method->id }}" hidden>
                                    <label for="method-{{ $method->id }}" class="payment-label">
                                        <div class="left">
                                            <span class="circle"></span>
                                            <span
                                                class="title">{{ app()->getLocale() === 'ar' ? $method->name_ar : $method->name_en }}</span>
                                        </div>
                                        @if ($method->icon)
                                            <img src="{{ asset('images/payment/' . $method->icon) }}" alt="icon">
                                        @endif
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <!-- Checkbox for Terms -->
                        <div class="terms-card" onclick="toggleTerms()">
                            <input type="checkbox" id="terms" name="terms" hidden>
                            <label for="terms">
                                I have read and accepted all <a href="/terms" target="_blank">terms and conditions</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            {{ __('messages.checkout-complete-order') }}
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="p-5 border rounded-3 shadow">
                    <h4>{{ __('messages.checkout.order_summary') }}</h4>
                    <ul class="list-group mb-3">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $item['name'] }} ({{ $item['weight_label'] ?? '' }})
                                    <br>
                                    <small>x {{ $item['quantity'] }}</small>
                                </div>
                                <strong>{{ $item['price'] * $item['quantity'] }} EGP</strong>
                            </li>
                        @endforeach
                    </ul>
                    <h5 class="text-end">{{ __('messages.checkout.total') }}: {{ $total }} EGP</h5>
                </div>
            </div>
        </div>

    </div>

    <script>
        function selectPayment(id) {
            // Uncheck all
            document.querySelectorAll('.payment-card').forEach(card => card.classList.remove('active'));
            document.querySelectorAll('input[name="payment_method"]').forEach(r => r.checked = false);

            // Check the selected one
            document.getElementById('method-' + id).checked = true;
            document.querySelector('label[for="method-' + id + '"]').closest('.payment-card').classList.add('active');
        }

        function toggleTerms() {
            const checkbox = document.getElementById('terms');
            checkbox.checked = !checkbox.checked;
            document.querySelector('.terms-card').classList.toggle('active', checkbox.checked);
        }
    </script>

    <!-- Styles -->
    <style>
        .payment-methods {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .payment-card {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 14px 20px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .payment-card.active {
            border-color: #0d6efd;
            background-color: #f0f6ff;
        }

        .payment-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            cursor: pointer;
        }

        .payment-label .left {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .payment-label .circle {
            width: 18px;
            height: 18px;
            border: 2px solid #000;
            border-radius: 50%;
            position: relative;
        }

        .payment-card.active .circle {
            border-color: #0d6efd;
            background-color: #0d6efd;
            box-shadow: inset 0 0 0 3px white;
        }

        .payment-label img {
            height: 30px;
        }

        .terms-card {
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 12px 16px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .terms-card.active {
            background: #e7f1ff;
            border-color: #0d6efd;
        }

        .terms-card label {
            margin: 0;
            cursor: pointer;
        }
    </style>
@endsection
