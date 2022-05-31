<div class="sticky-footer sticky-content fix-bottom">
    <a href="{{route('home')}}" class="sticky-link active">
        <i class="w-icon-home"></i>
        <p>خانه </p>
    </a>
    <a href="shop-banner-sidebar.html" class="sticky-link">
        <i class="w-icon-category"></i>
        <p>فروشگاه </p>
    </a>
    <a href="{{route('home.user_profile')}}" class="sticky-link">
        <i class="w-icon-account"></i>
        <p>حساب کاربری </p>
    </a>
    <div class="cart-dropdown dir-up">
        <a href="{{route('home.cart.index')}}" class="sticky-link">
            <i class="w-icon-cart"></i>
            <p>سبد خرید </p>
        </a>

        <!-- End of Dropdown Box -->
    </div>

    <div class="header-search hs-toggle dir-up">
        <a href="#" class="search-toggle sticky-link">
            <i class="w-icon-search"></i>
            <p>جستجو </p>
        </a>
        <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="جستجو" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
    </div>
</div>