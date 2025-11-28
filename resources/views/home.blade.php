@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/cover-1.jpg') }}" class="d-block w-100" alt="Slide 1" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/cover-1.jpg') }}" class="d-block w-100" alt="Slide 2" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/images/cover-1.jpg') }}" class="d-block w-100" alt="Slide 3" height="500">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('messages.home-previous') }}</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">{{ __('messages.home-next') }}</span>
        </button>
    </div>

    <section class="">
        <div class="container">
            <h2 class="mt-5 text-center">{{ __('messages.home-category') }}</h2>
            <div class="row justify-content-center align-items-center mt-5">
                @foreach ($categories as $categoryItem)
                    <div class="col-lg-4 mb-3">
                        <a href="{{ route('shop.' . $categoryItem->slug) }}" class="text-decoration-none">
                            <div class="bg-light rounded-3 d-flex justify-content-between align-items-center">
                                <span class="ps-4 fs-5">{{ $categoryItem['name'] }}</span>
                                <span class="d-flex justify-content-end">
                                    <img src="{{ asset('storage/' . $categoryItem->image) }}" alt=""
                                        class="rounded-3" width="150px">
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- <section class="py-5 overflow-hidden">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">{{ __('messages.home-category') }}</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">{{ __('messages.home-view-all') }}</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($categories as $categoryItem)
                                <a href="{{ route('shop.' . $categoryItem->slug) }}"
                                    class="nav-link swiper-slide text-center">
                                    <img src="{{ asset('storage/' . $categoryItem->image) }}" class="rounded-circle"
                                        alt="Category Thumbnail" width="100px">
                                    <h4 class="fs-6 mt-3 fw-normal category-title">{{ $categoryItem['name'] }}</h4>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="pb-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">{{ __('messages.home-best-selling') }}</h2>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('shop.index') }}"
                                class="btn btn-primary rounded-1">{{ __('messages.home-view-all') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div
                        class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                        @foreach ($latestProducts as $latestProduct)
                            <x-product-item :product="$latestProduct" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="py-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-blocks">

                        <div class="banner-ad d-flex align-items-center large bg-info block-1"
                            style="background: url('assets/images/banner-ad-1.jpg') no-repeat; background-size: cover;">
                            <div class="banner-content p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">{{ __('messages.home-items-sale') }}</h3>
                                    <p>Discounts up to 30%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="banner-ad bg-success-subtle block-2"
                            style="background:url('assets/images/banner-ad-2.jpg') no-repeat;background-size: cover">
                            <div class="banner-content align-items-center p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">Combo offers</h3>
                                    <p>Discounts up to 50%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="banner-ad bg-danger block-3"
                            style="background:url('assets/images/banner-ad-3.jpg') no-repeat;background-size: cover">
                            <div class="banner-content align-items-center p-5">
                                <div class="content-wrapper text-light">
                                    <h3 class="banner-title text-light">Discount Coupons</h3>
                                    <p>Discounts up to 40%</p>
                                    <a href="#" class="btn-link text-white">Shop Now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section id="featured-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex flex-wrap justify-content-between my-4">
                        <h2 class="section-title">{{ __('messages.home-featured-products') }}</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">{{ __('messages.home-view-all') }}</a>
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
                            @foreach ($latestProducts as $latestProduct)
                                <x-product-item-slide :product="$latestProduct" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="">
        <div class="container-lg">
            <div class="row justify-content-center">
                <div class="col-lg-6 pe-0">
                    <div class="bg-warning text-light py-5 px-5 rounded-4 rounded-end-0">
                        <p>Don't overthink it.</p>
                        <h3>Greatest Hits</h3>
                        <p>From freshly roasted nuts to hand-crafted chocolates, these are the bold, top-quality favorites
                            that
                            define us.</p>
                        <button class="btn btn-dark rounded-1 p-2 fs-7">Try our Greatest Hits</button>
                    </div>
                </div>
                <div class="col-lg-6 ps-0">
                    <img src="{{ asset('assets/images/cover-1.jpg') }}" alt="" class="rounded-4 rounded-start-0"
                        height="302px" width="100%">
                </div>
            </div>
        </div>
    </section>

    {{-- <section>
        <div class="container-lg">
            <div class="bg-secondary text-light py-5 my-5"
                style="background: url('assets/images/banner-newsletter.jpg') no-repeat; background-size: cover;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-5 p-3">
                            <div class="section-header">
                                <h2 class="section-title display-5 text-light">Get 25% Discount on your first purchase
                                </h2>
                            </div>
                            <p>Just Sign Up & Register it now to become member.</p>
                        </div>
                        <div class="col-md-5 p-3">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label d-none">Name</label>
                                    <input type="text" class="form-control form-control-md rounded-0" name="name"
                                        id="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label d-none">Email</label>
                                    <input type="email" class="form-control form-control-md rounded-0" name="email"
                                        id="email" placeholder="Email Address">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-dark btn-md rounded-0">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="popular-products" class="products-carousel">
        <div class="container-lg overflow-hidden py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">{{ __('messages.home-most-popular') }}</h2>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('shop.index') }}"
                                class="btn btn-primary me-2">{{ __('messages.home-view-all') }}</a>
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
                            @foreach ($latestProducts as $latestProduct)
                                <x-product-item-slide :product="$latestProduct" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="latest-products" class="products-carousel">
        <div class="container-lg overflow-hidden pb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header d-flex justify-content-between my-4">
                        <h2 class="section-title">{{ __('messages.home-just-arrived') }}</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary me-2">{{ __('messages.home-view-all') }}</a>
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
                            @foreach ($latestProducts as $latestProduct)
                                <x-product-item-slide :product="$latestProduct" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="pb-4 my-4">
        <div class="container-lg">
            <div class="bg-light py-5 rounded-5">
                <h2 class="mt-5 text-center">{{ __('messages.home-what-craving') }}</h2>

                <div class="text-center mt-5 d-flex flex-wrap justify-content-center">

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F9b01ce0b16e7442a94d34c01365d2b94?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Nuts</span>
                        </a>
                    </div>

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F4006f94b8e76420a9c492475d7dd1073?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Seeds</span>
                        </a>
                    </div>

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F9ce25705a59f4ef381ec8716031f14ad?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Chocolates</span>
                        </a>
                    </div>

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2Fc6a0661a377d46a1b7c9c8fa185c2751?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Snacks</span>
                        </a>
                    </div>

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F743355343dff43cf88e057d03f5ad111?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Mix Packs</span>
                        </a>
                    </div>

                    <div class="me-3 mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F327158853c9e4549a987414e9bf5eb04?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Gifts</span>
                        </a>
                    </div>

                    <div class="mb-4 craving-item">
                        <a href="" class="text-decoration-none d-block">
                            <img src="https://cdn.builder.io/api/v1/image/assets%2Feffc3d0f04d349b0a5da8c78825f92a5%2F6075fad3f27741538251af19369cb374?format=webp&width=2000"
                                width="170" class="craving-img">
                            <span class="d-block mt-2 fw-semibold text-dark">Seasonal</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>




    {{-- <section id="latest-blog" class="pb-4">
        <div class="container-lg">
            <div class="row">
                <div class="section-header d-flex align-items-center justify-content-between my-4">
                    <h2 class="section-title">Our Recent Blog</h2>
                    <a href="#" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src="{{ asset('assets/images/post-thumbnail-1.jpg') }}" alt="post"
                                    class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>22 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>tips & tricks</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Top 10 casual look ideas to dress up
                                        your kids</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src="{{ asset('assets/images/post-thumbnail-2.jpg') }}" alt="post"
                                    class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>25 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>trending</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">Latest trends of wearing street wears
                                        supremely</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="post-item card border-0 shadow-sm p-3">
                        <div class="image-holder zoom-effect">
                            <a href="#">
                                <img src="{{ asset('assets/images/post-thumbnail-3.jpg') }}" alt="post"
                                    class="card-img-top">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                                <div class="meta-date"><svg width="16" height="16">
                                        <use xlink:href="#calendar"></use>
                                    </svg>28 Aug 2021</div>
                                <div class="meta-categories"><svg width="16" height="16">
                                        <use xlink:href="#category"></use>
                                    </svg>inspiration</div>
                            </div>
                            <div class="post-header">
                                <h3 class="post-title">
                                    <a href="#" class="text-decoration-none">10 Different Types of comfortable
                                        clothes ideas for women</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim
                                    tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="pb-4 my-4">
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
                            <img src="{{ asset('assets/images/banner-onlineapp.png') }}" alt="phone"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    {{-- <section class="py-4">
        <div class="container-lg">
            <h2 class="my-4">People are also looking for</h2>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
        </div>
    </section> --}}

    {{-- <section class="py-5">
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
    </section> --}}


@endsection
