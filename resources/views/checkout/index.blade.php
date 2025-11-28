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

                                <div class="mb-3">
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
                                </div>

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
                                    <div class="col-lg-12">
                                        <p>{{ __('messages.checkout-property') }}</p>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="property_type"
                                                id="apartment" value="apartment" required>
                                            <label class="form-check-label" for="apartment">
                                                {{ __('messages.checkout-apartment') }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="property_type"
                                                id="villa" value="villa" required>
                                            <label class="form-check-label" for="villa">
                                                {{ __('messages.checkout-villa') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label>{{ __('messages.checkout-building') }}*</label>
                                                    <input type="text" name="building" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label>{{ __('messages.checkout-floor') }}*</label>
                                                    <input type="text" name="floor" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label>{{ __('messages.checkout-apartment') }}*</label>
                                                    <input type="text" name="apartment" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                    <h5 class="text-end">{{ __('messages.checkout.total') }}: {{ $total }} EGP</h5>
                </div>
            </div>
        </div>

    </div>
@endsection
