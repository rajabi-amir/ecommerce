<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.partial.Head')
    @stack('styles')
    @livewireStyles()
</head>

<body class="home">
    <div class="page-wrapper">

        @include('home.partial.Header')

        @yield('Content')

        @include('home.partial.Footer')

    </div>

    @include('home.partial.StickyFooter')

    @include('home.partial.ScrollTop')

    @include('home.partial.MobileMenu')

    @include('home.partial.QuickView')



</body>

<script src="{{asset('js/admin.js')}}"></script>
<script src="{{asset('/assets/js/owl.carousel.min.js')}}"></script>