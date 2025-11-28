<footer class="py-5">
    <div class="container-lg">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-menu">
                    <img src="{{ asset('assets/images/logo.png') }}" width="150" alt="logo">
                    <div class="social-links mt-3">
                        <ul class="d-flex list-unstyled gap-2">
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=61575143535376"
                                    class="btn btn-outline-light" target="_blank">
                                    <svg width="16" height="16">
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#" class="btn btn-outline-light">
                                    <svg width="16" height="16">
                                        <use xlink:href="#twitter"></use>
                                    </svg>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="#" class="btn btn-outline-light">
                                    <svg width="16" height="16">
                                        <use xlink:href="#youtube"></use>
                                    </svg>
                                </a>
                            </li> --}}
                            <li>
                                <a href="https://www.instagram.com/yalla_munch" class="btn btn-outline-light"
                                    target="_blank">
                                    <svg width="16" height="16">
                                        <use xlink:href="#instagram"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@yalla.munch" class="btn btn-outline-light"
                                    target="_blank">
                                    <img src="{{ asset('assets/icons/tiktok.svg') }}" width="16" height="16"
                                        alt="TikTok">
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/+201035187798" class="btn btn-outline-light" target="_blank">
                                    <img src="{{ asset('assets/icons/whatsapp-dark.svg') }}" width="16"
                                        height="16" alt="TikTok">
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#" class="btn btn-outline-light">
                                    <svg width="16" height="16">
                                        <use xlink:href="#amazon"></use>
                                    </svg>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Shop</h5>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="#" class="nav-link">About us</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Conditions </a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Our Journals</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Careers</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Affiliate Programme</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Ultras Press</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Categories</h5>
                    <ul class="menu-list list-unstyled">

                        @foreach ($categories as $categoryItem)
                            <li class="menu-item">
                                <a href="{{ route('shop.' . $categoryItem->slug) }}"
                                    class="nav-link">{{ $categoryItem['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Quick links</h5>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="#" class="nav-link">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('about') }}" class="nav-link">About us</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">FAQ</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="nav-link">Careers</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Customer Service</h5>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('privacy-policy') }}" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('returns-refunds') }}" class="nav-link">Returns & Refunds</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('cookie-guidelines') }}" class="nav-link">Cookie Guidelines</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('delivery-Information') }}" class="nav-link">Delivery Information</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('terms-conditions') }}" class="nav-link">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Subscribe Us</h5>
                    <p>Subscribe to our newsletter to get updates about our grand offers.</p>
                    <form class="d-flex mt-3 gap-0" action="index.html">
                        <input class="form-control rounded-start rounded-0 bg-light" type="email"
                            placeholder="Email Address" aria-label="Email Address">
                        <button class="btn btn-dark rounded-end rounded-0" type="submit">Subscribe</button>
                    </form>
                </div>
            </div> --}}

        </div>
    </div>
</footer>

<div id="footer-bottom">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>© Copyright 2025 YallaMunch.com</p>
            </div>
            <div class="col-md-6 credit-link text-start text-md-end">
                <p>Powered by <a href="https://yallamunch.com">YallaMunch Team</a></p>
            </div>
        </div>
    </div>
</div>
