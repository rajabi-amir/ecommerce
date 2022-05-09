<!DOCTYPE html>
<html lang="fa">

<head>
    @include('home.partial.Head')
    @stack('styles')
    @livewireStyles()
</head>

<body>
    <div class="page-wrapper">

        @include('home.partial.Header')

        @yield('content')

        @include('home.partial.Footer')

    </div>

    @include('home.partial.StickyFooter')

    @include('home.partial.ScrollTop')

    @include('home.partial.MobileMenu')

    @include('home.partial.QuickView')



    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/vendor/parallax/parallax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('assets/vendor/skrollr/skrollr.min.js')}}"></script>
    <script src="{{asset('assets/js/main.min.js')}}"></script>

    @flasher_render
    @flasher_livewire_render

    @livewireScripts()
    @stack('scripts')
</body>

</html>
