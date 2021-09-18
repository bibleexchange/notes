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
    <meta property="og:title" content="{{ isset($pageTitle) ? $pageTitle . ' | ' : '' }}{{ $page? $page->book->name:setting('app-name') }}">
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
        
</head>
<body class="@yield('body-class')">

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
