@extends('home.layout.MasterHome')
@section('title','خانه')
@section('content')
<main class="main mb-10 pb-1">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav container">
        <ul class="breadcrumb bb-no">
            <li><a href="{{route('home')}}">صفحه اصلی </a></li>
            <li><a href="{{route('home')}}">محصولات </a></li>
            <li>{{$product->name}} </li>
        </ul>
        <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
                <a href="#">
                    <i class="w-icon-angle-left"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="assets/images/products/product-nav-prev.jpg" alt="Product" width="110" height="110" />
                    <span class="product-name">صدای ساز نرم</span>
                </span>
            </li>
            <li class="product-nav-next">
                <a href="#">
                    <i class="w-icon-angle-right"></i>
                </a>
                <span class="product-nav-popup">
                    <img src="assets/images/products/product-nav-next.jpg" alt="Product" width="110" height="110" />
                    <span class="product-name">بلندگوی عالی صدا</span>
                </span>
            </li>
        </ul>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-4 mb-md-8">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no"
                                    data-owl-options="{
                                'rtl': true,
                                'items': 1,
                                'nav': false,
                                'dots': true,
                                'loop': true
                            }">>
                                    @foreach ($product->images as $image_value )
                                    <figure class="product-image">
                                        <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                            data-zoom-image="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value->image)}}"
                                            alt="" width="800" height="900">
                                    </figure>
                                    @endforeach
                                </div>
                                <div class="product-thumbs-wrap">
                                    <div class="product-thumbs row cols-4 gutter-sm">
                                        @foreach ( $product->images as $image_value_second )
                                        <div class="product-thumb">
                                            <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$image_value_second->image)}}"
                                                alt="Product Thumb" width="800" height="900">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="thumb-up disabled"><i class="w-icon-angle-left"></i></button>
                                    <button class="thumb-down disabled"><i class="w-icon-angle-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-6 mb-md-8">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{$product->title}} </h1>
                                <div class="product-bm-wrapper">
                                    <figure class="brand">
                                        <img src="{{url(env('BRAND_IMAGES_PATCH').$product->brand->image)}}" alt="Brand"
                                            width="105" height="48" />
                                    </figure>
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            دسته بندی:
                                            <span class="product-category"><a href="#">{{$product->category->name}}
                                                </a></span>
                                        </div>
                                        <div class="product-sku">

                                            کد: <span>{{$product->variations[0]->sku}}</span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price">

                                    @if ($product->quantity_check)
                                    @if ($product->sale_check)
                                    <ins class="new-price">{{number_format($product->sale_check->sale_price)}}
                                        تومان</ins><del class="old-price">{{number_format($product->sale_check->price)}}
                                        تومان</del>
                                    @endif

                                    @else
                                    <ins class="new-price">نا موجود</ins>

                                    @endif
                                </div>

                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 80%;"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="#product-tab-reviews" class="rating-reviews">(3 نظر )</a>
                                </div>

                                <div class="product-short-desc">
                                    <ul class="list-type-check list-style-none">
                                        <li>{{$product->description}}</li>

                                    </ul>
                                </div>

                                <hr class="product-divider">

                                <div class="product-form product-variation-form product-color-swatch">
                                    <label>رنگ:</label>
                                    <div class="d-flex align-items-center product-variations">
                                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                                        <a href="#" class="color" style="background-color: #ccc;"></a>
                                        <a href="#" class="color" style="background-color: #333;"></a>
                                    </div>
                                </div>
                                <div class="product-form product-variation-form product-size-swatch">
                                    <label class="mb-1">سایز :</label>
                                    <div class="flex-wrap d-flex align-items-center product-variations">
                                        <a href="#" class="size">کوچک </a>
                                        <a href="#" class="size">متوسط </a>
                                        <a href="#" class="size">بزرگ </a>
                                        <a href="#" class="size">خیلی بزرگ </a>
                                    </div>
                                    <a href="#" class="product-variation-clean">حذف همه </a>
                                </div>

                                <div class="product-variation-price">
                                    <span></span>
                                </div>

                                <div class="fix-bottom product-sticky-content sticky-content">
                                    <div class="product-form container">
                                        <div class="product-qty-form">
                                            <div class="input-group">
                                                <input class="quantity form-control" type="number" min="1"
                                                    max="10000000">
                                                <button class="quantity-plus w-icon-plus"></button>
                                                <button class="quantity-minus w-icon-minus"></button>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-cart">
                                            <i class="w-icon-cart"></i>
                                            <span>افزودن به سبد </span>
                                        </button>
                                    </div>
                                </div>

                                <div class="social-links-wrapper">
                                    <div class="social-links">
                                        <div class="social-icons social-no-color border-thin">
                                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                        </div>
                                    </div>
                                    <span class="divider d-xs-show"></span>
                                    <div class="product-link-wrapper d-flex">
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                        <a href="#"
                                            class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">توضیحات </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-specification" class="nav-link">مشخصات </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-vendor" class="nav-link">اطلاعات فروشنده </a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-tab-reviews" class="nav-link">نظرات مشتریان (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">جزئیات </h4>
                                        <p class="mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                                            استفاده از طراحان گرافیک است. , لورم ایپسوم متن ساختگی با تولید سادگی
                                            نامفهوم از
                                            صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                            مجله
                                            در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                            کاربردهای
                                            متنوع با هدف بهبود ابزارهای کاربردی می باشد..</p>
                                        <ul class="list-type-check">
                                            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                از
                                                طراحان گرافیک است..
                                            </li>
                                            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                از
                                                طراحان گرافیک است..</li>
                                            <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                                از
                                                طراحان گرافیک است..
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <div class="banner banner-video product-video br-xs">
                                            <figure class="banner-media">
                                                <a href="#">
                                                    <img src="assets/images/products/video-banner-610x300.jpg"
                                                        alt="banner" width="610" height="300"
                                                        style="background-color: #bebebe;">
                                                </a>
                                                <a class="btn-play-video btn-iframe"
                                                    href="assets/video/memory-of-a-woman.mp4"></a>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cols-md-3">
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span class="mr-3">1.</span>ارسال و
                                            بازگشت
                                            رایگان</h5>
                                        <p class="detail pl-5">ما ارسال رایگان محصولات برای سفارشات بالای 100000 تومان
                                            را
                                            ارائه می دهیم و تحویل رایگان برای همه سفارشات در ایالات متحده را ارائه می
                                            دهیم.
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span>2.</span>بازگشت رایگان و آسان</h5>
                                        <p class="detail pl-5">ما محصولات ما را تضمین می کنیم و شما می توانید تمام پول
                                            خود
                                            را در هر زمان که می خواهید در 30 روز پس بگیرید.</p>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="sub-title font-weight-bold"><span>3.</span>تامین مالی ویژه
                                        </h5>
                                        <p class="detail pl-5">با کارت اعتباری ویژه ما 20 تا 50 درصد تخفیف برای اقلام
                                            بالای
                                            100000 تومان برای یک ماه یا بیش از 250000 تومان برای یک سال دریافت کنید.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="product-tab-specification">
                                <ul class="list-none">
                                    <li>
                                        <label>مودل </label>
                                        <p>اسکوات 230</p>
                                    </li>
                                    <li>
                                        <label>رنگ </label>
                                        <p>بلاک </p>
                                    </li>
                                    <li>
                                        <label>سایز </label>
                                        <p>بزرگ و کوچک</p>
                                    </li>
                                    <li>
                                        <label>تاریخ گارانتی </label>
                                        <p>3 ماه </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane" id="product-tab-vendor">
                                <div class="row mb-3">
                                    <div class="col-md-6 mb-4">
                                        <figure class="vendor-banner br-sm">
                                            <img src="assets/images/products/vendor-banner.jpg" alt="Vendor Banner"
                                                width="610" height="295" style="background-color: #353B55;" />
                                        </figure>
                                    </div>
                                    <div class="col-md-6 pl-2 pl-md-6 mb-4">
                                        <div class="vendor-user">
                                            <figure class="vendor-logo mr-4">
                                                <a href="#">
                                                    <img src="assets/images/products/vendor-logo.jpg"
                                                        alt="لوگوی فروشنده" width="80" height="80" />
                                                </a>
                                            </figure>
                                            <div>
                                                <div class="vendor-name"><a href="#">جعفر عباسی </a></div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 90%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(32 نظر )</a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="vendor-info list-style-none">
                                            <li class="store-name">
                                                <label>نام فروشگاه :</label>
                                                <span class="detail">فروشگاه PATIO</span>
                                            </li>
                                            <li class="store-address">
                                                <label>آدرس :</label>
                                                <span class="detail">ایران، ارومیه ، شاهین دژ / قزلناو</span>
                                            </li>
                                            <li class="store-phone">
                                                <label>تلفن :</label>
                                                <a href="#tel:">1234567890</a>
                                            </li>
                                        </ul>
                                        <a href="vendor-dokan-store.html"
                                            class="btn btn-dark btn-link btn-underline btn-icon-right">نمایش فروشگاه <i
                                                class="w-icon-long-arrow-left"></i></a>
                                    </div>
                                </div>
                                <p class="mb-5"><strong class="text-dark"> </strong>لورم ایپسوم متن ساختگی با تولید
                                    سادگی
                                    نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                    مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                    کاربردهای
                                    متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                    حال و
                                    آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای
                                    طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                    این
                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به
                                    پایان رسد .
                                </p>
                                <p class="mb-2"><strong class="text-dark">در </strong> لورم ایپسوم متن ساختگی با تولید
                                    سادگی
                                    نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                    مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                    کاربردهای
                                    متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                    حال و
                                    آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای
                                    طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                    این
                                    صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به
                                    پایان رسد .</p>
                            </div>
                            <div class="tab-pane" id="product-tab-reviews">
                                <div class="row mb-4">
                                    <div class="col-xl-4 col-lg-5 mb-4">
                                        <div class="ratings-wrapper">
                                            <div class="avg-rating-container">
                                                <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                                <div class="avg-rating">
                                                    <p class="text-dark mb-1">میانگین امتیاز </p>
                                                    <div class="ratings-container">
                                                        <div class="ratings-full">
                                                            <span class="ratings" style="width: 60%;"></span>
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <a href="#" class="rating-reviews">(3 نظر )</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                                <span class="text-dark font-weight-bold">66.7%</span>توصیه شده <span
                                                    class="count">(2 از 3)</span>
                                            </div>
                                            <div class="ratings-list">
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>70%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>30%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>40%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 40%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 20%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <div class="progress-bar progress-bar-sm ">
                                                        <span></span>
                                                    </div>
                                                    <div class="progress-value">
                                                        <mark>0%</mark>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-7 mb-4">
                                        <div class="review-form-wrapper">
                                            <h3 class="title tab-pane-title font-weight-bold mb-1">ارسال نظر </h3>
                                            <p class="mb-3">آدرس ایمیل شما منتشر نخواهد شد. فیلدهای مورد نیاز علامت
                                                گذاری
                                                شده است *</p>
                                            <form action="#" method="ارسال" class="review-form">
                                                <div class="rating-form">
                                                    <label for="rating">رتبه شما از این محصول :</label>
                                                    <span class="rating-stars">
                                                        <a class="star-1" href="#">1</a>
                                                        <a class="star-2" href="#">2</a>
                                                        <a class="star-3" href="#">3</a>
                                                        <a class="star-4" href="#">4</a>
                                                        <a class="star-5" href="#">5</a>
                                                    </span>
                                                    <select name="rating" id="rating" required=""
                                                        style="display: none;">
                                                        <option value="">امتیاز ... </option>
                                                        <option value="5">عالی </option>
                                                        <option value="4">خوب </option>
                                                        <option value="3">معمولی </option>
                                                        <option value="2">بد نبود </option>
                                                        <option value="1">بسیار بد </option>
                                                    </select>
                                                </div>
                                                <textarea cols="30" rows="6" placeholder="نظر خود را اینجا بنویسید..."
                                                    class="form-control" id="review"></textarea>
                                                <div class="row gutter-md">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="نام شما"
                                                            id="author">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="ایمیل شما"
                                                            id="email_1">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                                    <label for="save-checkbox">نام ، ایمیل و وب سایت من را برای دفعه بعد
                                                        که
                                                        نظر می دهم در این مرورگر ذخیره کنید.</label>
                                                </div>
                                                <button type="submit" class="btn btn-dark">ارسال نظر </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a href="#show-all" class="nav-link active">نمایش همه </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#helpful-positive" class="nav-link">مفیدترین مثبت</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#helpful-negative" class="nav-link">مفیدترین منفی</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#highest-rating" class="nav-link">بالاترین رتبه </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#lowest-rating" class="nav-link">پایین ترین رتبه </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="show-all">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/1-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-1.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-1-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/2-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 80%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-2.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-2.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-3.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-3.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/3-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
                                                            <div class="comment-action">
                                                                <a href="#"
                                                                    class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-up"></i> مفید (0)
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-down"></i>بی فایده
                                                                    (1)
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="helpful-positive">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/1-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-1.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-1.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/2-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 80%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-2.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-3.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="helpful-negative">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/3-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
                                                            <div class="comment-action">
                                                                <a href="#"
                                                                    class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-up"></i> مفید (0)
                                                                </a>
                                                                <a href="#"
                                                                    class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                    <i class="far fa-thumbs-down"></i>بی فایده
                                                                    (1)
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="highest-rating">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/2-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 80%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-2.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-3.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane" id="lowest-rating">
                                            <ul class="comments list-style-none">
                                                <li class="comment">
                                                    <div class="comment-body">
                                                        <figure class="comment-avatar">
                                                            <img src="assets/images/agents/1-100x100.png"
                                                                alt="Commenter Avatar" width="90" height="90">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <h4 class="comment-author">
                                                                <a href="#">جعفر خان </a>
                                                                <span class="comment-date">شهریور 1400</span>
                                                            </h4>
                                                            <div class="ratings-container comment-rating">
                                                                <div class="ratings-full">
                                                                    <span class="ratings" style="width: 60%;"></span>
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ
                                                                و
                                                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
                                                                روزنامه
                                                                و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                                                تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای
                                                                کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته،
                                                                حال و
                                                                آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم
                                                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص
                                                                طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در
                                                                این
                                                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                                                راهکارها و شرایط سخت تایپ به پایان رسد .</p>
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
                                                                <div class="review-image">
                                                                    <a href="#">
                                                                        <figure>
                                                                            <img src="assets/images/products/default/review-img-3.jpg"
                                                                                width="60" height="60"
                                                                                alt="پیوست تصویر مروری جان دو در ساعت مچی الکترونیکی بلک مچی"
                                                                                data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                        </figure>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="vendor-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title text-left">محصولات بیشتر از این فروشنده</h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">ادامه محصولات <i
                                    class="w-icon-long-arrow-left"></i></a>
                        </div>
                        <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/1-1.jpg" alt="Product" width="300"
                                            height="338" />
                                        <img src="assets/images/products/default/1-2.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat"><a href="shop-banner-sidebar.html">تجهیزات جانبی </a>
                                    </div>
                                    <h4 class="product-name"><a href="product-default.html">مداد چسبناک </a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">29000 تومان</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/2.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat"><a href="shop-banner-sidebar.html">الکترونیک </a>
                                    </div>
                                    <h4 class="product-name"><a href="product-default.html">مینی اجاق چند منظوره</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">480000 تومان</ins><del class="old-price">540000
                                                تومان</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/3.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat"><a href="shop-banner-sidebar.html">ورزشی </a></div>
                                    <h4 class="product-name"><a href="product-default.html">اسکیت پان </a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">278000 تومان</ins><del class="old-price">310000
                                                تومان</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/4-1.jpg" alt="Product" width="300"
                                            height="338" />
                                        <img src="assets/images/products/default/4-2.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <div class="product-cat"><a href="shop-banner-sidebar.html">تجهیزات جانبی </a>
                                    </div>
                                    <h4 class="product-name"><a href="product-default.html">پیوست کلیپ </a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">40000 تومان</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="related-product-section">
                        <div class="title-link-wrapper mb-4">
                            <h4 class="title">محصولات اخیر </h4>
                            <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">ادامه محصولات <i
                                    class="w-icon-long-arrow-left"></i></a>
                        </div>
                        <div class="owl-carousel owl-theme row cols-lg-3 cols-md-4 cols-sm-3 cols-2" data-owl-options="{
                                    'nav': false,
                                    'dots': false,
                                    'margin': 20,
                                    'responsive': {
                                        '0': {
                                            'items': 2
                                        },
                                        '576': {
                                            'items': 3
                                        },
                                        '768': {
                                            'items': 4
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/5.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">درون </a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">632000 تومان</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/6.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">دوربین رسمی</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">
                                            <ins class="new-price">263000 تومان</ins><del class="old-price">300000
                                                تومان</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/7-1.jpg" alt="Product" width="300"
                                            height="338" />
                                        <img src="assets/images/products/default/7-2.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">پد شارژ تلفن</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(8 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">23000 تومان</div>
                                    </div>
                                </div>
                            </div>
                            <div class="product">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="assets/images/products/default/8.jpg" alt="Product" width="300"
                                            height="338" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="افزودن به سبد خرید"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="افزودن به علاقه مندیها"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="افزودن برای مقایسه"></a>
                                    </div>
                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-quickview" title="نمایش سریع">نمایش سریع </a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">مداد مد روز</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9 نظر )</a>
                                    </div>
                                    <div class="product-pa-wrapper">
                                        <div class="product-price">50000 تومان</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-truck"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">ارسال و عودت رایگان</h4>
                                        <p>برای کلیه سفارشات بالای 100 هزارتومان</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-bag"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">پرداخت ایمن </h4>
                                        <p>ما پرداخت مطمئن را تضمین می کنیم</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-money"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">تضمین بازگشت پول</h4>
                                        <p>هر گونه بازگشت در عرض 30 روز</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Icon Box -->

                            <div class="widget widget-banner mb-9">
                                <div class="banner banner-fixed br-sm">
                                    <figure>
                                        <img src="assets/images/shop/banner3.jpg" alt="Banner" width="266" height="220"
                                            style="background-color: #1D2D44;" />
                                    </figure>
                                    <div class="banner-content">
                                        <div class="banner-price-info font-weight-bolder text-white lh-1 ls-25">
                                            40<sup class="font-weight-bold">%</sup><sub
                                                class="font-weight-bold text-uppercase ls-25">تخفیف </sub>
                                        </div>
                                        <h4 class="banner-subtitle text-white font-weight-bolder text-uppercase mb-0">
                                            فروش نهایی</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget Banner -->

                            <div class="widget widget-products">
                                <div class="title-link-wrapper mb-2">
                                    <h4 class="title title-link font-weight-bold">محصولات بیشتر </h4>
                                </div>

                                <div class="owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'nav': true,
                                            'dots': false,
                                            'items': 1,
                                            'margin': 20
                                        }">
                                    <div class="widget-col">
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/13.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">اسمارت واچ</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">80000 تومان - 90000 تومان</div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/14.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">مرکز پزشکی آسمان</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">59000 تومان</div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/15.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">موتور بدلکاری سیاه</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">375000 تومان</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-col">
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/16.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">اسکیت پان </a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">278000 تومان</div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/17.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">آشپز مدرن </a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">324000 تومان</div>
                                            </div>
                                        </div>
                                        <div class="product product-widget">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/shop/18.jpg" alt="Product" width="100"
                                                        height="113" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="#">دستگاه سی تی</a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">326000 تومان</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection