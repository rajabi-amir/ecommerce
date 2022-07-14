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

    @includeWhen(!request()->routeIs('login') && !request()->routeIs('register'),'home.partial.login')
    @include('home.partial.reset-password')
    @include('home.partial.otp-login')


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

        // Authentication
        $(document).ready(function() {
            @if(session('status') == 'passwords.reset')
            Swal.fire({
                text: "{{ __(session('status')) }}",
                icon: 'success',
                confirmButtonText: 'تایید',
                toast: true,
                position: 'top-right',
                timer: 5000,
                timerProgressBar: true,
                customClass: {
                    confirmButton: 'content-end'
                }
            })
            $.magnificPopup.open({
                items: {
                    src: '#login-popup',
                    type: 'inline'
                }
            });
            @endif

            $('#sign-in form').submit(function(event) {
                event.preventDefault();
                $('#sign-in .btn-primary').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('login')}}", {
                        '_token': "{{csrf_token()}}",
                        'username': $('#sign-in input[name="username"]').val(),
                        'password': $('#sign-in input[name="password"]').val(),
                        'remember': $('#sign-in input[name="remember"]').is(":checked") ? 1 : 0,
                    },
                    function(response, status) {
                        Swal.fire({
                            text: "خوش آمدید",
                            icon: 'success',
                            showConfirmButton: false
                        });
                        window.location.replace(response.redirect);
                    }, 'json').fail(function(response) {
                    console.log(response.responseJSON.errors);

                    if (response.responseJSON.errors.username) {
                        $('#sign-in .username-error').html(response.responseJSON.errors.username[0]);
                    } else {
                        $('#sign-in .username-error').html('');
                    }
                    if (response.responseJSON.errors.password) {
                        $('#sign-in .password-error').html(response.responseJSON.errors.password[0]);
                    } else {
                        $('#sign-in .password-error').html('');
                    }
                }).always(function() {
                    $('#sign-in .btn-primary').attr('disabled', false).find('span').remove();
                });

            });

            $('#sign-up form').submit(function(event) {
                event.preventDefault();
                $('#sign-up .btn-primary').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('register')}}", {
                        '_token': "{{csrf_token()}}",
                        'name': $('#sign-up input[name="name"]').val(),
                        'email': $('#sign-up input[name="email"]').val(),
                        'password': $('#sign-up input[name="password"]').val(),
                        "password_confirmation": $('#sign-up input[name="password_confirmation"]').val(),
                    },
                    function(response, status) {
                        window.location.replace("{{request()->fullUrl()}}");
                    }

                    , 'json').fail(function(response) {
                    if (response.responseJSON.errors.name) {
                        $('#sign-up .name-error').html(response.responseJSON.errors.name[0]);
                    } else {
                        $('#sign-up .name-error').html('');
                    }

                    if (response.responseJSON.errors.email) {
                        $('#sign-up .email-error').html(response.responseJSON.errors.email[0]);
                    } else {
                        $('#sign-up .email-error').html('');
                    }

                    if (response.responseJSON.errors.password) {
                        $('#sign-up .password-error').html(response.responseJSON.errors.password[0]);
                    } else {
                        $('#sign-up .password-error').html('');
                    }

                    if (response.responseJSON.errors.password_confirmation) {
                        $('#sign-up .password-confirmation-error').html(response.responseJSON.errors
                            .password_confirmation[0]);
                    } else {
                        $('#sign-up .password-confirmation-error').html('');
                    }
                    console.log(response.responseJSON.errors);
                }).always(function() {
                    $('#sign-up .btn-primary').attr('disabled', false).find('span').remove();
                });

            });

            $('#reset-pass-form form').submit(function(event) {
                event.preventDefault();
                $('#reset-pass-form .btn-primary').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('password.email')}}", {
                        '_token': "{{csrf_token()}}",
                        'email': $('#reset-pass-form input[name="email"]').val(),
                    },
                    function(response, status) {
                        $.magnificPopup.close();
                        Swal.fire({
                            text: 'لینک تغییر رمز عبور به ایمیل شما ارسال شد',
                            icon: 'success',
                            confirmButtonText: 'تایید'
                        })
                    }, 'json').fail(function(response) {
                    console.log(response.responseJSON.errors);

                    if (response.responseJSON.errors.email) {
                        $('#reset-pass-form .email-error').html(response.responseJSON.errors.email[0]);
                    } else {
                        $('#reset-pass-form .email-error').html('');
                    }
                }).always(function() {
                    $('#reset-pass-form .btn-primary').attr('disabled', false).find('span').remove();
                });

            });

            // OTP Login
            let opt_id;
            $('#otp-login-form form').submit(function(event) {
                event.preventDefault();
                $('#otp-login-form .btn-primary').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('otp.auth')}}", {
                        '_token': "{{csrf_token()}}",
                        'phone': $('#otp-login-form input[name="phone"]').val(),
                    },
                    function(response, status) {
                        opt_id = response.id;
                        $.magnificPopup.close();
                        $.magnificPopup.open({
                            items: {
                                src: '#otp-verify-form',
                                type: 'inline'
                            },
                            callbacks: {
                                close: function() {
                                    $('#resendOtpTimer').countdown('destroy');
                                    $('#otp-verify-form .code-error').html('');
                                }
                            }
                        });
                        // start count down
                        var secondsToAdd = response.time_to_expire;
                        var currentDate = new Date();
                        var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                        $('#resendOtpTimer').countdown({
                            until: futureDate,
                            format: 'MS',
                            isRTL: true,
                            compact: true,
                            description: 'تا ارسال مجدد',
                            layout: '<div class="font-size-normal"><span class="text-secondary font-size-lg mr-1">{mnn}{sep}{snn}</span>{desc}</div>',
                            onExpiry: function() {
                                $('#resendOtp').removeClass('d-none');
                                $('#resendOtpTimer').addClass('d-none');
                            }
                        })

                        Swal.fire({
                            text: "کدتایید به شماره تلفن شما ارسال شد",
                            icon: 'success',
                            confirmButtonText: 'تایید',
                            toast: true,
                            position: 'top-right',
                            timer: 5000,
                            timerProgressBar: true,
                            customClass: {
                                confirmButton: 'content-end'
                            }
                        })

                    }, 'json').fail(function(response) {
                    console.log(response.responseJSON.errors);

                    if (response.responseJSON.errors.phone) {
                        $('#otp-login-form .phone-error').html(response.responseJSON.errors.phone[0]);
                    } else {
                        $('#otp-login-form .phone-error').html('');
                    }
                    if (response.message) {
                        Swal.fire({
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'تایید',
                            toast: true,
                            position: 'top-right',
                            customClass: {
                                confirmButton: 'content-end'
                            },
                        })
                    }
                }).always(function() {
                    $('#otp-login-form .btn-primary').attr('disabled', false).find('span').remove();
                });

            });

            // resend OTP code
            $('#resendOtp').click(function(event) {
                event.preventDefault();
                $('#resendOtp').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('otp.resend')}}", {
                        '_token': "{{csrf_token()}}",
                        'id': opt_id,
                    },
                    function(response, status) {
                        $('#resendOtpTimer').countdown('destroy');
                        $('#resendOtp').addClass('d-none');
                        $('#resendOtpTimer').removeClass('d-none');
                        // start count down
                        var secondsToAdd = response.time_to_expire;
                        var currentDate = new Date();
                        var futureDate = new Date(currentDate.getTime() + secondsToAdd * 1000);
                        $('#resendOtpTimer').countdown({
                            until: futureDate,
                            format: 'MS',
                            isRTL: true,
                            compact: true,
                            description: 'تا ارسال مجدد',
                            layout: '<div class="font-size-normal"><span class="text-secondary font-size-lg mr-1">{mnn}{sep}{snn}</span>{desc}</div>',
                            onExpiry: function() {
                                $('#resendOtp').removeClass('d-none');
                                $('#resendOtpTimer').addClass('d-none');
                            }
                        })
                        Swal.fire({
                            text: "کدتایید به شماره تلفن شما ارسال شد",
                            icon: 'success',
                            confirmButtonText: 'تایید',
                            toast: true,
                            position: 'top-right',
                            timer: 5000,
                            timerProgressBar: true,
                            customClass: {
                                confirmButton: 'content-end'
                            }
                        })
                    }, 'json').fail(function(response) {
                    console.log(response.responseJSON.errors);
                    if (response.message) {
                        Swal.fire({
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'تایید',
                            toast: true,
                            position: 'top-right',
                            customClass: {
                                confirmButton: 'content-end'
                            },
                        })
                    }
                }).always(function() {
                    $('#resendOtp').attr('disabled', false).find('span').remove();
                });
            });

            // verify OTP code
            $('#otp-verify-form form').submit(function(event) {
                event.preventDefault();
                $('#otp-verify-form .btn-primary').attr('disabled', true).append(
                    '<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
                $.post("{{route('otp.verify')}}", {
                        '_token': "{{csrf_token()}}",
                        'code': $('#otp-verify-form input[name="code"]').val(),
                        'id': opt_id,
                        'remember': $('#otp-login-form input[name="otpRemember"]').is(":checked") ? 1 : 0
                    },
                    function(response, status) {
                        Swal.fire({
                            text: "خوش آمدید",
                            icon: 'success',
                            showConfirmButton: false
                        });
                        window.location.replace("{{request()->fullUrl()}}");

                    }, 'json').fail(function(response) {
                    console.log(response.responseJSON.errors);

                    if (response.responseJSON.errors.code) {
                        $('#otp-verify-form .code-error').html(response.responseJSON.errors.code[0]);
                    } else {
                        $('#otp-verify-form .code-error').html('');
                    }
                    if (response.message) {
                        Swal.fire({
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'تایید',
                            toast: true,
                            position: 'top-right',
                            customClass: {
                                confirmButton: 'content-end'
                            }
                        })
                    }
                }).always(function() {
                    $('#otp-verify-form .btn-primary').attr('disabled', false).find('span').remove();
                });

            });

            $('#reset-pass').magnificPopup({
                items: {
                    src: '#reset-pass-form',
                    type: 'inline'
                },
                callbacks: {
                    close: function() {
                        $('#reset-pass-form .email-error').html('');
                    }
                }
            });
            $('#otp-login').magnificPopup({
                items: {
                    src: '#otp-login-form',
                    type: 'inline'
                },
                callbacks: {
                    close: function() {
                        $('#otp-login-form .phone-error').html('');
                    }
                }
            });
        });
    </script>

    @flasher_livewire_render

    @flasher_render

    @include('sweetalert::alert')
    @livewireScripts()
    @stack('scripts')

</body>

</html>
