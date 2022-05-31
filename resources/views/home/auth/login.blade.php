@extends('home.layout.MasterHome')
@section('title','بازیابی رمز عبور')
@section('content')
<main class="main login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">ورود / ثبت نام </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>ورود/ثبت نام</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
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
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="form-group">
                                    <label>آدرس ایمیل یا نام کاربری *</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" />
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
                            <form action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-group mb-5">
                                    <label>نام کوچک *</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                                    <span class="text-red name-error"></span>
                                </div>
                                <div class="form-group">
                                    <label> آدرس ایمیل شما*</label>
                                    <input type="text" class="form-control" name="email" value="{{old('email')}}" />
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
        </div>
    </div>
</main>
@endsection
