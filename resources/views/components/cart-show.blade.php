<style>
    .offcanvas-wide {
        width: 500px !important;
    }

    .cart-items {
        max-height: calc(100vh - 160px);
        overflow-y: auto;
    }

    .cart-items::-webkit-scrollbar {
        width: 6px;
    }

    .cart-items::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 3px;
    }
</style>

<div class="offcanvas offcanvas-end offcanvas-wide" data-bs-scroll="true" tabindex="-1" id="offcanvasCart">
    <div class="offcanvas-header justify-content-between align-items-center">
        <h5 class="offcanvas-title">{{ __('messages.sidnav-cart') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-0">

        <!-- 🔹 المنتجات -->
        <div class="cart-items flex-grow-1 overflow-auto px-4">
            <h6 class="text-primary mb-3">{{ __('messages.sidnav-products-plus') }}</h6>
            <ul class="list-group mb-3">
                @foreach ($items as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-muted">
                                {{ __('messages.sidnav-price') }}: {{ $item['price'] }} × {{ $item['quantity'] }}
                            </small>
                        </div>
                        <strong>{{ $item['total'] }} {{ __('messages.currency') }}</strong>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- 🔹 المجموع النهائي ثابت -->
        <div class="cart-footer bg-light border-top p-4 mt-auto">
            <div class="d-flex justify-content-between mb-3">
                <span class="fw-bold">{{ __('messages.sidnav-total') }}:</span>
                <strong class="fs-5 text-primary">
                    {{ array_sum(array_column($items, 'total')) }} {{ __('messages.currency') }}
                </strong>
            </div>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100 py-3 fs-6">{{ __('messages.sidnav-complete-order') }}</a>
        </div>

    </div>
</div>
