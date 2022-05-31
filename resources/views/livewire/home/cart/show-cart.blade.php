<div>
    @section('title', "سبد خرید")
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{route('home.cart.index')}}">سبد خرید فروشگاه </a></li>
                    <li><a href="checkout.html">پرداخت </a></li>
                    <li><a href="order.html">سفارش کامل شد</a></li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name"><span>محصول </span></th>
                                    <th></th>
                                    <th class="product-price"><span>قیمت</span></th>
                                    <th class="product-quantity"><span>تعداد</span></th>
                                    <th class="product-subtotal"><span>جمع کل</span></th>
                                </tr>
                            </thead>
                            @if (\Cart::isEmpty())
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">سبد خرید شما خالی است</td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                <input type="number" wire:model='quantitypro'>
                                {{$quantitypro}}
                                @foreach($cartitems as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a
                                                href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                                <figure>
                                                    <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$item->associatedModel->primary_image)}}"
                                                        alt="product" width="300" height="338">
                                                </figure>
                                            </a>
                                            <button type="submit" class="btn btn-close"><i
                                                    class="fas fa-times"></i></button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a
                                            href="{{route('home.products.show',['product'=>$item->associatedModel->slug])}}">
                                            {{$item->name}}
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount"
                                            id="amount">{{number_format($item->price)}}
                                            تومان</span></td>
                                    <span id="price-1" hidden>{{$item->price}}</span>
                                    <td class="product-quantity">
                                        <div class="input-group">
                                            <input class="quantity form-control" id="quantity-1"
                                                value="{{$item->quantity}}" type="number" min="1"
                                                max="{{$item->attributes->quantity}}">
                                            <button class="quantity-plus w-icon-plus"></button>
                                            <button class="quantity-minus w-icon-minus"></button>
                                        </div>

                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount" id="product-subtotal">

                                            تومان
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif

                        </table>

                        <div class="cart-action mb-6">
                            <a href="{{route('home')}}"
                                class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-right"></i>ادامه خرید </a>
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart"
                                value="پاک کردن سبد">پاک کردن سبد </button>
                            <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart"
                                value="بروزرسانی سبد">بروزرسانی سبد</button>
                        </div>

                        <form class="coupon">
                            <h5 class="title coupon-title font-weight-bold text-uppercase">انواع کد تخفیف </h5>
                            <input type="text" class="form-control mb-4" placeholder="وارد کردن کد تخفیف..." required />
                            <button class="btn btn-dark btn-outline btn-rounded">اعمال کد</button>
                        </form>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <h3 class="cart-title text-uppercase">مجموع سبد خرید</h3>
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">جمع کل</label>
                                    <span>100000 تومان</span>
                                </div>

                                <hr class="divider">

                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">جمع کل</label>
                                    <span>100000 تومان</span>
                                </div>

                                <hr class="divider">

                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">جمع کل</label>
                                    <span>100000 تومان</span>
                                </div>

                                <hr class="divider">
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">جمع کل</label>
                                    <span>100000 تومان</span>
                                </div>

                                <hr class="divider">

                                <ul class="shipping-methods mb-2">

                                </ul>

                                <hr class="divider mb-6">
                                <div class="order-total d-flex justify-content-between align-items-center">
                                    <label>مجموع خرید</label>
                                    <span class="ls-50">100000 تومان</span>
                                </div>
                                <a href="#" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                    برای تسویه حساب ادامه دهید<i class="w-icon-long-arrow-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
</div>