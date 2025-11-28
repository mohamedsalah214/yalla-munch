<div class="col">
    <div class="product-item">
        <figure>
            <a href="{{ route('shop.show', $product->slug) }}" title="{{ $product->name }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="tab-image">
            </a>
        </figure>
        <div class="d-flex flex-column text-center">
            <h3 class="fs-6 fw-normal">{{ $product->name }}</h3>
            <div class="d-flex justify-content-center align-items-center gap-2">
                <span class="text-dark fw-semibold">{{ $product->price }} {{ __('messages.currency') }}</span>
            </div>
            <div class="button-area p-3 pt-0">
                <div class="row g-1 mt-2">
                    <div class="col-3">
                        <input type="number" name="quantity" min="1"
                            class="form-control border-dark-subtle input-number quantity" value="1">
                    </div>
                    <div class="col-7">
                        <a href="#" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart add-to-cart-btn"
                            data-id="{{ $product->id }}"
                            data-price="{{ $product->weights->first()->price ?? $product->price }}">
                            <svg width="18" height="18">
                                <use xlink:href="#cart"></use>
                            </svg>
                            {{ __('messages.item-add-to-cart') }}
                        </a>
                    </div>
                    <div class="col-2">
                        <a href="#" class="btn btn-outline-dark rounded-1 p-2 fs-6 wishlist-btn"
                            data-id="{{ $product->id }}">
                            <svg width="18" height="18" class="wishlist-icon">
                                <use xlink:href="#heart"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.body.addEventListener('click', function(e) {
            const btn = e.target.closest('.add-to-cart-btn');
            if (!btn) return;
            e.preventDefault();
            const productId = btn.dataset.id;
            let price = btn.dataset.price;
            const productItem = btn.closest('.product-item');
            let qtyInput = null;
            if (productItem) {
                qtyInput = productItem.querySelector('input[name="quantity"], .quantity');
            }
            let quantity = 1;
            if (qtyInput) {
                const v = parseInt(qtyInput.value, 10);
                quantity = (isNaN(v) || v < 1) ? 1 : v;
                qtyInput.value = quantity;
            }
            price = parseFloat(price);
            if (isNaN(price)) {
                price = 0;
            }
            const payload = {
                product_id: productId,
                quantity: quantity,
                price: price
            };
            fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        const cartCount = document.getElementById('cart-count');
                        if (cartCount) {
                            if (data.cart_count !== undefined) {
                                cartCount.textContent = data.cart_count;
                            } else {
                                const current = parseInt(cartCount.textContent) || 0;
                                cartCount.textContent = current + 1;
                            }
                            cartCount.classList.add('animate__animated', 'animate__rubberBand');
                            setTimeout(() => cartCount.classList.remove('animate__animated',
                                'animate__rubberBand'), 900);
                        }
                        // console.log('تمت إضافة المنتج للسلة');
                    } else {
                        // console.error('فشل الإضافة:', data);
                        // alert('❌ فشل في إضافة المنتج للسلة');
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                    // alert('حدث خطأ، تأكد من الاتصال');
                });
        }); // end event delegation
    });

    document.addEventListener("DOMContentLoaded", function() {
        document.body.addEventListener('click', function(e) {
            const btn = e.target.closest('.wishlist-btn');
            if (!btn) return;
            e.preventDefault();
            const productId = btn.dataset.id;
            const icon = btn.querySelector('.wishlist-icon use');
            fetch("{{ route('wishlist.toggle') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'added') {
                        icon.setAttribute('xlink:href', '#heart-fill');
                        btn.classList.remove('btn-outline-dark');
                        btn.classList.add('btn-danger');
                    }
                    if (data.status === 'removed') {
                        icon.setAttribute('xlink:href', '#heart');
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-outline-dark');
                    }
                })
                .catch(err => console.error(err));
        });
    });
</script>
