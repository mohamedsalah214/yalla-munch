<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    class="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>@yield('title', config('app.name'))</title>
    <meta name="description"
        content="TeleTravel - Multipurpose travel and tour booking.These template is suitable for  travel agency , tour, travel website , tour operator , tourism , booking  trip or adventure website. ">
    <meta name="keywords"
        content="travel, trip booking,tour, hotel, tour guide, tourism, blog, flight, travel agency, tourism agency, accommodation, tour website">

    <meta logo="{{ asset('assets/images/logo/logo.png') }}">
    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{ asset('assets/images/logo/logo.png') }}">
    <meta white-logo="{{ asset('assets/images/logo/logo-white.png') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="inittheme">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Multipurpose travel and tour booking">
    <meta property="og:site_name" content="TeleTravel">
    <meta property="og:url" content="https://inittheme.com">
    <meta property="og:image" content="https://inittheme.com/images/selfie.jpg">
    <meta property="og:description" content="Multipurpose travel and tour booking, multipurpose template">
    <meta name="twitter:title" content="Multipurpose travel and tour booking">
    <meta name="twitter:description" content="Multipurpose travel and tour booking, multipurpose template">
    <meta name="twitter:image" content="https://twitter.com/inittheme/photo">
    <meta name="twitter:card" content="summary">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-5.3.0.min.css') }}">

    <!-- Fonts & icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts-icon.css') }}">
    <!-- Plugin -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugin.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main-style.css') }}">

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    @stack('styles') --}}


    <title>Organic - Grocery Store HTML Website Template</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="icon" type="image/x-icon" sizes="20x20" href="{{ asset('assets/images/logo.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css?v=1') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sixtyfour&display=swap" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T2XVXKH9');
    </script>
    <!-- End Google Tag Manager -->

</head>

<body>

    {{-- <!-- Social Chat Widget -->
    <div id="chat-widget">
        <a href="https://wa.me/+201035187798" target="_blank" class="chat-btn whatsapp">
            <img src="{{ asset('assets/icons/whatsapp.svg') }}" alt="WhatsApp" width="40">
        </a>
        <a href="https://m.me/61575143535376" target="_blank" class="chat-btn messenger">
            <img src="{{ asset('assets/icons/facebook-messenger.svg') }}" alt="Messenger" width="40">
        </a>
    </div> --}}

    <!-- Elfsight WhatsApp Chat | Untitled WhatsApp Chat -->
    <script src="https://elfsightcdn.com/platform.js" async></script>
    <div class="elfsight-app-5becd72f-1230-4201-8837-605e5b2d34a0" data-elfsight-app-lazy></div>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T2XVXKH9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    {{-- Navigation --}}
    @include('layouts.partials.svg-icons')

    @include('layouts.partials.banner')

    @include('layouts.partials.nav')

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    <script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

</body>

</html>
