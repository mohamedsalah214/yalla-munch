@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-detail-image mb-4">
                        <img src="{{ asset('storage/' . $product->image) }}" width="500px" alt="Product Detail"
                            class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white shadow border rounded-4 p-5">
                        <div class="fs-5">{{ $product->category->name }}</div>
                        <h3 class="mb-3">{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <div class="product-options mt-4 mb-4">
                            <h6 class="fw-semibold mb-2">Choose Weight:</h6>
                            <div class="d-flex flex-wrap gap-3 mb-4">
                                <div class="weights d-flex gap-3">
                                    @foreach ($product->weights as $weight)
                                        <label class="custom-radio">
                                            <input class="weight-option" type="radio" name="weight"
                                                value="{{ $weight->id }}" id="weight{{ $weight->label }}"
                                                data-price="{{ $weight->price }}" {{ $loop->first ? 'checked' : '' }}>
                                            <span>{{ $weight->label }} GM</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <h6 class="fw-semibold mb-2">Quantity:</h6>
                            <div class="input-group" style="max-width: 150px;">
                                <button type="button" class="btn btn-outline-secondary" id="minus-btn">-</button>
                                <input type="number" name="quantity" id="quantity" class="form-control text-center"
                                    value="1" min="1">
                                <button type="button" class="btn btn-outline-secondary" id="plus-btn">+</button>
                            </div>
                        </div>
                        <h3 class="fw-bold mt-3">
                            <span id="price">{{ $product->weights->first()->price ?? '0.00' }}</span>
                            {{ __('messages.currency') }}
                        </h3>
                        <div class="d-grid gap-3 mt-4">
                            <a href="#" id="addToCartBtn"
                                class="btn btn-primary btn-lg rounded-4 p-3 fs-6 d-flex align-items-center justify-content-center gap-2">
                                <svg width="18" height="18">
                                    <use xlink:href="#cart"></use>
                                </svg>
                                Add to Cart
                            </a>
                            <a href="{{ route('cart.index') }}"
                                class="btn btn-outline-primary btn-lg rounded-4 p-3 fs-6 d-flex align-items-center justify-content-center gap-2">
                                <svg width="18" height="18">
                                    <use xlink:href="#zap"></use>
                                </svg>
                                Buy Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="popular-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">Most popular products</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">View All</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                                <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            @foreach ($products as $product)
                                <x-product-item-slide :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-4 my-4">
        <div class="container-lg">
            <div class="bg-warning pt-5 rounded-5">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                            <h2 class="mt-5">Download Organic App</h2>
                            <p>Online Orders made easy, fast and reliable</p>
                            <div class="d-flex gap-2 flex-wrap mb-5">
                                <a href="#" title="App store"><img
                                        src="{{ asset('assets/images/img-app-store.png') }}" alt="app-store"></a>
                                <a href="#" title="Google Play"><img
                                        src="{{ asset('assets/images/img-google-play.png') }}" alt="google-play"></a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img src="{{ asset('assets/images/banner-onlineapp.png') }}" alt="phone" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-lg">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="#package"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Free delivery</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="#secure"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>100% secure payment</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="#quality"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Quality guarantee</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="#savings"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>guaranteed savings</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use xlink:href="#offers"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Daily offers</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantity');
            const priceDisplay = document.getElementById('price');
            const weightRadios = document.querySelectorAll('.weight-option');
            const plusBtn = document.getElementById('plus-btn');
            const minusBtn = document.getElementById('minus-btn');

            function updatePrice() {
                const selectedWeight = document.querySelector('.weight-option:checked');
                if (!selectedWeight) return;

                const basePrice = parseFloat(selectedWeight.dataset.price);
                const quantity = parseInt(quantityInput.value) || 1;
                const total = basePrice * quantity;

                priceDisplay.textContent = total.toFixed(2);
            }

            // ✅ عند تغيير الوزن
            weightRadios.forEach(radio => {
                radio.addEventListener('change', updatePrice);
            });

            // ✅ عند تغيير العدد يدويًا
            quantityInput.addEventListener('input', updatePrice);

            // ✅ عند الضغط على زر +
            plusBtn.addEventListener('click', () => {
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updatePrice();
            });

            // ✅ عند الضغط على زر -
            minusBtn.addEventListener('click', () => {
                if (quantityInput.value > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updatePrice();
                }
            });

            // ✅ أول تحميل للصفحة — نحسب السعر الافتراضي بناءً على أول وزن
            updatePrice();
        });


        document.getElementById('addToCartBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const productId = {{ $product->id }};
            const weight = document.querySelector('.weight-option:checked').value;
            const price = parseFloat(document.querySelector('.weight-option:checked').dataset.price);
            const quantity = parseInt(document.getElementById('quantity').value);
            fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        weight: weight,
                        price: price,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // رسالة نجاح
                        // alert('✅ تم إضافة المنتج إلى السلة بنجاح');

                        // تحديث عداد السلة
                        const cartCount = document.getElementById('cart-count');
                        if (cartCount) {
                            if (data.cart_count !== undefined) {
                                cartCount.textContent = data.cart_count;
                            } else {
                                cartCount.textContent = parseInt(cartCount.textContent) + 1;
                            }

                            // حركة خفيفة على البادج
                            cartCount.classList.add('animate__animated', 'animate__rubberBand');
                            setTimeout(() => {
                                cartCount.classList.remove('animate__animated', 'animate__rubberBand');
                            }, 1000);
                        }
                    } else {
                        alert('❌ فشل في إضافة المنتج للسلة');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>



@endsection
