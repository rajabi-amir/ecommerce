<!doctype html>

<html class="no-js " lang="fa">

<head>
    @include('admin.partial.Head')
    @stack('styles')
    @livewireStyles()
</head>

<body class="theme-blush">

    <!-- Page Loader -->
    @include('admin.partial.PageLoader')
    <!-- Overlay For Sidebars -->
    <div class=" overlay">
    </div>

    <!-- Main Search -->
    @include('admin.partial.MainSearch')
    <!-- Right Icon menu Sidebar -->
    @include('admin.partial.RightIconSidebar')

    <!-- Left Sidebar -->
    @include('admin.partial.LeftSidebar')

    <!-- Right Sidebar -->
    @include('admin.partial.RightSidebar')
    <!-- Main Content -->

    @yield('Content')

    <!-- Jquery Core Js -->

    <script src="{{asset('js/admin.js')}}"></script>
    @flasher_render

    @stack('scripts')

    @livewireScripts()

</body>

</html>
