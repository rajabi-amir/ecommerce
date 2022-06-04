<!DOCTYPE html>
<html lang="fa">

<head>
    @include('home.partial.Head')
    @stack('styles')

    @livewireStyles()
</head>

<body dir="rtl" @class(['my-account'=> request()->routeIs('home.user_profile')])>
    <div class="page-wrapper">

        @include('home.partial.Header')

        @yield('content')

        @include('home.partial.Footer')

    </div>

    @include('home.partial.StickyFooter')

    @include('home.partial.ScrollTop')

    @include('home.partial.MobileMenu')

    @include('home.partial.QuickView')

    @include('home.partial.login')


    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/sticky/sticky.min.js')}}"></script>

    <script src="{{asset('assets/vendor/jquery.plugin/jquery.plugin.min.js')}}"></script>
    <script src="{{asset('assets/vendor/parallax/parallax.min.js')}}"></script>
    <script src="{{asset('assets/vendor/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/vendor/zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('assets/vendor/skrollr/skrollr.min.js')}}"></script>
    <script src="{{asset('assets/js/rating.js')}}"></script>
    <script src="{{asset('assets/js/notify.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('assets/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('assets/js/main.min.js')}}"></script>
    <script>
    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    function delete_product_cart(id) {

        let url =
            window.location.origin +
            "/remove-from-cart" +
            "/" + id;
        console.log(url);

        $.get(url,
            function(response, status, xyz) {
                console.log(status);
                if (status == 'success') {


                    let price = number_format(response);
                    $(".price").html(price + ' ' + 'تومان');
                    $("#" + id).remove();
                    $("#header-cart-count").html(
                        parseInt(
                            $(
                                "#header-cart-count"
                            ).html(),
                            10
                        ) - 1
                    );
                    Swal.fire({
                        title: "حله",
                        text: " محصول حذف شد",
                        icon: "success",
                        timer: 1500,
                        ConfirmButton: "باشه",

                    });
                    Livewire.emit('delete', id);
                }
            }).fail(function() {
            console.log(status)
        })
    }
    </script>
    <script>
    window.addEventListener('say-goodbye', event => {
        $("#header-cart-count").html(
            parseInt(
                $(
                    "#header-cart-count"
                ).html(),
                10
            ) - 1
        );

        $("#" + event.detail.rowId).remove();

        $(".price").remove();

    });
    </script>

    @flasher_livewire_render

    @flasher_render

    @include('sweetalert::alert')
    @livewireScripts()
    @stack('scripts')

</body>

</html>