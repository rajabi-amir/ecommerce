<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="{{$setting->icon ? asset('storage/'.$setting->icon):'/images/logo.png'}}" width="45"
                style="margin-right:20px" alt="meta-webs"><span class="m-l-10"></span></a>

    </div>
    <div class="menu">
        <ul class="list" id="myList">
            <td>
                <div class="user-info">
                    <a class="image" href="#"><img default="" src="{{asset('storage/profile/admin.png')}}"></a>
                    <div class="detail">
                        <h6><strong>نام</strong></h6>
                        <small>مدیر سایت</small>
                    </div>
                </div>
            </td>

            <td>
                <div class="form-group row mr-1" id="search-item">
                    <label for="inputEmail3" class="col-11 col-form-label">جستجو </label>
                    <div class="col-11">
                        <input id="searchInput" class="form-control col-md-11" placeholder="یک عبارت بنویسید....">
                    </div>
                </div>
            </td>

            <li @class(['active'=>Route::currentRouteName()==='admin.home'])>
                <a href="#"><i class="zmdi zmdi-view-dashboard zmdi-hc-1x"></i><span> داشبورد</span>
                </a>
            </li>

            <li @class(['active open'])> <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-hc-fw"></i><span>محصولات</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.products.index') }}>لیست محصولات</a></li>
                    <li><a href={{ route('admin.products.create') }}>ایجاد محصول</a></li>
                    <li @class(['active'])><a href={{ route('admin.categories.index') }}>دسته بندی ها</a></li>
                    <li @class(['active'])><a href={{ route('admin.attributes.index') }}>ویژگی ها</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-assignment-o"></i><span>سفارشات</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.orders.index') }}>لیست سفارشات</a></li>
                    <li><a href={{ route('admin.transactions.index') }}>لیست تراکنش ها</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-border-color"></i><span>وبلاگ</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.posts.index') }}>لیست مطالب</a></li>
                    <li><a href={{ route('admin.posts.create') }}>ایجاد مطلب</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>برند
                        ها</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.brands.index') }}>لیست برند ها</a></li>
                    <li><a href={{ route('admin.brands.create') }}>ایجاد برند</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>کد
                        تخفیف</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.coupons.index') }}>لیست</a></li>
                    <li><a href={{ route('admin.coupons.create') }}>ایجاد کد تخفیف</a></li>
                </ul>
            </li>

            <li> <a href={{ route('admin.tags.create') }}><i class="zmdi zmdi-label"></i><span>تگ
                        ها</span></a>
                <ul class="ml-menu">
                </ul>
            </li>
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>بنر
                        ها</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.banners.index') }}>لیست بنر ها</a></li>
                    <li><a href={{ route('admin.banners.create') }}>ایجاد بنر</a></li>
                </ul>
            </li>

            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>سرویس
                        ها</span></a>
                <ul class="ml-menu">
                    <li><a href={{ route('admin.services.index') }}>لیست سرویس ها</a></li>
                    <li><a href={{ route('admin.services.create') }}>ایجاد سرویس</a></li>
                </ul>
            </li>

            <li><a target="_blank" href="https://app.raychat.io/login"><i class="zmdi zmdi-hc-fw"></i><span>چت
                        آنلاین</span></a>
            <li> <a href={{route('admin.comments.index')}}>
                    <i class="zmdi zmdi-hc-fw"></i><span>نظرات</span></a>
            </li>
            <li><a href="#"><i class="zmdi zmdi-hc-fw"></i><span>
                        درباره ما </span></a></li>
            <!-- تنظیمات -->
            <li> <a href="javascript:void(0);" class="menu-toggle"><i
                        class="zmdi zmdi-settings zmdi-hc-spin"></i><span>تنظیمات</span></a>
                <ul class="ml-menu">
                    <li><a href="#">ویرایش پروفایل کاربری </a></li>
                    <li><a href="#">تغییر کلمه عبور </a></li>
                </ul>
            </li>
            <!-- خروج -->
            <li><a href="#" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i> خروج
                </a>
            </li>
            <!-- خروج -->
        </ul>
    </div>
</aside>
@push('scripts')
<script>
$(document).ready(function() {
    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function() {
    if ($("#cheack_collapsed").hasClass("ls-toggle-menu")) {
        $('#search-item').hide();
    } else {
        $('#search-item').show();
    }

    $('.btn-menu').on('click', function() {
        if ($("#cheack_collapsed").hasClass("ls-toggle-menu")) {
            $('#search-item').hide();
        } else {
            $('#search-item').show();
        }
    });
});
</script>
@endpush