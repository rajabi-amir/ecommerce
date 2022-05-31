@php
$categories = \App\Models\Category::where('parent_id', 0)->get();
@endphp
<header class="header header-border">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">به فروشگاه {{env('APP_NAME')}} خوش آمدید</p>
            </div>
            <div class="header-right">
                <a href="blog.html" class="d-lg-show">وبلاگ </a>
                <a href="contact-us.html" class="d-lg-show">تماس با ما </a>
                @auth
                <a href="{{route('home.user_profile')}}" class="d-lg-show">حساب کاربری من </a>
                <a href="#language"><i class="w-icon-account"></i>{{Auth::user()->name}} </a>
                <a href="{{route('logout')}}"
                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                        class="w-icon-power-off"></i> خروج</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endauth
                @guest
                @if (!request()->routeIs('login') && !request()->routeIs('register'))
                <a href="#login-popup" class="d-lg-show login sign-in"><i class="w-icon-account"></i>ورود
                </a>
                <span class="delimiter d-lg-show">/</span>
                <a href="#login-popup" class="ml-0 d-lg-show login register">ثبت نام </a>
                @endif
                @endguest
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger">
                </a>
                <a href="demo5.html" class="logo ml-lg-0">
                    <img src="/assets/images/demos/demo5/Logo-1.png" alt="logo" width="145" height="45" />
                </a>
                @livewire('home.sections.search-box')
                <div class="dropdown-box">
                    <a href="#ENG">
                        <img src="/assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                            class="dropdown-image" />
                        فارسی </a>
                    <a href="#FRA">
                        <img src="/assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8"
                            class="dropdown-image" />
                        انگلیسی </a>
                </div>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">تماس با ما</a> :
                        </h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="{{route('home.profile.wishlist.index')}}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">لیست علاقه مندیها </span>
                </a>
                <a class="compare label-down link d-xs-show" href="{{route('home.compare.index')}}">
                    <i class="w-icon-compare"></i>
                    <span class="compare-label d-lg-show">مقایسه کردن </span>
                </a>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="{{route('home.cart.index')}}" class="cart-toggle label-down link">

                        <i class="w-icon-cart">

                            <span class="cart-count" id="header-cart-count">{{Cart::getContent()->count()}}</span>

                        </i>
                        <span class="cart-label">سبد خرید </span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>سبد خرید فروشگاه </span>
                            <a href="#" class="btn-close">بستن <i class="w-icon-long-arrow-left"></i></a>
                        </div>
                        <div class="products">

                            @if (! \Cart::isEmpty())
                            @foreach (\Cart::getContent() as $item)
                            <div class="product product-cart" id="{{$item->id}}">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">{{$item->name}} -
                                        <span>{{$item->attributes->value}}</span></a>

                                    <div class="price-box">
                                        <span class="product-quantity">{{$item->quantity}} </span>
                                        <span class="product-price">{{number_format($item->price)}} تومان</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}"
                                            alt="product" height="84" width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close"
                                    onclick="return delete_product_cart('{{$item->id}}')">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <div class="cart-total">
                            <label>مجموع کل: </label>
                            <span class="price">
                                {{number_format(\Cart::getTotal())}}

                                تومان</span>
                        </div>

                        <div class="cart-action">
                            <a href="{{route('home.cart.index')}}" class="btn btn-dark btn-outline btn-rounded">نمایش
                                سبد </a>
                            <a href="checkout.html" class="btn btn-primary  btn-rounded">پرداخت </a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header {{request()->routeIs('home') ? 'has-dropdown':''}}">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown {{request()->routeIs('home')? 'show-dropdown':''}}"
                        data-visible="true">
                        <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static" title="جستجوی دسته بندیها">
                            <i class="w-icon-category"></i>
                            <span>دسته بندیها </span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">

                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('home.products.search',['slug'=>$category->slug])}}">
                                        <i class="{{$category->icon}}"></i>{{$category->name}}
                                    </a>
                                    @if(count($category->children))
                                    <ul class="megamenu">
                                        <li>
                                            <ul>
                                                @foreach ($category->children as $ChildrenCategory )
                                                <li><a
                                                        href="{{route('home.products.index',['slug'=>$ChildrenCategory->slug])}}">{{$ChildrenCategory->name}}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li @class(['active'=>request()->routeIs('home')])>
                                <a href="{{route('home')}}">صفحه اصلی </a>
                            </li>
                            <li @class(['active'=>request()->is('categories/*')])>
                                <a href="shop-banner-sidebar.html">فروشگاه </a>

                                <!-- Start of Megamenu -->
                                <ul class="megamenu">
                                    <li>
                                        <h4 class="menu-title">صفحات فروشگاه </h4>
                                        <ul>
                                            <li><a href="shop-banner-sidebar.html">بنر با نوار کناری</a></li>
                                            <li><a href="shop-boxed-banner.html">بنر جعبه ای </a></li>
                                            <li><a href="shop-fullwidth-banner.html">بنر عرض کامل </a></li>
                                            <li><a href="shop-horizontal-filter.html">فیلتر افقی<span
                                                        class="tip tip-hot">داغ </span></a></li>
                                            <li><a href="shop-off-canvas.html">نوار کناری <span class="tip tip-new">جدید
                                                    </span></a></li>
                                            <li><a href="shop-infinite-scroll.html">اسکرول بی نهایت آژاکس</a>
                                            </li>
                                            <li><a href="shop-right-sidebar.html">نوار کناری چپ</a></li>
                                            <li><a href="shop-both-sidebar.html">دو نوار کناری </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="menu-title">چیدمان فروشگاه </h4>
                                        <ul>
                                            <li><a href="shop-grid-3cols.html">3 حالت ستون ها </a></li>
                                            <li><a href="shop-grid-4cols.html">4 حالت ستون ها </a></li>
                                            <li><a href="shop-grid-5cols.html">5 حالت ستون ها </a></li>
                                            <li><a href="shop-grid-6cols.html">6 حالت ستون ها </a></li>
                                            <li><a href="shop-grid-7cols.html">7 حالت ستون ها </a></li>
                                            <li><a href="shop-grid-8cols.html">8 حالت ستون ها </a></li>
                                            <li><a href="shop-list.html">حالت لیست </a></li>
                                            <li><a href="shop-list-sidebar.html">حالت لیست با نوار کناری</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="menu-title">صفحات محصول </h4>
                                        <ul>
                                            <li><a href="product-variable.html">محصول متغیر </a></li>
                                            <li><a href="product-featured.html">ویژه و حراج </a></li>
                                            <li><a href="product-accordion.html">داده ها در آکاردئون</a></li>
                                            <li><a href="product-section.html">داده ها در بخش ها</a></li>
                                            <li><a href="product-swatch.html">سواچ تصویر</a></li>
                                            <li><a href="product-extended.html">اطلاعات گسترده </a>
                                            </li>
                                            <li><a href="product-without-sidebar.html">بدون نوار کناری </a></li>
                                            <li><a href="product-video.html">360<sup>درجه </sup> ویدئو <span
                                                        class="tip tip-new">جدید </span></a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="menu-title">طرح بندی محصولات </h4>
                                        <ul>
                                            <li><a href="product-default.html">پیشفرض <span class="tip tip-hot">داغ
                                                    </span></a></li>
                                            <li><a href="product-vertical.html">تصاویر عمودی محصول </a></li>
                                            <li><a href="product-grid.html">تصاویر شبکه ای </a></li>
                                            <li><a href="product-masonry.html">ساختمانی </a></li>
                                            <li><a href="product-gallery.html">گالری </a></li>
                                            <li><a href="product-sticky-info.html">اطلاعات چسبناک </a></li>
                                            <li><a href="product-sticky-thumb.html">تصاویر کوچک چسبناک</a></li>
                                            <li><a href="product-sticky-both.html">چسبناک هر دو </a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- End of Megamenu -->
                            </li>
                            <li>
                                <a href="vendor-dokan-store.html">فروشنده </a>
                                <ul>
                                    <li>
                                        <a href="vendor-dokan-store-list.html">لیست فروشگاه ها</a>
                                        <ul>
                                            <li><a href="vendor-dokan-store-list.html">لیست فروشگاه 1</a></li>
                                            <li><a href="vendor-wcfm-store-list.html">لیست فروشگاه 2</a></li>
                                            <li><a href="vendor-wcmp-store-list.html">لیست فروشگاه 3</a></li>
                                            <li><a href="vendor-wc-store-list.html">لیست فروشگاه 4</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="vendor-dokan-store.html">فروشگاه فروشنده</a>
                                        <ul>
                                            <li><a href="vendor-dokan-store.html">فروشنده 1</a></li>
                                            <li><a href="vendor-wcfm-store-product-grid.html">فروشنده 2</a>
                                            </li>
                                            <li><a href="vendor-wcmp-store-product-grid.html">فروشنده 3</a>
                                            </li>
                                            <li><a href="vendor-wc-store-product-grid.html">فروشنده 4</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li @class(['active'=>request()->is('blogs/*')])>
                                <a href="blog.html">وبلاگ </a>
                                <ul>
                                    <li><a href="blog.html">کلاسیک </a></li>
                                    <li><a href="blog-listing.html">فهرست </a></li>
                                    <li>
                                        <a href="blog-grid-3cols.html">گرید </a>
                                        <ul>
                                            <li><a href="blog-grid-2cols.html">ستون 2 گرید</a></li>
                                            <li><a href="blog-grid-3cols.html">ستون 3 گرید</a></li>
                                            <li><a href="blog-grid-4cols.html">ستون 4 گرید</a></li>
                                            <li><a href="blog-grid-sidebar.html">نوار کناری گرید</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog-masonry-3cols.html">ساختمانی </a>
                                        <ul>
                                            <li><a href="blog-masonry-2cols.html">ستون 2 ساختمانی</a></li>
                                            <li><a href="blog-masonry-3cols.html">ستون 3 ساختمانی</a></li>
                                            <li><a href="blog-masonry-4cols.html">ستون 4 ساختمانی</a></li>
                                            <li><a href="blog-masonry-sidebar.html">نوار کناری ساختمان </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="blog-mask-grid.html">ماسک </a>
                                        <ul>
                                            <li><a href="blog-mask-grid.html">ماسک وبلاگ گرید </a></li>
                                            <li><a href="blog-mask-masonry.html">بلاک ماسک ساختمانی </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="post-single.html">تک نوشته </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="about-us.html">صفحات </a>
                                <ul>

                                    <li><a href="about-us.html">درباره ما </a></li>
                                    <li><a href="become-a-vendor.html">تبدیل شدن به یک فروشنده </a></li>
                                    <li><a href="contact-us.html">تماس با ما </a></li>
                                    <li><a href="faq.html">گفت و گو </a></li>
                                    <li><a href="error-404.html">ارور 404 </a></li>
                                    <li><a href="coming-soon.html">به زودی </a></li>
                                    <li><a href="wishlist.html">علاقه مندیها </a></li>
                                    <li><a href="cart.html">سبد خرید </a></li>
                                    <li><a href="checkout.html">پرداخت </a></li>
                                    <li><a href="my-account.html">حساب کاربری من </a></li>
                                    <li><a href="compare.html">مقایسه </a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="elements.html">عناصر </a>
                                <ul>
                                    <li><a href="element-accordions.html">آکاردئون </a></li>
                                    <li><a href="element-alerts.html">هشدار و اطلاع رسانی</a></li>
                                    <li><a href="element-blog-posts.html">نوشته های وبلاگ </a></li>
                                    <li><a href="element-buttons.html">دکمه ها </a></li>
                                    <li><a href="element-cta.html">فراخوانی برای اقدام </a></li>
                                    <li><a href="element-icons.html">آیکن ها </a></li>
                                    <li><a href="element-icon-boxes.html">باکس آیکنها </a></li>
                                    <li><a href="element-instagrams.html">اینستاگرام </a></li>
                                    <li><a href="element-categories.html">دسته بندی محصول </a></li>
                                    <li><a href="element-products.html">محصولات </a></li>
                                    <li><a href="element-tabs.html">برگه ها </a></li>
                                    <li><a href="element-testimonials.html">مشتریان </a></li>
                                    <li><a href="element-titles.html">عنوان ها </a></li>
                                    <li><a href="element-typography.html">تایپوگرافی </a></li>

                                    <li><a href="element-vendors.html">فروشندگان </a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>پیگیری سفارش</a>
                    <a href="#"><i class="w-icon-sale"></i>فروش ویژه </a>
                </div>
            </div>
        </div>
    </div>
</header>