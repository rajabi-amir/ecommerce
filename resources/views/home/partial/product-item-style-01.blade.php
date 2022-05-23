<div class="grid-item grid-item-widget">
    <div class="product product-widget">
        <figure class="product-media">
            <a href="{{route('home.products.show' , ['product' => $Product_our_suggestion->slug])}}">
                <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$Product_our_suggestion->primary_image)}}"
                    alt="Product">
            </a>
        </figure>
        <div class="product-details">
            <h4 class="product-name">
                <a
                    href="{{route('home.products.show' , ['product' => $Product_our_suggestion->slug])}}">{{$Product_our_suggestion->name}}</a>
            </h4>
            <div class="ratings-container">
                <div class="ht-product-ratting-wrap mt-4">
                    <div data-rating-stars="5" data-rating-readonly="true"
                        data-rating-value="ceil($product->rates->avg('rate'))">
                    </div>
                </div>
            </div>
            <div class="product-price">
                @if ($Product_our_suggestion->quantity_check)

                @if ($Product_our_suggestion->sale_check)

                <ins class="new-price">{{number_format($Product_our_suggestion->sale_check->sale_price)}}
                    تومان</ins>
                </br>

                <del class="old-price">{{number_format($Product_our_suggestion->sale_check->price)}}
                    تومان</del>
                @else
                <ins class="new-price">{{ number_format($Product_our_suggestion->price_check->price) }}
                    تومان</ins>
                @endif
                @else
                <ins class="new-price">نا موجود</ins>

                @endif
            </div>
        </div>
    </div>
</div>