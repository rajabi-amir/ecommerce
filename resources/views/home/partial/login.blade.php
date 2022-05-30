<div id="login-popup" class="login-popup mfp-hide">
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
                        <input type="checkbox" class="custom-checkbox" name="remember" />
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
        <p class="text-center">با حساب اجتماعی وارد شوید</p>
        <div class="social-icons social-icon-border-color d-flex justify-content-center">
            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
            <a href="#" class="social-icon social-google fab fa-google"></a>
        </div>
    </div>
</div>

@include('home.partial.reset-password')

@push('scripts')

<script>
    $(document).ready(function() {
        @if(session('status')=='password.reset')
        Swal.fire({
            text: "{{ __(session('status')) }}",
            icon: 'success',
            confirmButtonText: 'تایید',
            toast: true,
            position: 'top-right',
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
            $('#sign-in .btn-primary').attr('disabled', true).append('<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
            $.post("{{route('login')}}", {
                    '_token': "{{csrf_token()}}",
                    'email': $('#sign-in input[name="email"]').val(),
                    'password': $('#sign-in input[name="password"]').val(),
                    'remember': $('#sign-in input[name="remember"]').is(":checked"),
                },
                function(response, status) {
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
            $('#sign-up .btn-primary').attr('disabled', true).append('<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
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
                    $('#sign-up .password-confirmation-error').html(response.responseJSON.errors.password_confirmation[0]);
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
            $('#reset-pass-form .btn-primary').attr('disabled', true).append('<span class="ml-1"><i class="w-icon-store-seo fa-spin"></i></span>');
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

        $('#reset-pass').magnificPopup({
            items: {
                src: '#reset-pass-form',
                type: 'inline'
            }
        });
    });
</script>

@endpush
