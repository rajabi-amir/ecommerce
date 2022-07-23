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
                <a href="{{route('contact-us')}}" class="d-lg-show">تماس با ما </a>
                @auth
                <a href="{{route('home.user_profile')}}" class="d-lg-show">حساب کاربری من </a>
                <a href="{{auth()->user()->hasRole('super-admin') ? route('admin.home'):'#'}}" class="font-size-md">
                    <i class="w-icon-account"></i>{{Auth::user()->name ?? auth()->user()->cellphone}}
                </a>
                <a href="{{route('logout')}}" class="font-size-md" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="w-icon-power-off"></i> خروج</a>
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
                @isset($setting->logo)
                <a href="{{route('home')}}" class="logo ml-lg-0">
                    <img src="{{asset('storage/logo/'.$setting->logo)}}" alt="logo" width="145" height="45" />
                </a>
                @endisset
                @livewire('home.sections.search-box')
                <div class="dropdown-box">
                    <a href="#ENG">
                        <img src="/assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8" class="dropdown-image" />
                        فارسی </a>
                    <a href="#FRA">
                        <img src="/assets/images/flags/fra.png" alt="FRA Flag" width="14" height="8" class="dropdown-image" />
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
                                        <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}" alt="{{$item->associatedModel->slug}}" height="84" width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" onclick="return delete_product_cart('{{$item->id}}')">
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
                            <a href="{{route('home.orders.checkout')}}" class="btn btn-primary  btn-rounded">پرداخت </a>
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
                    <div class="dropdown category-dropdown {{request()->routeIs('home')? 'show-dropdown':''}}" data-visible="true">
                        <a href="#" class="text-white category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="جستجوی دسته بندیها">
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
                                                <li><a href="{{route('home.products.index',['slug'=>$ChildrenCategory->slug])}}">{{$ChildrenCategory->name}}
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
                                <a href="{{route('home.products.search')}}">فروشگاه </a>

                                <!-- Start of Megamenu -->
                                <ul class="megamenu">
                                    @foreach ($categories as $category)
                                    <li>
                                        <h4 class="menu-title">{{$category->name}}</h4>
                                        @if(count($category->children))
                                        <ul>
                                            <li><a href="{{route('home.products.index',['slug'=>$ChildrenCategory->slug])}}">{{$ChildrenCategory->name}}
                                                </a>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                <!-- End of Megamenu -->
                            </li>

                            <li @class(['active'=>request()->is('blogs/*')])>
                                <a href="{{route('home.posts.index')}}">وبلاگ </a>

                            </li>

                            <li @class(['active'=>request()->routeIs('contact-us')])>
                                <a href="{{route('contact-us')}}">تماس با ما</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- <div class="header-right">
                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>پیگیری سفارش</a>
                    <a href="#"><i class="w-icon-sale"></i>فروش ویژه </a>
                </div> -->
            </div>
        </div>
    </div>
</header>
