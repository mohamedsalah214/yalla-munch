@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')

    <x-breadcrumb :items="[
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Shop', 'url' => 'shop'],
        // ['name' => $requestCategory, 'url' => 'shop'],
        ['name' => $requestCategory],
    ]" />

    {{-- <div class="container-lg mb-4">
        <nav aria-label="breadcrumb" class="first d-md-flex mt-4">
            <ol class="breadcrumb indigo lighten-6">
                <li class="breadcrumb-item p-0">
                    <a class="black-text active-2" href="#">
                        <span>HOME</span>
                    </a>
                    <img class="ml-md-3 ml-1" src="https://img.icons8.com/metro/50/000000/chevron-right.png " width="15"
                        height="15">
                </li>
                <li class="breadcrumb-item p-0">
                    <a class="black-text active-2" href="#">
                        <span>Cooking</span>
                    </a>
                    <img class="ml-md-3 ml-1" src="https://img.icons8.com/metro/50/000000/chevron-right.png " width="15"
                        height="15">
                </li>
                <li class="breadcrumb-item p-0">
                    <a class="black-text active-2  " href="#">
                        <span>Baking</span>
                    </a>
                    <img class="ml-md-3 ml-1" src="https://img.icons8.com/metro/50/000000/chevron-right.png " width="15"
                        height="15">
                </li>
                <li class="breadcrumb-item p-0">
                    <a class="black-text active-1 active-2" href="#">
                        <span class="pe-2">Bread shape</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div> --}}

    {{-- <section class="mt-4 pb-5 overflow-hidden">
        <div class="container-lg">
            <h1>Categories</h1>
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
            <div class="row justify-content-center">
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
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            Filter
                        </div>
                        <div class="card-body">
                            <!-- Categories -->
                            <h6>Categories</h6>
                            <ul class="list-unstyled">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('shop.' . $category->slug) }}" class="text-decoration-none">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <!-- Price Range -->
                            <h6>Price</h6>
                            <form method="GET" action="{{ route('shop.index') }}">
                                <div class="mb-2">
                                    <input type="number" name="min_price" class="form-control" placeholder="Min">
                                </div>
                                <div class="mb-2">
                                    <input type="number" name="max_price" class="form-control" placeholder="Max">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm w-100">Apply</button>
                            </form>
                            <hr>
                            <!-- Other filters (Optional) -->
                            <h6>Sort By</h6>
                            <select class="form-select" onchange="this.form.submit()" name="sort">
                                <option value="">Default</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                                <option value="newest">Newest</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header d-flex flex-wrap justify-content-between mb-4">
                                <h2 class="section-title">Best selling products</h2>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="btn btn-primary rounded-1">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div
                                class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-4">
                                @foreach ($products as $product)
                                    <x-product-item :product="$product" />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <section class="py-5 bg-warning">
        <div class="container-lg">
            <div class="text-center">
                <h4>We'd love to hear your thoughts</h4>
                <button class="btn btn-primary mt-3">Back to home</button>
            </div>
        </div>
    </section>

@endsection
