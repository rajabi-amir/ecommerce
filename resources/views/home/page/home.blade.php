@extends('home.layout.MasterHome')
@section('title','خانه')
@section('content')
<main class="main">
    <div class="container">
        <div class="intro-wrapper">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="owl-carousel owl-theme row gutter-no cols-1 animation-slider owl-dot-inner"
                        data-owl-options="{
                                'rtl':true,
                                'nav': false,
                                'dots': true,
                                'items': 1,
                                'loop':true,
                                'autoplay': true,
                                'autoplayTimeout':5000,
                                'autoplayHoverPause':true,
                                'animateOut': 'fadeOut'
                            }">

                        @foreach ($sliders as $slider )

                        <div class="intro-slide intro-slide2 banner banner-fixed br-sm" style=' background-color: #EBEDEC;background-image: url(
                            "{{env('BANNER_IMAGES_PATCH').$slider->image}}");
'>
                            <div class="banner-content y-50">
                                <div class="slide-animate" data-animation-options="{
                                            'name': 'fadeInRightShorter', 'duration': '1s'
                                        }">
                                    <h5 class="banner-subtitle text-uppercase text-primary ls-25">{{$slider->title}}
                                    </h5>
                                    <h3 class="banner-title text-capitalize ls-25 mb-0" style="color:white">
                                        {{$slider->text}} </h3>
                                    <div class="banner-price-info text-default font-weight-bold mb-6 ls-50">
                                        {{$slider->button_text}}<span class="text-secondary"></span>
                                    </div>
                                    <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded">اکنون بخرید </a>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 col-xs-6 mb-4">
                            <div class="category-banner banner banner-fixed br-sm">
                                <figure>
                                    <img src="{{env('BANNER_IMAGES_PATCH').$banner_left_top->image}}" alt="Category"
                                        width="330" height="239" style="background-color: #605959;" />
                                </figure>
                                <div class="banner-content">
                                    <h3 class="banner-title text-white text-capitalize ls-25">
                                        {{$banner_left_top->title}}<br> </h3>
                                    <h5 class="banner-subtitle text-white text-capitalize ls-25">
                                        {{$banner_left_top->text}} </h5>
                                    <div class="banner-price-info text-white text-uppercase ls-25">
                                        {{$banner_left_top->button_text}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-6 mb-4">
                            <div class="category-banner banner banner-fixed br-sm">
                                <figure>
                                    <img src="{{env('BANNER_IMAGES_PATCH').$banner_left_bottom->image}}" alt="Category"
                                        width="330" height="239" style="background-color: #eff5f5;" />
                                </figure>
                                <div class="banner-content">
                                    <h3 class="banner-title text-white text-capitalize ls-25 mb-3">
                                        {{$banner_left_bottom->title}}<br></h3>
                                    <del class="old-price text-white ls-25">{{$banner_left_bottom->button_text}}
                                        تومان</del>
                                    <div class="new-price text-secondary ls-25">{{$banner_left_bottom->button_text}}
                                        تومان</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Intro-wrapper -->

        <div class="row cols-md-4 cols-sm-3 cols-1 icon-box-wrapper  br-sm bg-white" data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': false,
                    'loop': true,
                    'margin': 30,
                    'autoplay': true,
                    'autoplayTimeout': 4000,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 2
                        },
                        '992': {
                            'items': 3
                        },
                        '1200': {
                            'items': 4
                        }
                    }
                    }">

            @foreach ($services as $service)
            <div class="icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                    <i class="{{$service->icon}}"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bolder ls-normal">{{$service->title}}</h4>
                    <p class="text-default">{{$service->description}}</p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End of Iocn Box Wrapper -->

        <div class="title-link-wrapper title-deals appear-animate mb-4">
            <h2 class="title title-link">معاملات روز</h2>
            <div class="product-countdown-container font-size-sm text-white bg-secondary align-items-center mr-auto">
                <label>پایان پیشنهاد در: </label>
                <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
                    data-relative="true" data-compact="true">10روز ,00:00:00</div>
            </div>
            <a href="#" class="ml-0">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
        </div>
        <div class="owl-carousel owl-theme appear-animate row cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-6"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': true,
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
                            'items': 5
                        }
                    }
                }">


            <!-- End of Product Wrap -->
            @foreach ( $Products_auction_today as $Product_auction_today)
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product_auction_today->primary_image)}}"
                                alt=" Product" width="300" height="338">
                            <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$Product_auction_today->images->first()->image)}}"
                                alt="Product" width="300" height="338">
                        </a>

                        <div class=" product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">{{$Product_auction_today->name}}</a>
                        </h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 60%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(1 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">27000 تومان</ins><del class="old-price">{{$Product_auction_today->}} تومان</del>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <!-- End of Prodcut Deals Wrapper -->

        <div class="owl-carousel owl-theme icon-category-wrapper appear-animate row cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2 mb-10 pb-2"
            data-owl-options="{
                    'rtl':true,
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '480': {
                            'items': 3
                        },
                        '768': {
                            'items': 5
                        },
                        '992': {
                            'items': 6
                        },
                        '1200': {
                            'items': 8
                        }
                    }
                }">
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-tshirt"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">مدل </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-sofa"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">مبلمان </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-basketball"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">ورزشی </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-bow"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">اسباب بازی </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-camera"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">دوربین ها </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-gamepad"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">بازی </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-headphone"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">هدفونها </a></h4>
                </div>
            </div>
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="w-icon-mobile"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">اسمارت فون </a></h4>
                </div>
            </div>
        </div>
        <!-- End of Icon Category Wrapper -->

        <div class="category-banner-wrapper appear-animate row mb-5">
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/categories/2-1.jpg" alt="دسته بنر" width="680" height="180"
                            style="background-color: #EAEAEA;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle text-capitalize font-weight-normal ls-25">از فروشگاه آنلاین
                        </h5>
                        <h3 class="banner-title text-capitalize ls-10">فروش لوازم آرایشی </h3>
                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-link btn-underline btn-icon-right">
                            اکنون پیدا کن<i class="w-icon-long-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/categories/2-2.jpg" alt="دسته بنر" width="680" height="180"
                            style="background-color: #565960;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle text-white text-capitalize font-weight-normal ls-25">مجموعه فصل</h5>
                        <h3 class="banner-title text-white text-capitalize">سبک مد جدید</h3>
                        <a href="shop-banner-sidebar.html" class="btn btn-white btn-link btn-underline btn-icon-right">
                            اکنون پیدا کن<i class="w-icon-long-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Category Banner Wrapper -->

        <div class="title-link-wrapper mb-4">
            <h2 class="title title-link title-vendor appear-animate pt-2 pb-2">برترین فروشندگان هفتگی</h2>
        </div>
        <div class="owl-carousel owl-theme row cols-xl-4 cols-md-3 cols-sm-2 cols-1 vendor-wrapper appear-animate mb-10 pb-2"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4
                        }
                    }
                }">
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-banner">
                    <figure class="vendor-banner">
                        <a href="vendor-dokan-store.html">
                            <img src="assets/images/demos/demo3/vendors/1.jpg" alt="Vendor Banner" width="1200"
                                height="390" style="background-color: #ECE7DF;" />
                        </a>
                    </figure>
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="vendor-dokan-store.html">
                                <img src="assets/images/demos/demo3/vendors/brand-1.jpg" alt="لوگوی فروشنده" width="90"
                                    height="90" />
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="vendor-dokan-store.html">فروشگاه PATIO</a>
                            </h4>
                            <span class="vendor-product-count">27 محصول </span>
                        </div>
                    </div>
                </div>
                <!-- End of Vendor Widget Banner -->
            </div>
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-banner">
                    <figure class="vendor-banner">
                        <a href="vendor-dokan-store.html">
                            <img src="assets/images/demos/demo3/vendors/2.jpg" alt="Vendor Banner" width="1200"
                                height="390" style="background-color: #293936;" />
                        </a>
                    </figure>
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="vendor-dokan-store.html">
                                <img src="assets/images/demos/demo3/vendors/brand-2.jpg" alt="لوگوی فروشنده" width="90"
                                    height="90" />
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="vendor-dokan-store.html">فروشگاه تریدنت</a>
                            </h4>
                            <span class="vendor-product-count">11 محصول </span>
                        </div>
                    </div>
                </div>
                <!-- End of Vendor Widget Banner -->
            </div>
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-banner">
                    <figure class="vendor-banner">
                        <a href="vendor-dokan-store.html">
                            <img src="assets/images/demos/demo3/vendors/3.jpg" alt="Vendor Banner" width="1200"
                                height="390" style="background-color: #B8CDCE;" />
                        </a>
                    </figure>
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="vendor-dokan-store.html">
                                <img src="assets/images/demos/demo3/vendors/brand-3.jpg" alt="لوگوی فروشنده" width="90"
                                    height="90" />
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="vendor-dokan-store.html">فروشگاه پام</a>
                            </h4>
                            <span class="vendor-product-count">16 محصول </span>
                        </div>
                    </div>
                </div>
                <!-- End of Vendor Widget Banner -->
            </div>
            <div class="vendor-widget mb-0">
                <div class="vendor-widget-banner">
                    <figure class="vendor-banner">
                        <a href="vendor-dokan-store.html">
                            <img src="assets/images/demos/demo5/vendors/4.jpg" alt="Vendor Banner" width="1200"
                                height="390" style="background-color: #F5F5F5;" />
                        </a>
                    </figure>
                    <div class="vendor-details">
                        <figure class="vendor-logo">
                            <a href="vendor-dokan-store.html">
                                <img src="assets/images/demos/demo3/vendors/brand-4.jpg" alt="لوگوی فروشنده" width="90"
                                    height="90" />
                            </a>
                        </figure>
                        <div class="vendor-personal">
                            <h4 class="vendor-name">
                                <a href="vendor-dokan-store.html">فروشگاه گروه K</a>
                            </h4>
                            <span class="vendor-product-count">25 محصول </span>
                        </div>
                    </div>
                </div>
                <!-- End of Vendor Widget Banner -->
            </div>
        </div>
        <!-- End of Vendor Wrapper -->
    </div>
    <!-- End of Container -->

    <section class="grey-section appear-animate pt-10 pb-10">
        <div class="container mb-2">
            <div class="title-link-wrapper mb-4">
                <h2 class="title title-link">محصولات جذاب </h2>
                <a href="#">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
            </div>
            <div class="row grid grid-type">
                <div class="grid-item grid-item-single">
                    <div class="product product-single">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="product-gallery mb-0">
                                    <figure class="product-image">
                                        <img src="assets/images/demos/demo5/products/2-1.jpg"
                                            data-zoom-image="assets/images/demos/demo5/products/2-1.jpg"
                                            alt="Product Image" width="800" height="900">
                                    </figure>
                                </div>
                            </div>
                            <div class="col-md-6 pr-md-4 mt-4 mt-md-0">
                                <div class="product-details scrollable pl-0">
                                    <h2 class="product-title mb-1"><a href="product-default.html">لباس مردانه فصل آبی
                                            مردانه</a></h2>

                                    <hr class="product-divider">

                                    <div class="product-price mb-2"><ins class="new-price ls-50">150000 تومان -
                                            190000 تومان</ins></div>

                                    <div class="ratings-container mb-4">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 80%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="#" class="rating-reviews">(3 نظر )</a>
                                    </div>

                                    <div class="product-form product-variation-form product-size-swatch mb-3">
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

                                    <div class="product-form pt-4">
                                        <div class="product-qty-form mb-2 mr-2">
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

                                    <div class="social-links-wrapper mt-1">
                                        <div class="social-links">
                                            <div class="social-icons social-no-color border-thin">
                                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                                <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                                                <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                            </div>
                                        </div>
                                        <span class="divider d-xs-show"></span>
                                        <div class="product-link-wrapper d-flex">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                                            <a href="#"
                                                class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-2.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">کلاه ایمنی برتر</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">34000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-3.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">شارژر الکترونیکی تلفن هوشمند</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">36000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-4.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">اسکیت پان </a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">64000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-5.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">آبی اسکی چکمه </a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">64000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-6.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">دمبل </a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">69000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-7.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">دوربین حرفه ای عالی</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">123000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-8.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">نشانگر صدای نرم</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">234000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
                <div class="grid-item grid-item-widget">
                    <div class="product product-widget">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo5/products/2-9.jpg" alt="Product" width="300"
                                    height="338">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name">
                                <a href="product-default.html">اسکیت غلتکی</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">66000 تومان</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Grid Item -->
            </div>
        </div>
        <!-- End of Container -->
    </section>
    <!-- End of Grey Section -->

    <div class="container mt-10 pt-2">
        <div class="banner banner-simple appear-animate br-sm mb-10" style="background-image: url(assets/images/demos/demo5/banners/1.jpg);
                    background-color: #414548;">
            <div class="banner-content align-items-center">
                <div class="banner-price-info">
                    <div class="discount text-secondary font-weight-bolder ls-25 lh-1">
                        40<sup class="font-weight-bold p-relative">%</sup>
                        <sub class="font-weight-bold text-uppercase p-relative ls-normal">تخفیف </sub>
                    </div>
                    <p class="text-white font-weight-bolder text-capitalize mb-0 ls-10">مجموعه 1400</p>
                </div>
                <hr class="divider bg-white">
                <div class="banner-info mb-0">
                    <h3 class="banner-title text-white font-weight-normal ls-25">
                        ما پیشرو هستیم<br>
                        <strong>فروشنده ابزار Sk در ایالات متحده</strong>
                    </h3>
                    <a href="shop-banner-sidebar.html" class="btn btn-primary btn-link btn-underline btn-icon-right">
                        اکنون پیدا کن<i class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            <figure class="skrollable">
                <img src="assets/images/demos/demo5/banners/ski.png" alt="Banner"
                    data-bottom-top="transform: translateY(5vh);" data-top-bottom="transform: translateY(-5vh);">
            </figure>
        </div>
        <!-- End of Banner Simple -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link pt-1">پوشاک و پوشاک</h2>
            <a href="shop-boxed-banner.html">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
        </div>
        <div class="owl-carousel owl-theme products-apparel appear-animate row cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-7"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': true,
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
                            'items': 5
                        }
                    }
                }">
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/3-1-1.jpg" alt="Product" width="300"
                                height="338">
                            <img src="assets/images/demos/demo5/products/3-1-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">ساعت مچی چند منظوره</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(1 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">170000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/3-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">کمربند جیر مردانه</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 60%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(1 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">39000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/3-3.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">ساعت طلا</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 100%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(5 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">210000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/3-4-1.jpg" alt="Product" width="300"
                                height="338">
                            <img src="assets/images/demos/demo5/products/3-4-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">شارژر قابل حمل</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 100%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(8 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">26000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/3-5.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">روسری </a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(4 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">289000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
        </div>
        <!-- End of Prodcut Wrapper -->

        <div class="row grid grid-float appear-animate">
            <div class="col-lg-6 grid-item height-x2 grid-item-lg">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-1.jpg" alt="Banner" width="680" height="420"
                            style="background-color: #242529;" />
                    </figure>
                    <div class="banner-content text-center x-50 w-100 pl-4 pr-4">
                        <h5 class="banner-subtitle text-uppercase text-secondary font-weight-bold ls-25 mb-1">
                            برای سامسونگ </h5>
                        <h3 class="banner-title text-capitalize text-white mb-0">معرفی گلکسی نوت 10</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 grid-item height-x1 grid-item-md">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-2.jpg" alt="Banner" width="680" height="200"
                            style="background-color: #EEEEF0;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle font-weight-normal text-uppercase mb-0">مجموعه جدید </h5>
                        <h3 class="banner-title text-capitalize ls-25">دستگاه ژیمناستیک</h3>
                        <div class="banner-price-info text-default font-weight-normal">
                            تخفیف فوری <strong class="text-primary text-uppercase">25% تخفیف </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-3.jpg" alt="Banner" width="330" height="200"
                            style="background-color: #519DD9;" />
                    </figure>
                    <div class="banner-content text-center x-50 y-50 w-100">
                        <h3 class="banner-title text-white text-uppercase mb-1 font-weight-bolder">سلام !</h3>
                        <p class="text-white mb-0">100000 تومان خرج کنید و از زمین اصلی ایران رایگان تحویل بگیرید</p>
                        <p class="text-white mb-0">(فقط زیر 100000 تومان سفارش ندهید)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="assets/images/demos/demo5/banners/2-4.jpg" alt="Banner" width="330" height="200"
                            style="background-color: #5F5657;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h3 class="banner-title text-white text-capitalize ls-25">مردانه <br> با تجهیزات جانبی </h3>
                        <del class="old-price text-white">489000 تومان</del>
                        <div class="new-price text-secondary ls-25">289000 تومان</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Grid -->

        <div class="title-link-wrapper appear-animate mt-10 mb-4">
            <h2 class="title title-link pt-1">لوازم الکترونیکی مصرفی</h2>
            <a href="#" class="ls-normal">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
        </div>
        <div class="owl-carousel owl-theme row appear-animate cols-lg-5 cols-md-4 cols-sm-3 cols-2 mb-9"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': true,
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
                            'items': 5
                        }
                    }
                }">
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/4-1-1.jpg" alt="Product" width="300"
                                height="338">
                            <img src="assets/images/demos/demo5/products/4-1-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">نشانگر صدا کلاه قرمز</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(1 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">65000 تومان - 69000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/4-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">ساعت سیاه مردانه</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 60%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(1 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">75000 تومان</ins><del class="old-price">79000 تومان</del>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/4-3.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">بلندگوی عالی صدا</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 100%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(5 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">62000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/4-4-1.jpg" alt="Product" width="300"
                                height="338">
                            <img src="assets/images/demos/demo5/products/4-4-2.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">مینی هدفون بی سیم</a></h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 100%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(8 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">49000 تومان </ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center">
                    <figure class="product-media">
                        <a href="product-default.html">
                            <img src="assets/images/demos/demo5/products/4-5.jpg" alt="Product" width="300"
                                height="338">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                title="افزودن به علاقه مندیها"></a>
                            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
                            <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                title="افزودن برای مقایسه"></a>
                        </div>
                    </figure>
                    <div class="product-details">
                        <h4 class="product-name"><a href="product-default.html">مرطوب کننده با عملکرد خوب</a>
                        </h4>
                        <div class="ratings-container">
                            <div class="ratings-full">
                                <span class="ratings" style="width: 80%;"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <a href="product-default.html" class="rating-reviews">(4 نظر )</a>
                        </div>
                        <div class="product-price">
                            <ins class="new-price">79000 تومان</ins>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Product Wrap -->
        </div>
        <!-- End of Products -->

        <h2 class="title text-left title-client  mb-5 appear-animate">مشتریان ما</h2>
        <div class="owl-carousel owl-theme row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2 brands-wrapper br-sm mb-10 appear-animate"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': false,
                    'autoplay': false,
                    'autoplayTimeout': 4000,
                    'loop': true,
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
                            'items': 6
                        },
                        '1200': {
                            'items': 8
                        }
                    }
                }">
            <figure>
                <img src="assets/images/demos/demo5/brands/1.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/2.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/3.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/4.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/5.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/6.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/7.png" alt="Brand" width="310" height="180" />
            </figure>
            <figure>
                <img src="assets/images/demos/demo5/brands/8.png" alt="Brand" width="310" height="180" />
            </figure>
        </div>
        <!-- End of Brands Wrapper -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link title-blog">از وبلاگ ما</h2>
            <a href="blog-listing.html" class="font-weight-bold font-size-normal ls-normal">مشاهده همه مقالات</a>
        </div>
        <div class="owl-carousel owl-theme post-wrapper appear-animate row cols-lg-4 cols-md-3 cols-sm-2 cols-1 mb-3"
            data-owl-options="{
                    'rtl': true,
                    'items': 4,
                    'nav': false,
                    'dots': true,
                    'loop': false,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '992': {
                            'items': 4,
                            'dots': false
                        }
                    }
                }">
            <div class="post text-center overlay-zoom">
                <figure class="post-media br-sm">
                    <a href="post-single.html">
                        <img src="assets/images/demos/demo5/blogs/1.jpg" alt="Post" width="280" height="180"
                            style="background-color: #828896;" />
                    </a>
                </figure>
                <div class="post-details">
                    <div class="post-meta">
                        توسط <a href="#" class="post-author">جعفر خان </a>
                        - <a href="#" class="post-date mr-0">1400/5/20</a>
                    </div>
                    <h4 class="post-title"><a href="post-single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h4>
                    <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i
                            class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            <div class="post text-center overlay-zoom">
                <figure class="post-media br-sm">
                    <a href="post-single.html">
                        <img src="assets/images/demos/demo5/blogs/2.jpg" alt="Post" width="280" height="180"
                            style="background-color: #C7C7C5;" />
                    </a>
                </figure>
                <div class="post-details">
                    <div class="post-meta">
                        توسط <a href="#" class="post-author">جعفر خان </a>
                        - <a href="#" class="post-date mr-0">1400/5/20</a>
                    </div>
                    <h4 class="post-title"><a href="post-single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h4>
                    <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i
                            class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            <div class="post text-center overlay-zoom">
                <figure class="post-media br-sm">
                    <a href="post-single.html">
                        <img src="assets/images/demos/demo5/blogs/3.jpg" alt="Post" width="280" height="180"
                            style="background-color: #BDBDB5;" />
                    </a>
                </figure>
                <div class="post-details">
                    <div class="post-meta">
                        توسط <a href="#" class="post-author">جعفر خان </a>
                        - <a href="#" class="post-date mr-0">1400/5/20</a>
                    </div>
                    <h4 class="post-title"><a href="post-single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a>
                    </h4>
                    <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i
                            class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            <div class="post text-center overlay-zoom">
                <figure class="post-media br-sm">
                    <a href="post-single.html">
                        <img src="assets/images/demos/demo5/blogs/4.jpg" alt="Post" width="280" height="180"
                            style="background-color: #546B73;" />
                    </a>
                </figure>
                <div class="post-details">
                    <div class="post-meta">
                        توسط <a href="#" class="post-author">جعفر خان </a>
                        - <a href="#" class="post-date mr-0">1400/5/20</a>
                    </div>
                    <h4 class="post-title"><a href="post-single.html">لورم ایپسوم متن ساختگی با تولید سادگی</a></h4>
                    <a href="post-single.html" class="btn btn-link btn-dark btn-underline">ادامه مطلب <i
                            class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
        </div>
        <!-- Post Wrapper -->

        <div class="title-link-wrapper appear-animate mb-4">
            <h2 class="title title-link title-viewed">بازدید های اخیر</h2>
            <a href="shop-list.html" class="font-weight-bold font-size-normal ls-normal">
                محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
        </div>
        <div class="owl-carousel owl-theme owl-shadow-carousel appear-animate row cols-xl-8 cols-lg-6 cols-md-4 cols-2 pb-2 mb-10"
            data-owl-options="{
                    'rtl': true,
                    'nav': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 5
                        },
                        '992': {
                            'items': 6
                        },
                        '1200': {
                            'items': 8,
                            'dots': false
                        }
                    }
                }">
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/3-5.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">روسری </a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/1-1-1.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">ساعت چرمی بند</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/4-1-1.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">نشانگر صدا کلاه قرمز</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/2-3.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">شارژر الکترونیکی تلفن هوشمند</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/2-5.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">آبی اسکی چکمه </a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/2-8.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">نشانگر صدای نرم</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/3-1-1.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">ساعت مچی چند منظوره</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
            <div class="product-wrap">
                <div class="product text-center product-absolute">
                    <figure class="product-media">
                        <a href="#">
                            <img src="assets/images/demos/demo5/products/1-2.jpg" alt="Category image" width="130"
                                height="146" style="background-color: #fff" />
                        </a>
                    </figure>
                    <h4 class="product-name">
                        <a href="product-default.html">ماشین در حال اجرا</a>
                    </h4>
                </div>
            </div>
            <!-- End of Product Wrap -->
        </div>
        <!-- End of Reviewed Producs -->
    </div>
</main>
@endsection