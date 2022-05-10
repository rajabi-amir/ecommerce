<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

<title>@yield('title')</title>

<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="وولـمارت - قالب چند منظوره و مارکت پلیس html">
<meta name="author" content="JafarAbbasi">
<link rel="icon" type="image/png" href="assets/images/icons/favicon.png">

<script>
WebFontConfig = {
    google: {
        families: ['Poppins:400,500,600,700,800']
    }
};
(function(d) {
    var wf = d.createElement('script'),
        s = d.scripts[0];
    wf.src = "{{asset('/assets/js/webfont.js')}}";
    wf.async = true;
    s.parentNode.insertBefore(wf, s);
})(document);
</script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<link rel="preload" href="{{asset('fonts/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
    crossorigin="anonymous" />
<link rel="preload" href="{{asset('fonts/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
    crossorigin="anonymous" />
<link rel="preload" href="{{asset('fonts/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
    crossorigin="anonymous" />
<link rel="preload" href="{{asset('fonts/wolmart87d5.ttf?png09e')}}" as="font" type="font/ttf"
    crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/owl-carousel/owl.carousel.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/animate/animate.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/magnific-popup/magnific-popup.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/demo5.min.css')}}" />




<link rel="icon" href="{{asset('/favicon.ico')}}" type='image/x-icon'> <!-- Favicon-->

<!-- Custom Css -->
<!-- <link rel="stylesheet" href="{{asset('css/home.css')}}"> -->