<tr id="{{$wishlist->product->id}}-wish">
    <td class="product-thumbnail">
        <div class="p-relative">
            <a href="{{route('home.products.show' , ['product' => $wishlist->product->slug])}}">
                <figure>
                    <img src="{{url(env('PRODUCT_PRIMARY_IMAGES_UPLOAD_PATCH').$wishlist->product->primary_image)}}"
                        alt="{{$wishlist->product->slug}}" width="300" height="338">
                </figure>
            </a>
            <button onclick="return send('{{$wishlist->product->id}}')" class="btn btn-close"><i
                    class="fas fa-times"></i></button>
        </div>
    </td>
    <td class="product-name">
        <a href="{{route('home.products.show' , ['product' => $wishlist->product->slug])}}">
            {{$wishlist->product->name}}
        </a>
    </td>
    <td class="product-price">
        @if ($wishlist->product->quantity_check)

        @if ($wishlist->product->sale_check)

        <ins class="new-price">{{number_format($wishlist->product->sale_check->sale_price)}}
            تومان</ins>

        <del class="old-price">{{number_format($wishlist->product->sale_check->price)}}
            تومان</del>
        @else
        <ins class="new-price">{{ number_format($wishlist->product->price_check->price) }}
            تومان</ins>
        @endif
        @else
        <ins class="new-price">نا موجود</ins>

        @endif
    </td>
    <td class="product-stock-status">
        <span class="wishlist-in-stock"> </span>
    </td>
    <td class="wishlist-action">
        <div class="d-lg-flex">
            <a href="{{route('home.products.show' , ['product' => $wishlist->product->slug])}}"
                class="btn btn-quickview btn-outline btn-default btn-rounded btn-sm mb-2 mb-lg-0">نمایش
            </a>
            <!-- <a href="#" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart">افزودن به سبد</a> -->
        </div>
    </td>
</tr>