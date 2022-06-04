<div class="product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <a href="{{route('home.products.show' , ['product' => $Product->slug])}}">
                <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product->primary_image)}}" alt=" Product"
                    width="300" height="338">

                <img src="{{url(env('PRODUCT_IMAGES_UPLOAD_PATCH').$Product->images->first()->image)}}" alt="Product"
                    width="300" height="338">
            </a>

            <div class=" product-action-vertical">

                @if ($Product->checkUserWishlist(1))
                <a data-product="{{$Product->id}}" class="btn-product-icon btn-wishlist added w-icon-heart-full"
                    title="افزودن به علاقه مندیها"></a>
                @else
                <a data-product="{{$Product->id}}" class="btn-product-icon btn-wishlist w-icon-heart"
                    title="افزودن به علاقه مندیها"></a>
                @endif

                @if (session()->has('compareProducts'))

                @if (in_array($Product->id, session()->get('compareProducts')) )
                <a data-product="{{$Product->id}}" class="btn-product-icon btn-compare added w-icon-check-solid"
                    title="افزودن برای مقایسه"></a>
                @else
                <a data-product="{{$Product->id}}" class="btn-product-icon btn-compare w-icon-compare"
                    title="افزودن برای مقایسه"></a>
                @endif

                @else
                <a data-product="{{$Product->id}}" class="btn-product-icon btn-compare w-icon-compare"
                    title="افزودن برای مقایسه"></a>
                @endif


            </div>
        </figure>
        <div class="product-details">
            <h4 class="product-name"><a
                    href="{{route('home.products.show' , ['product' => $Product->slug])}}">{{$Product->name}}</a>
            </h4>

            <div class="product-price">
                @if ($Product->quantity_check)

                @if ($Product->sale_check)

                <ins class="new-price">{{number_format($Product->sale_check->sale_price)}}
                    تومان</ins>

                <del class="old-price">{{number_format($Product->sale_check->price)}}
                    تومان</del>
                @else
                <ins class="new-price">{{ number_format($Product->price_check->price) }}
                    تومان</ins>
                @endif
                @else
                <ins class="new-price">نا موجود</ins>

                @endif
            </div>
            <!-- <div class="ratings-container">

                <a class="btn btn-primary btn-outline btn-rounded btn-sm light"><i class="w-icon-cart"> </i> افزودن به
                    سبد
                    خرید</a>
            </div> -->
        </div>
    </div>
</div>