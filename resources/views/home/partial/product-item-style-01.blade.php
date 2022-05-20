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
                <div class="ratings-full">
                    <span class="ratings" style="width: 80%;"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
            </div>
            <div class="product-price">
                @if ($Product_our_suggestion->quantity_check)
                @if ($Product_our_suggestion->sale_check)
                <ins class="new-price">{{number_format($Product_our_suggestion->sale_check->sale_price)}}
                    تومان</ins><del class="old-price">{{number_format($Product_our_suggestion->sale_check->price)}}
                    تومان</del>
                @endif
                @else
                <ins class="new-price">نا موجود</ins>
                @endif
            </div>
        </div>
    </div>
</div>