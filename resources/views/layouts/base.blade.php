<!DOCTYPE html>
<html lang="{{ config('app.lang') }}"
      dir="{{ config('app.rtl') ? 'rtl' : 'ltr' }}"
      class="{{ setting()->getForCurrentUser('dark-mode-enabled') ? 'dark-mode ' : '' }}@yield('body-class')">
<head>
    <title>{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ setting('app-name') }}</title>
    <!-- Meta -->
    <meta name="viewport" content="width=device-width">
    <meta name="token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="utf-8">

    <!-- Social Cards Meta -->
    <meta property="og:title" content="{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ isset($page) ? $page->book->name:setting('app-name') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    @stack('social-meta')

    <!-- Styles and Fonts -->
    <link rel="stylesheet" href="{{ versioned_asset('dist/styles.css') }}">
    <link rel="stylesheet" href="/libs/fab/css/all.min.css">
    <link rel="stylesheet" media="print" href="{{ versioned_asset('dist/print-styles.css') }}">

    @yield('head')

    <!-- Custom Styles & Head Content -->
    @include('common.custom-styles')
    @include('common.custom-head')

    @stack('head')

    <!-- Translations for JS -->
    @stack('translations')

          <style>
            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }          
            div#social-links ul li a {
                padding: 20px;
                border: 1px solid #ccc;
                margin: 1px;
                font-size: 30px;
                color: #222;
                background-color: #ccc;
            }
        </style>

    <script type="application/ld+json">{
    "@context": "http://schema.org",
    "@type": "WebSite",
    "name": "Bible exchange",
    "url": "https://bible.exchange",
    "sameAs": ["https://facebook.com/thebibleexchange",
               "https://www.instagram.com/bible_exchange",
               "https://twitter.com/bible_exchange"],
    "potentialAction": {
    "@type": "SearchAction",
    "target": "https://bible.exchange/search?term={search_term}",
    "query-input": "required name=search_term"
    }
    }</script>
        
</head>
<body class="@yield('body-class')">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TH8GXQ7');</script>
    <!-- End Google Tag Manager -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TH8GXQ7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    @include('common.skip-to-content')
    @include('common.notifications')
    @include('common.header')

    <div id="content" components="@yield('content-components')" class="block">
        @yield('content')
    </div>

    @include('common.footer')

    <div back-to-top class="primary-background print-hidden">
        <div class="inner">
            @icon('chevron-up') <span>{{ trans('common.back_to_top') }}</span>
        </div>
    </div>

    @yield('bottom')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" nonce="{{ $cspNonce }}"></script>
    <script src="{{ asset('js/share.js') }}" nonce="{{ $cspNonce }}"></script>

    <script src="{{ versioned_asset('dist/app.js') }}" nonce="{{ $cspNonce }}"></script>

    @yield('scripts')

</body>
</html>
