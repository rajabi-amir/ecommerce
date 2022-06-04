@extends('home.layout.MasterHome')
@section('title' , 'پروفایل کاربری')
@section('content')

<!-- Start of Main -->
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">حساب کاربری من </h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">صفحه اصلی </a></li>
                <li>حساب کاربری من</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active">داشبورد </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">سفارشات </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-downloads" class="nav-link">دانلودها </a>
                    </li>
                    <li class="nav-item">
                        <a href="{#account-addresses}" class="nav-link">آدرسها </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">جزئیات حساب کاربری </a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-comments" class="nav-link">کامنت ها </a>
                    </li>
                    <li class="link-item">
                        <a href="{{route('home.profile.wishlist.index')}}">علاقه مندیها </a>
                    </li>
                    <li class="link-item">
                        <a href="{{route('home.addreses.index')}}">آدرس ها </a>
                    </li>
                    <li class="link-item">
                        <a href="login.html">خروج </a>
                    </li>
                </ul>

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">
                        <p class="greeting"> سلام
                            <span class="text-dark font-weight-bold">جعفر عباسی </span>نیستی
                            <span class="text-dark font-weight-bold">جعفر عباسی </span>?
                            <a href="#" class="text-primary">خروج؟</a>)
                        </p>

                        <p class="mb-4">
                            از داشبورد حساب خود می توانید حساب خود را مشاهده کنید <a href="#account-orders"
                                class="text-primary link-to-tab">سفارشات اخیر </a>,
                            مدیریت <a href="#account-addresses" class="text-primary link-to-tab">حمل و نقل و صدور صورت
                                حساب
                                آدرسها </a>، و
                            <a href="#account-details" class="text-primary link-to-tab">رمز عبور و اطلاعات حساب خود را
                                ویرایش کنید.</a>
                        </p>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-orders" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-orders">
                                            <i class="w-icon-orders"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">سفارشات </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-downloads" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-download">
                                            <i class="w-icon-download"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">دانلودها </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-addresses" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-address">
                                            <i class="w-icon-map-marker"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">آدرسها </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-details" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-account">
                                            <i class="w-icon-user"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">جزئیات حساب </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="{{route('home.profile.wishlist.index')}}" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-wishlist">
                                            <i class="w-icon-heart"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">علاقه مندها </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-comments" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-comment">
                                            <i class="w-icon-comment"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">کامنت ها</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">سفارشات </h4>
                            </div>
                        </div>

                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id">سفارش </th>
                                    <th class="order-date">تاریخ </th>
                                    <th class="order-status">وضعیت </th>
                                    <th class="order-total">مجموع </th>
                                    <th class="order-actions">اقدامات </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">شهریور 1400</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">2120000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2321</td>
                                    <td class="order-date">شهریور 1400</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">150000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2319</td>
                                    <td class="order-date">شهریور 1400</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">355000 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="order-id">#2318</td>
                                    <td class="order-date">شهریور 1400</td>
                                    <td class="order-status">در حال پردازش </td>
                                    <td class="order-total">
                                        <span class="order-price">3159999 تومان</span> برای
                                        <span class="order-quantity"> 1</span> آیتم
                                    </td>
                                    <td class="order-action">
                                        <a href="#"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">نمایش </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">برو فروشگاه<i
                                class="w-icon-long-arrow-left"></i></a>
                    </div>

                    <div class="tab-pane" id="account-downloads">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-downloads mr-2">
                                <i class="w-icon-download"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title ls-normal">دانلودها </h4>
                            </div>
                        </div>
                        <p class="mb-4">هنوز بارگیری در دسترس نیست.</p>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">برو فروشگاه<i
                                class="w-icon-long-arrow-left"></i></a>
                    </div>

                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">آدرسها </h4>
                            </div>
                        </div>
                        <p>آدرس های زیر به طور پیش فرض در صفحه پرداخت استفاده می شود.</p>
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">آدرس قبض </h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>نام :</th>
                                                    <td>جعفر عباسی</td>
                                                </tr>
                                                <tr>
                                                    <th>کشور:</th>
                                                    <td> تم فایل</td>
                                                </tr>
                                                <tr>
                                                    <th>آدرس:</th>
                                                    <td>خیابان دانش</td>
                                                </tr>
                                                <tr>
                                                    <th>شهر :</th>
                                                    <td>شاهین دژ</td>
                                                </tr>
                                                <tr>
                                                    <th>کشور:</th>
                                                    <td>ایران </td>
                                                </tr>
                                                <tr>
                                                    <th>کد پستی:</th>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <th>تلفن:</th>
                                                    <td>1112223334</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">آدرس
                                        صورتحساب خود را ویرایش کنید<i class="w-icon-long-arrow-left"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">آدرس حمل و نقل</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>نام :</th>
                                                    <td>جعفر عباسی</td>
                                                </tr>
                                                <tr>
                                                    <th>کشور:</th>
                                                    <td> تم فایل</td>
                                                </tr>
                                                <tr>
                                                    <th>آدرس:</th>
                                                    <td>خیابان دانش</td>
                                                </tr>
                                                <tr>
                                                    <th>شهر :</th>
                                                    <td>شاهین دژ</td>
                                                </tr>
                                                <tr>
                                                    <th>کشور:</th>
                                                    <td>ایران </td>
                                                </tr>
                                                <tr>
                                                    <th>کد پستی:</th>
                                                    <td>92020</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">ویرایش
                                        آدرس حمل و نقل<i class="w-icon-long-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="account-comments">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">کامنت ها </h4>
                            </div>
                        </div>
                        @if ($comments->isEmpty())
                        <tr>
                            <td class="product-thumbnail">
                                شما نظری ثبت نکرده اید </td>
                        </tr>
                        @else
                        @foreach ($comments as $comment )
                        <div class="tab-content">
                            <div class="tab-pane active" id="show-all">
                                <ul class="comments list-style-none">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <figure class="comment-avatar">
                                                <img src="{{ $comment->user->avatar == null ? asset('/assets/images/agents/01.png') : $comment->user->avatar }}"
                                                    alt="Commenter Avatar" width="90" height="90">
                                            </figure>
                                            <div class="comment-content">
                                                <h4 class="comment-author">
                                                    <a
                                                        href="#">{{$comment->user->name == null ? "بدون نام" : $comment->user->name }}</a>
                                                    <span
                                                        class="
                                                                comment-date">{{Hekmatinasser\Verta\Verta::instance($comment->created_at)->format('Y/n/j')}}</span>
                                                    <span><a class="btn btn-secondary btn-link btn-underline"
                                                            href="{{route('home.products.show', ['product' => $comment->product->slug])}}">محصول
                                                            ( {{$comment->product->name}} )</a> </span>
                                                </h4>

                                                <!-- <div class="ratings-container comment-rating">
                                                    <div class="ratings-full">
                                                        <span class="ratings"
                                                            style="width: {{--(ceil(auth()->user()->rates->first()->rate)*100)/5--}}%'"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div> -->
                                                <p>{{$comment->text}}</p>
                                                <div class="comment-action">
                                                    <a href="#"
                                                        class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                        <i class="far fa-thumbs-up"></i> مفید (1)
                                                    </a>
                                                    <a href="#"
                                                        class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                        <i class="far fa-thumbs-down"></i>بی فایده
                                                        (0)
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="helpful-positive">

                            </div>
                            <div class="tab-pane" id="helpful-negative">

                            </div>
                        </div>
                        @endforeach @endif

                    </div>
                    <div class="tab-pane" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">جزئیات حساب </h4>
                            </div>
                        </div>
                        <form class="form account-details-form" action="#" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">نام کوچک *</label>
                                        <input type="text" id="firstname" name="firstname" placeholder="جعفر"
                                            class="form-control form-control-md">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">نام خانوادگی *</label>
                                        <input type="text" id="lastname" name="lastname" placeholder="عباسی"
                                            class="form-control form-control-md">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="display-name">نام نمایشی *</label>
                                <input type="text" id="display-name" name="display_name" placeholder="جعفر عباسی"
                                    class="form-control form-control-md mb-0">
                                <p>به این ترتیب نام شما در بخش حساب و در بررسی ها نمایش داده می شود</p>
                            </div>

                            <div class="form-group mb-6">
                                <label for="email_1">آدرس ایمیل *</label>
                                <input type="email" id="email_1" name="email_1" class="form-control form-control-md">
                            </div>

                            <h4 class="title title-password ls-25 font-weight-bold">تغییر رمز عبور </h4>
                            <div class="form-group">
                                <label class="text-dark" for="cur-password">گذرواژه فعلی را خالی بگذارید تا بدون تغییر
                                    باقی بماند</label>
                                <input type="password" class="form-control form-control-md" id="cur-password"
                                    name="cur_password">
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="new-password">گذرواژه جدید خالی می ماند تا بدون تغییر باقی
                                    بماند</label>
                                <input type="password" class="form-control form-control-md" id="new-password"
                                    name="new_password">
                            </div>
                            <div class="form-group mb-10">
                                <label class="text-dark" for="conf-password">تایید رمز عبور </label>
                                <input type="password" class="form-control form-control-md" id="conf-password"
                                    name="conf_password">
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">ذخیره تغییرات </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection