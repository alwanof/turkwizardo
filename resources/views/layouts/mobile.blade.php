<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', session('lang')) }}">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158247772-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-158247772-1');

    </script>

    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="robots" content="index, follow">
    @yield('seo')
    <title>{{ config('app.name', 'NULL') }} - @yield('title')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (session('lang') == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/rtl/styles/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/rtl/styles/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/rtl/fonts/css/fontawesome-all.min.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/styles/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/styles/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('pwa/fonts/css/fontawesome-all.min.css') }}">
    @endif

    <!-- flags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.css" />

    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"
        rel="stylesheet">

    <link rel="manifest" href="{{ asset('pwa/_manifest.json') }}" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="icon" href="{{ asset('pwa/app/icons/icon-72x72.png') }}" type="image/gif" sizes="16x16">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('pwa/app/icons/icon-192x192.png') }}">
    @yield('css')
</head>

<body class="theme-light" data-background="violet" data-highlight="orange">
    <div id="app">
        <div id="preloader">
            <div class="spinner-border color-highlight" role="status"></div>
        </div>
        <div id="page">
            <!-- header and footer bar go here-->
            <div class="header header-fixed header-logo-center">
                <a href="#" class="header-title">
                    <img src="{{ asset('img/png//logo.png') }}" width="100px">
                </a>
                <a href="#" data-menu="menu-lang" class="header-icon header-icon-1"><i
                        class="fas fa-globe-americas font-18"></i></a>
                <a href="#" data-menu="menu-share" class="header-icon header-icon-2"><i
                        class="fas fa-share-alt font-18"></i></a>

                <a href="#" data-toggle-theme class="header-icon header-icon-4"><i
                        class="fas fa-lightbulb font-18"></i></a>
            </div>
            <div id="footer-bar" class="footer-bar-1">
                <a href="{{ route('start') }}" class="{{ Route::currentRouteName() == 'start' ? 'active-nav' : '' }}">
                    <i class="fa fa-home"></i><span>{{ __('fronthome.menu.home') }}</span>
                </a>
                <a href="#" data-menu="menu-services"><i
                        class="fa fa-star"></i><span>{{ __('fronthome.menu.services.parent') }}</span></a>
                <a href="#"><i class="fas fa-plus"></i><span>Request</span></a>
                <a href="{{ url('pages/almedoan-129314') }}"><i
                        class="fas fa-university"></i><span>{{ __('fronthome.menu.about') }}</span></a>
                <a href="#" data-menu="menu-form"><i
                        class="far fa-envelope"></i><span>{{ __('fronthome.menu.contact') }}</span></a>
            </div>
            <!--start of page content, add your stuff here-->
            <div class="page-content header-clear-medium">
                @yield('content')
                <div class="footer card card-style">
                    <a href="#" class="footer-title"><span class="color-highlight">StickyMobile</span></a>
                    <p class="footer-text"><span>Made with <i class="fa fa-heart color-highlight font-16 pl-2 pr-2"></i>
                            by Enabled</span><br><br>Powered by the best Mobile Website Developer on Envato Market.
                        Elite Quality. Elite Products.</p>
                    <div class="text-center mb-3">
                        <a href="https://www.facebook.com/turkwizard"
                            class="icon icon-xs rounded-sm shadow-l mr-1 bg-facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/WizardTurk"
                            class="icon icon-xs rounded-sm shadow-l mr-1 bg-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/turkwizard.com.tr"
                            class="icon icon-xs rounded-sm shadow-l mr-1 text-white bg-dark">
                            <i class="fab fa-instagram fa-2x"></i></a>
                        <a href="https://www.youtube.com/channel/UCGD7_-E0B9HSz8tTTKiyb2Q"
                            class="icon icon-xs rounded-sm shadow-l mr-1 text-white bg-danger"><i
                                class="fab fa-youtube"></i></a>

                        <a href="#" class="back-to-top icon icon-xs rounded-sm shadow-l bg-dark1-light"><i
                                class="fa fa-angle-up"></i></a>
                    </div>
                    <p class="footer-copyright">Copyright &copy; Enabled <span id="copyright-year">2017</span>. All
                        Rights Reserved.</p>
                    <p class="footer-links"><a href="#" class="color-highlight">Privacy Policy</a> | <a href="#"
                            class="color-highlight">Terms and Conditions</a> | <a href="#"
                            class="back-to-top color-highlight"> Back to Top</a></p>
                    <div class="clear"></div>
                </div>

            </div>
            <!--end of page content, off canvas elements here-->

            <!-- language menu -->
            <div id="menu-lang" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="320"
                data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>{{ __('fronthome.menu.languages') }}</h1>

                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="list-group list-custom-small">
                        <a href="{{ route('lang', 'en') }}" class="pb-2 ml-n1">
                            <i class="flag-icon flag-icon-us font-18 rounded-s  mr-3"></i>
                            <span>English</span>
                        </a>
                    </div>

                    <div class="list-group list-custom-small">
                        <a href="{{ route('lang', 'ar') }}" class="pb-2 ml-n1">
                            <i class="flag-icon flag-icon-sa font-18 rounded-s  mr-3"></i>
                            <span>عربي</span>
                        </a>
                    </div>
                    <div class="list-group list-custom-small">
                        <a href="{{ route('lang', 'tr') }}" class="pb-2 ml-n1">
                            <i class="flag-icon flag-icon-tr font-18 rounded-s  mr-3"></i>
                            <span>Turkye</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- / end language menu -->

            <!-- services menu -->
            <div id="menu-services" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="250"
                data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>{{ __('fronthome.menu.services.parent') }}</h1>

                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="list-group list-custom-small">
                        <a href="{{ url('pages/almedoan-129317') }}" class="pb-2 ml-n1">
                            <i class="fas fa-dollar-sign font-18 rounded-s  mr-3"></i>
                            <span>{{ __('fronthome.menu.services.free') }}</span>
                        </a>
                    </div>

                    <div class="list-group list-custom-small">
                        <a href="{{ url('pages/almedoan-129318') }}" class="pb-2 ml-n1">
                            <i class="fas fa-dollar-sign font-18 rounded-s  mr-3"></i>
                            <span>{{ __('fronthome.menu.services.paid') }}</span>
                        </a>
                    </div>

                </div>
            </div>
            <!-- / end services menu -->

            <!-- form menu -->
            <div id="menu-form" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="500"
                data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>{{ __('fronthome.menu.services.parent') }}</h1>

                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <form-component :lang="{{ json_encode(app()->getLocale()) }}" />
                </div>
            </div>
            <!-- / end form menu -->
            <div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="345"
                data-menu-effect="menu-over">
                <div class="menu-title mt-n1">
                    <h1>Share the Love</h1>
                    <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#"
                        class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="content mb-0">
                    <div class="divider mb-0"></div>
                    <div class="list-group list-custom-small list-icon-0">
                        <a href="#" class="shareToFacebook">
                            <i class="font-18 fab fa-facebook color-facebook"></i>
                            <span class="font-13">Facebook</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" class="shareToTwitter">
                            <i class="font-18 fab fa-twitter-square color-twitter"></i>
                            <span class="font-13">Twitter</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" class="shareToLinkedIn">
                            <i class="font-18 fab fa-linkedin color-linkedin"></i>
                            <span class="font-13">LinkedIn</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" class="shareToWhatsApp">
                            <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                            <span class="font-13">WhatsApp</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" class="shareToMail border-0">
                            <i class="font-18 fa fa-envelope-square color-mail"></i>
                            <span class="font-13">Email</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Be sure this is on your main visiting page, for example, the index.html page-->
            <!-- Install Prompt for Android -->
            <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l"
                data-menu-height="350" data-menu-effect="menu-parallax">
                <div class="boxed-text-l mt-4">
                    <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
                    <h4 class="mt-3">Add Turkwizaed on your Home Screen</h4>
                    <p>
                        Install Turkwizaed on your home screen, and access it just like a regular app. It really is that
                        simple!
                    </p>
                    <a href="#"
                        class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Add
                        to Home Screen</a><br>
                    <a href="#"
                        class="pwa-dismiss close-menu color-gray2-light text-uppercase font-900 opacity-60 font-10">Maybe
                        later</a>
                    <div class="clear"></div>
                </div>
            </div>

            <!-- Install instructions for iOS -->
            <div id="menu-install-pwa-ios" class="menu menu-box-bottom menu-box-detached rounded-l"
                data-menu-height="320" data-menu-effect="menu-parallax">
                <div class="boxed-text-xl mt-4">
                    <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90">
                    <h4 class="mt-3">Add Turkwizaed on your Home Screen</h4>
                    <p class="mb-0 pb-0">
                        Install Turkwizaed on your home screen, and access it just like a regular app. Open your Safari
                        menu
                        and tap "Add to Home Screen".
                    </p>
                    <div class="clear"></div>
                    <a href="#"
                        class="pwa-dismiss close-menu color-highlight uppercase ultrabold opacity-80 top-25">Maybe
                        later</a>
                    <i class="fa-ios-arrow fa fa-caret-down font-40"></i>
                </div>
            </div>

            <!--end of div id page-->

        </div>

    </div>



    @if (session('lang') == 'ar')
        <script type="text/javascript" src="{{ asset('pwa/rtl/scripts/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pwa/rtl/scripts/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pwa/rtl/scripts/custom.js') }}"></script>
    @else
        <script type="text/javascript" src="{{ asset('pwa/scripts/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pwa/scripts/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('pwa/scripts/custom.js') }}"></script>
    @endif

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
