<div class="preloader-wrapper">
    <div class="preloader">
    </div>
</div>

@php
    $cartItems = session()->get('cart', []);
@endphp
{{-- @dd($cartItems) --}}
<x-cart-show :items="$cartItems" />


{{-- <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Growers cider</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Fresh grapes</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Heinz tomato ketchup</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </div>
    </div>
</div> --}}

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">

    <div class="offcanvas-header justify-content-between">
        <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">

        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            <li class="nav-item border-dashed active">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#fruits"></use>
                    </svg>
                    <span>Fruits and vegetables</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#dairy"></use>
                    </svg>
                    <span>Dairy and Eggs</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#meat"></use>
                    </svg>
                    <span>Meat and Poultry</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#seafood"></use>
                    </svg>
                    <span>Seafood</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#bakery"></use>
                    </svg>
                    <span>Bakery and Bread</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#canned"></use>
                    </svg>
                    <span>Canned Goods</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#frozen"></use>
                    </svg>
                    <span>Frozen Foods</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#pasta"></use>
                    </svg>
                    <span>Pasta and Rice</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#breakfast"></use>
                    </svg>
                    <span>Breakfast Foods</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#snacks"></use>
                    </svg>
                    <span>Snacks and Chips</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <button
                    class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                    data-bs-toggle="collapse" data-bs-target="#beverages-collapse" aria-expanded="false">
                    <div class="d-flex gap-3">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#beverages"></use>
                        </svg>
                        <span>Beverages</span>
                    </div>
                </button>
                <div class="collapse" id="beverages-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                        <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Water</a></li>
                        <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Juice</a></li>
                        <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Soda</a></li>
                        <li class="border-bottom py-2"><a href="index.html" class="dropdown-item">Tea</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#spices"></use>
                    </svg>
                    <span>Spices and Seasonings</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#baby"></use>
                    </svg>
                    <span>Baby Food and Formula</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#health"></use>
                    </svg>
                    <span>Health and Wellness</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#household"></use>
                    </svg>
                    <span>Household Supplies</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#personal"></use>
                    </svg>
                    <span>Personal Care</span>
                </a>
            </li>
            <li class="nav-item border-dashed">
                <a href="index.html" class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#pet"></use>
                    </svg>
                    <span>Pet Food and Supplies</span>
                </a>
            </li>
        </ul>

    </div>

</div>

<header>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">
            <div
                class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                <div class="d-flex align-items-center my-3 my-sm-0">
                    <a href="{{ route('/') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid"
                            width="90px">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#menu"></use>
                    </svg>
                </button>
            </div>
            <div class="col-lg-8">
                <ul
                    class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark mt-4">
                    <li class="nav-item active">
                        <a href="{{ route('shop.index') }}" class="nav-link">Shop</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pe-3" role="button" id="pages"
                            data-bs-toggle="dropdown" aria-expanded="false">Nuts</a>
                        <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                            <li><a href="{{ route('shop.roasted-nuts') }}" class="dropdown-item">Roasted Nuts</a></li>
                            <li><a href="{{ route('shop.raw-nuts') }}" class="dropdown-item">Raw Nuts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.crackers') }}" class="nav-link">Crackers</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.seeds') }}" class="nav-link">Seeds</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.candies') }}" class="nav-link">Candies</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.chocolates') }}" class="nav-link">Chocolates</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('shop.healthy-range') }}" class="nav-link">Healthy Range</a>
                    </li>
                </ul>
            </div>

            <div
                class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <li>
                        <a href="#" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#wishlist"></use>
                            </svg>
                        </a>
                    </li>
                    <li>

                        {{-- <a href="{{ route('cart.index') }}" class="cart-icon position-relative">
                            <svg width="24" height="24">
                                <use xlink:href="#cart"></use>
                            </svg>
                            <span id="cart-count"
                                class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle rounded-pill">
                                {{ session('cart') ? count(session('cart')) : 0 }}
                            </span>
                        </a> --}}

                        {{-- <a href="#" class="cart-icon position-relative" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24">
                                <use xlink:href="#shopping-bag"></use>
                            </svg>
                            <span id="cart-count"
                                class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle rounded-pill">
                                {{ session('cart') ? count(session('cart')) : 0 }}
                            </span>
                        </a> --}}

                        <a href="#" class="cart-icon position-relative" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24">
                                <use xlink:href="#shopping-bag"></use>
                            </svg>
                            <span id="cart-count"
                                class="badge bg-warning text-dark position-absolute top-0 start-100 translate-middle rounded-pill">
                                {{ session('cart') ? count(session('cart')) : 0 }}
                            </span>
                        </a>

                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
