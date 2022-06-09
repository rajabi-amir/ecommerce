i<div id="login-popup" class="login-popup mfp-hide">
    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
        <ul class="nav nav-tabs text-uppercase" role="tablist">
            <li class="nav-item">
                <a href="#sign-in" class="nav-link active">ورود </a>
            </li>
            <li class="nav-item">
                <a href="#sign-up" class="nav-link">ثبت نام</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="sign-in">
                <form>
                    <div class="form-group">
                        <label>آدرس ایمیل یا نام کاربری *</label>
                        <input type="text" class="form-control" name="email" />
                        <span class="text-red email-error"></span>
                    </div>
                    <div class="form-group mb-0">
                        <label>رمز عبور *</label>
                        <input type="password" class="form-control" name="password" />
                        <span class="text-red password-error"></span>
                    </div>
                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                        <input type="checkbox" class="custom-checkbox" name="remember" id="remember" />
                        <label for="remember">مرا به خاطر بسپار</label>
                        <a id="reset-pass" href="#">فراموشی رمز عبور؟ </a>
                    </div>
                    <button type="submit" class="btn btn-primary">ورود </button>
                </form>
            </div>
            <div class="tab-pane" id="sign-up">
                <form>
                    <div class="form-group mb-5">
                        <label>نام کوچک *</label>
                        <input type="text" class="form-control" name="name" />
                        <span class="text-red name-error"></span>
                    </div>
                    <div class="form-group">
                        <label> آدرس ایمیل شما*</label>
                        <input type="text" class="form-control" name="email" />
                        <span class="text-red email-error"></span>
                    </div>
                    <div class="form-group mb-5">
                        <label>رمز عبور *</label>
                        <input type="password" class="form-control" name="password" />
                        <span class="text-red password-error"></span>
                    </div>
                    <div class="form-group mb-5">
                        <label>تکرار رمز عبور *</label>
                        <input type="password" class="form-control" name="password_confirmation" />
                        <span class="text-red password-confirmation-error"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">عضویت</button>
                </form>
            </div>
        </div>
        <p class="text-center">دنبال روش دیگری هستید؟</p>
        <div class="social-icons social-icon-border-color d-flex justify-content-center">
            <a href="#" id="otp-login" class="btn btn-secondary btn-ellipse btn-outline btn-icon-left">
                <i class="w-icon-long-arrow-left"></i>ورود/ثبت نام با پیامک
            </a>
        </div>
    </div>
</div>

@include('home.partial.reset-password')

@include('home.partial.otp-login')

@push('scripts')

<script>
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
                'email': $('#sign-in input[name="email"]').val(),
                'password': $('#sign-in input[name="password"]').val(),
                'remember': $('#sign-in input[name="remember"]').is(":checked") ? 1 : 0,
            },
            function(response, status) {
                Swal.fire({
                    text: "خوش آمدید",
                    icon: 'success',
                    timer: 5000,
                    timerProgressBar: true,
                });
                window.location.replace("{{request()->fullUrl()}}");
            }, 'json').fail(function(response) {
            console.log(response.responseJSON.errors);

            if (response.responseJSON.errors.email) {
                $('#sign-in .email-error').html(response.responseJSON.errors.email[0]);
            } else {
                $('#sign-in .email-error').html('');
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
                var minutesToAdd = "{{env('OTP_TIME', 2)}}";
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + minutesToAdd * 60000);

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
                var minutesToAdd = "{{env('OTP_TIME', 2)}}";
                var currentDate = new Date();
                var futureDate = new Date(currentDate.getTime() + minutesToAdd * 60000);
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
                'remember': $('#otp-login-form input[name="remember"]').is(":checked") ? 1 : 0
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

@endpush