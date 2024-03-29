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
                            "{{env('BANNER_IMAGES_PATCH').$slider->image}}");'>
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
                                    <a href="shop-banner-sidebar.html"
                                        class="btn btn-dark btn-rounded">{{$slider->button_text}} </a>
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

                                @if ($banner_left_top)

                                <figure>
                                    <img src="{{url(env('BANNER_IMAGES_PATCH').$banner_left_top->image)}}"
                                        alt="{{$banner_left_top->title}}" width="330" height="239"
                                        style="background-color: #605959;" />
                                </figure>

                                <div class="banner-content">
                                    <h3 class="banner-title text-white text-capitalize ls-25">
                                        {{$banner_left_top->title}}<br> </h3>
                                    <h5 class="banner-subtitle text-white text-capitalize ls-25">
                                        {{$banner_left_top->text}} </h5>
                                    <div class="banner-price-info text-white text-uppercase ls-25">
                                        {{$banner_left_top->button_text}} </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-6 mb-4">
                            <div class="category-banner banner banner-fixed br-sm">
                                @if ($banner_left_bottom)
                                <figure>
                                    <img src="{{url(env('BANNER_IMAGES_PATCH').$banner_left_bottom->image)}}"
                                        alt="{{$banner_left_bottom->title}}" width="330" height="239"
                                        style="background-color: #eff5f5;" />
                                </figure>
                                <div class="banner-content">
                                    <h3 class="banner-title text-white text-capitalize ls-25 mb-3">
                                        {{$banner_left_bottom->title}}<br></h3>

                                    <div class="new-price text-secondary ls-25">{{$banner_left_bottom->button_text}}
                                    </div>
                                </div>
                                @endif

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
                <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+1d"
                    data-relative="true" data-compact="true">2:05:12</div>
            </div>
            <a href="#" class="ml-0">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
        </div>
        <div class="owl-carousel owl-theme appear-animate row cols-lg-5 cols-md-4 cols-sm-12 cols-4 mb-6"
            data-owl-options="{
                    
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
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        }
                    }
                }">


            <!-- End of Product Wrap -->

            <!-- محصولات تخفیف دار -->
            @each('home.partial.product-item', $Products_auction_today, 'Product')
            <!-- محصولات تخفیف دار پایان-->

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
            @foreach ($categories as $category)
            <div class="category category-icon">
                <a href="shop-banner-sidebar.html">
                    <figure class="category-media">
                        <i class="{{$category->icon}}"></i>
                    </figure>
                </a>
                <div class="category-content">
                    <h4 class="category-name"><a href="shop-banner-sidebar.html">{{$category->name}} </a></h4>
                </div>
            </div>
            @endforeach


        </div>
        <!-- End of Icon Category Wrapper -->

        <div class="category-banner-wrapper appear-animate row mb-5">
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed br-sm">
                    @if ($banner_left_category)
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_left_category->image}}"
                            alt="{{$banner_left_category->title}}" width="680px" height="180px"
                            style="background-color: #EAEAEA;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle text-capitalize font-weight-normal ls-25">
                            {{$banner_left_category->title}}
                        </h5>
                        <h3 class="banner-title text-capitalize ls-10">{{$banner_left_category->text}}</h3>
                        <a href="{{$banner_left_category->link}}"
                            class="btn btn-dark btn-link btn-underline btn-icon-right">
                            اکنون پیدا کن<i class="w-icon-long-arrow-left"></i>
                        </a>
                    </div>
                    @endif

                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="banner banner-fixed br-sm">
                    @if ($banner_right_category)
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_right_category->image}}"
                            alt="{{$banner_right_category->title}}" width="680px" height="180px"
                            style="background-color: #565960;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle text-white text-capitalize font-weight-normal ls-25">
                            {{$banner_right_category->title}}</h5>
                        <h3 class="banner-title text-white text-capitalize">{{$banner_right_category->text}}</h3>
                        <a href="{{$banner_right_category->link}}"
                            class="btn btn-white btn-link btn-underline btn-icon-right">
                            اکنون پیدا کن<i class="w-icon-long-arrow-left"></i>
                        </a>
                    </div>
                    @endif


                </div>
            </div>
        </div>
        <!-- End of Category Banner Wrapper -->
    </div>
    <!-- End of Container -->

    <section class="grey-section appear-animate pt-10 pb-10">
        <div class="container mb-2">
            <div class="title-link-wrapper mb-4">
                <h2 class="title title-link">پیشنهادات ما </h2>
                <a href="#">محصولات بیشتر <i class="w-icon-long-arrow-left"></i></a>
            </div>
            <div class="row grid grid-type">
                @if ($Products_our_suggestion_unit)

                @endif
                <!-- Grid Item -->
                @each('home.partial.product-item-style-01', $Products_our_suggestion, 'Product_our_suggestion')
                <!-- End of Grid Item -->
            </div>
        </div>
        <!-- End of Container -->
    </section>
    <!-- End of Grey Section -->

    <div class="container mt-10 pt-2">
        @if ($banner_width)
        <div class="banner banner-simple appear-animate br-sm mb-10" style=" background-color: #414548;
        background-image:url('{{env("BANNER_IMAGES_PATCH").$banner_width->image}}'); ">
            <div class=" banner-content align-items-center">
                <div class="banner-price-info">
                    <div class="discount text-secondary font-weight-bolder ls-25 lh-1">

                        <sub class="font-weight-bold text-uppercase p-relative ls-normal">{{$banner_width->title}}
                        </sub>
                    </div>
                    <p class="text-white font-weight-bolder text-capitalize mb-0 ls-10">{{$banner_width->text}} </p>
                </div>
                <hr class="divider bg-white">
                <div class="banner-info mb-0">
                    <h3 class="banner-title text-white font-weight-normal ls-25">

                        <strong>{{$banner_width->button_text}}</strong>
                    </h3>
                    <a href="{{$banner_width->button_link}}"
                        class="btn btn-primary btn-link btn-underline btn-icon-right">
                        اکنون پیدا کن<i class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
        </div>
        @endif
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
            @if ($category_mobile)
            @each('home.partial.product-item', $category_mobile->products, 'Product')
            @endif
            <!-- End of Product Wrap -->
        </div>
        <!-- End of Prodcut Wrapper -->

        <div class="row grid grid-float appear-animate">
            @if ($banner_end_right)
            <div class="col-lg-6 grid-item height-x2 grid-item-lg">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_end_right->image}}"
                            alt="{{$banner_end_right->title}}" width="680" height="420"
                            style="background-color: #242529;" />
                    </figure>
                    <div class="banner-content text-center x-50 w-100 pl-4 pr-4">
                        <h5 class="banner-subtitle text-uppercase text-secondary font-weight-bold ls-25 mb-1">
                            {{$banner_end_right->title}} </h5>
                        <h3 class="banner-title text-capitalize text-white mb-0">{{$banner_end_right->text}}</h3>
                    </div>
                </div>
            </div>
            @endif

            @if ($banner_end_left_top)
            <div class="col-lg-6 grid-item height-x1 grid-item-md">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_end_left_top->image}}"
                            alt="{{$banner_end_left_top->title}}" width="680" height="200"
                            style="background-color: #EEEEF0;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h5 class="banner-subtitle font-weight-normal text-uppercase mb-0">
                            {{$banner_end_left_top->title}} </h5>
                        <h3 class="banner-title text-capitalize ls-25">{{$banner_end_left_top->text}}</h3>
                        <div class="banner-price-info text-default font-weight-normal">
                            {{$banner_end_left_top->button_text}} <strong class="text-primary text-uppercase"> </strong>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($banner_end_left_bottom_1)
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_end_left_bottom_1->image}}"
                            alt="{{$banner_end_left_bottom_1->title}}" width="330" height="200"
                            style="background-color: #519DD9;" />
                    </figure>
                    <div class="banner-content text-center x-50 y-50 w-100">
                        <h3 class="banner-title text-white text-uppercase mb-1 font-weight-bolder">سلام !</h3>
                        <p class="text-white mb-0">{{$banner_end_left_bottom_1->title}}</p>
                        <p class="text-white mb-0">{{$banner_end_left_bottom_1->button_text}}</p>
                    </div>
                </div>
            </div>
            @endif
            @if ($banner_end_left_bottom_2)
            <div class="col-lg-3 col-sm-6 grid-item height-x1 grid-item-sm">
                <div class="banner banner-fixed br-sm">
                    <figure>
                        <img src="{{env('BANNER_IMAGES_PATCH').$banner_end_left_bottom_2->image}}"
                            alt="{{$banner_end_left_bottom_2->title}}" width="330" height="200"
                            style="background-color: #5F5657;" />
                    </figure>
                    <div class="banner-content y-50">
                        <h3 class="banner-title text-white text-capitalize ls-25"> {{$banner_end_left_bottom_2->title}}
                        </h3>
                        <div class="new-price text-secondary ls-25">{{$banner_end_left_bottom_2->button_text}}</div>
                    </div>
                </div>
            </div>
            @endif

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
            @if ($category_laptap)
            @each('home.partial.product-item', $category_laptap->products->take(5), 'Product')
            @endif


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
            @foreach ($brands as $brand)
            <figure>
                <img src="{{url(env('BRAND_IMAGES_PATCH').$brand->image)}}" alt="{{$brand->slug}}" width="310"
                    height="180" />
            </figure>
            @endforeach
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

            @foreach ($posts as $post )
            <div class="post text-center overlay-zoom">
                <figure class="post-media br-sm">
                    <a href="{{route('home.posts.show' , ['post' => $post->id] )}}">
                        <img src="{{url('storage/'.$post->image->url)}}" alt="{{$post->title}}" width="280" height="180"
                            style="background-color: #546B73;" />
                    </a>
                </figure>
                <div class="post-details">
                    <div class="post-meta">
                        توسط <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                            class="post-author">{{$post->user->name}} </a>
                        - <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                            class="post-date mr-0">{{Hekmatinasser\Verta\Verta::instance($post->created_at)->format('Y/n/j')}}</a>
                    </div>
                    <h4 class="post-title"><a
                            href={{route('home.posts.show' , ['post' => $post->id] )}}">{{$post->title}}</a></h4>
                    <a href="{{route('home.posts.show' , ['post' => $post->id] )}}"
                        class="btn btn-link btn-dark btn-underline">ادامه مطلب <i
                            class="w-icon-long-arrow-left"></i></a>
                </div>
            </div>
            @endforeach

        </div>
        <!-- Post Wrapper -->

        <!-- End of Reviewed Producs -->
    </div>
</main>
@endsection