<div class="product text-center">
    <figure class="product-media">
        <a href="product-default.html">
            <img src="{{asset('storage/primary_image/'.$product->primary_image)}}" alt="Product" width="295" height="335">
        </a>
        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="افزودن به سبد خرید"></a>
            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>
            <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="مقایسه کردن"></a>
            <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="نمایش سریع"></a>
        </div>
    </figure>
    <div class="product-details">
        <h3 class="product-name">
            <a href="product-default.html">{{$product->name}}</a>
        </h3>
        <div class="product-price">{{$product->variations()->orderBy('price','desc')->first()->price}} تومان</div>
    </div>
</div>
