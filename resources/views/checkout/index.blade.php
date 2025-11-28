@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="row">

            <div class="col-lg-7">
                <div class="p-5 border rounded-3 shadow">
                    <h2 class="mb-4">{{ __('messages.checkout-title') }}</h2>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Library</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                    </nav>

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mt-3 mb-4">

                                <h4 class="mt-4">{{ __('messages.checkout-customer-info') }}</h4>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>{{ __('messages.checkout-firstname') }}*</label>
                                            <input type="text" name="firstname" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>{{ __('messages.checkout-lastname') }}*</label>
                                            <input type="text" name="lastname" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>{{ __('messages.checkout-phone') }}*</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>{{ __('messages.checkout-email') }}*</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>{{ __('messages.checkout-notes') }}</label>
                                    <textarea name="notes" class="form-control"></textarea>
                                </div>

                            </div>

                            <hr>

                            <div class="col-md-12 mb-4">

                                <h4 class="mt-4">{{ __('messages.checkout-order-type') }}</h4>
                                <style>
                                    .order-option {
                                        cursor: pointer;
                                    }

                                    .option-box {
                                        width: 100%;
                                        padding: 18px 20px;
                                        border: 2px solid #ddd;
                                        border-radius: 12px;
                                        transition: border-color .18s ease, background .18s ease;
                                        display: flex;
                                        align-items: center;
                                        justify-content: space-between;
                                    }

                                    /* hover */
                                    .order-option:hover .option-box {
                                        border-color: #f79e1e;
                                    }

                                    /* reserve space for the icon so text won't move */
                                    .check-icon {
                                        width: 22px;
                                        /* ثابت عشان يحجز المساحة */
                                        height: 22px;
                                        border-radius: 50%;
                                        background: #f79e1e;
                                        color: #fff;
                                        display: inline-flex;
                                        align-items: center;
                                        justify-content: center;

                                        /* مخفي بصريًا لكن موجود في الـ flow (لا يحرك العناصر) */
                                        opacity: 0;
                                        visibility: hidden;
                                        transform: scale(.8);
                                        transition: opacity .15s ease, transform .15s ease, visibility .15s;
                                    }

                                    /* حالة الاختيار — نظهر الايقونة بطريقة سلسة */
                                    .order-radio:checked+.option-box {
                                        border-color: #f79e1e;
                                        background: #fff8ef;
                                    }

                                    .order-radio:checked+.option-box .check-icon {
                                        opacity: 1;
                                        visibility: visible;
                                        transform: scale(1);
                                    }

                                    /* صغيرة لتحسين تباعد العنوان لو طويل */
                                    .option-box h6 {
                                        margin: 0;
                                        font-weight: 600;
                                        font-size: 1rem;
                                    }
                                </style>

                                <div class="mb-3 mt-4">
                                    <div class="d-flex gap-3 flex-wrap">
                                        <label class="order-option flex-grow-1" for="normalOrder" style="flex-basis: 0;">
                                            <input type="radio" class="d-none order-radio" name="order_type"
                                                id="normalOrder" value="normal" checked>
                                            <div class="option-box w-100">
                                                <h6 class="m-0">Normal Order</h6>
                                                <span class="check-icon">✔</span>
                                            </div>
                                        </label>

                                        <label class="order-option flex-grow-1" for="giftOrder" style="flex-basis: 0;">
                                            <input type="radio" class="d-none order-radio" name="order_type"
                                                id="giftOrder" value="gift">
                                            <div class="option-box w-100">
                                                <h6 class="m-0">Gift Order</h6>
                                                <span class="check-icon">✔</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>



                                <div id="giftFields" style="display:none;" class="mt-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Recipient Name *</label>
                                                <input type="text" name="recipient_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Recipient Phone *</label>
                                                <input type="text" name="recipient_phone" class="form-control">
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const normal = document.getElementById("normalOrder");
                                        const gift = document.getElementById("giftOrder");
                                        const giftFields = document.getElementById("giftFields");

                                        function toggleGift() {
                                            if (gift.checked) {
                                                giftFields.style.display = "block";
                                            } else {
                                                giftFields.style.display = "none";
                                            }
                                        }

                                        normal.addEventListener("change", toggleGift);
                                        gift.addEventListener("change", toggleGift);

                                        toggleGift(); // للتأكيد عند تحميل الصفحة
                                    });
                                </script>


                                {{-- <div class="mb-3">
                                    <label class="form-label">Order Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="order_type" id="normalOrder"
                                            value="normal" checked>
                                        <label class="form-check-label" for="normalOrder">
                                            Normal Order
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="order_type" id="giftOrder"
                                            value="gift">
                                        <label class="form-check-label" for="giftOrder">
                                            Gift Order
                                        </label>
                                    </div>
                                </div> --}}

                            </div>

                            <hr>

                            <div class="col-lg-12 mb-4">

                                <h4 class="mt-4">{{ __('messages.checkout-shipping') }}</h4>

                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>{{ __('messages.checkout-city') }}*</label>
                                            <select name="city" class="form-control" required>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">
                                                        {{ app()->getLocale() === 'ar' ? $city->name_ar : $city->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label>{{ __('messages.checkout-area') }}*</label>
                                            <select name="area" class="form-control" required>
                                                @foreach ($areas as $area)
                                                    <option value="{{ $area->id }}">
                                                        {{ app()->getLocale() === 'ar' ? $area->name_ar : $area->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>{{ __('messages.checkout-street') }}*</label>
                                            <input type="text" name="street" class="form-control" required>
                                        </div>
                                    </div>
                                    <style>
                                        .inline-radio {
                                            display: flex;
                                            align-items: center;
                                            gap: 6px;
                                            margin-right: 25px;
                                            cursor: pointer;
                                        }

                                        .inline-radio input[type="radio"] {
                                            width: 18px;
                                            height: 18px;
                                            cursor: pointer;
                                        }

                                        .inline-radio {
                                            display: flex;
                                            align-items: center;
                                            margin-right: 20px;
                                            cursor: pointer;
                                        }

                                        /* نخفي الـ radio الأصلي */
                                        .inline-radio input[type="radio"] {
                                            display: none;
                                        }

                                        /* شكل الـ custom radio */
                                        .inline-radio span {
                                            position: relative;
                                            padding-left: 25px;
                                            color: #333;
                                            font-weight: 500;
                                        }

                                        /* الدائرة الصغيرة للـ check */
                                        .inline-radio span::before {
                                            content: '';
                                            position: absolute;
                                            left: 0;
                                            top: 50%;
                                            transform: translateY(-50%);
                                            width: 18px;
                                            height: 18px;
                                            border: 2px solid #ddd;
                                            border-radius: 50%;
                                            background-color: #fff;
                                            transition: all 0.2s;
                                        }

                                        /* لما يكون مختار */
                                        .inline-radio input[type="radio"]:checked+span::before {
                                            border-color: #f79e1e;
                                            background-color: #f79e1e;
                                        }

                                        /* نقطة صغيرة داخل الدائرة عند الاختيار */
                                        .inline-radio input[type="radio"]:checked+span::after {
                                            content: '';
                                            position: absolute;
                                            left: 5px;
                                            top: 50%;
                                            transform: translateY(-50%);
                                            width: 8px;
                                            height: 8px;
                                            background-color: #fff;
                                            border-radius: 50%;
                                        }
                                    </style>

                                    <div class="col-lg-12">
                                        <p>{{ __('messages.checkout-property') }}</p>

                                        <div class="d-flex mb-3">
                                            <label class="inline-radio" for="apartment">
                                                <input type="radio" name="property_type" id="apartment"
                                                    value="apartment" checked>
                                                <span>{{ __('messages.checkout-apartment') }}</span>
                                            </label>

                                            <label class="inline-radio" for="villa">
                                                <input type="radio" name="property_type" id="villa"
                                                    value="villa">
                                                <span>{{ __('messages.checkout-villa') }}</span>
                                            </label>
                                        </div>

                                        <!-- Apartment Fields -->
                                        <div id="apartment-fields">
                                            <div class="row">
                                                <div class="col-lg-4 mb-3">
                                                    <label>{{ __('messages.checkout-building') }}*</label>
                                                    <input type="text" name="apartment_building" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <label>{{ __('messages.checkout-floor') }}*</label>
                                                    <input type="text" name="apartment_floor" class="form-control"
                                                        required>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <label>{{ __('messages.checkout-apartment') }}*</label>
                                                    <input type="text" name="apartment_number" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Villa Fields -->
                                        <div id="villa-fields" style="display:none;">
                                            <div class="col-lg-4 mb-3">
                                                <label>{{ __('messages.checkout-building') }}*</label>
                                                <input type="text" name="villa_building" class="form-control"
                                                    >
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        const apartmentRadio = document.getElementById('apartment');
                                        const villaRadio = document.getElementById('villa');
                                        const apartmentFields = document.getElementById('apartment-fields');
                                        const villaFields = document.getElementById('villa-fields');

                                        function togglePropertyFields() {
                                            if (apartmentRadio.checked) {
                                                apartmentFields.style.display = 'block';
                                                villaFields.style.display = 'none';
                                            } else if (villaRadio.checked) {
                                                apartmentFields.style.display = 'none';
                                                villaFields.style.display = 'block';
                                            }
                                        }
                                        apartmentRadio.addEventListener('change', togglePropertyFields);
                                        villaRadio.addEventListener('change', togglePropertyFields);
                                        window.addEventListener('DOMContentLoaded', togglePropertyFields);
                                    </script>



                                </div>

                            </div>

                            <hr>

                            <button type="submit" class="btn btn-primary mt-3 w-100 py-3 rounded-4">
                                {{ __('messages.checkout-confirm-order') }}
                            </button>

                        </div>
                    </form>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="p-5 border rounded-3 shadow">
                    <h4>{{ __('messages.checkout-order-summary') }}</h4>
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
                    <h5 class="text-end">{{ __('messages.checkout-total') }}: {{ $total }} EGP</h5>
                </div>
            </div>
        </div>

    </div>
@endsection
