<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="{{$setting->icon ? asset('storage/'.$setting->icon):'/images/logo.png'}}" width="45" style="margin-right:20px" alt="meta-webs"><span class="m-l-10"></span></a>

    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="#"><img default="" src="{{asset('storage/profile/admin.png')}}"></a>

                    <div class="detail">
                        <h6><strong>نام</strong></h6>
                        <small>مدیر سایت</small>
                    </div>
                </div>
            </li>
            <li @class(['active'=>Route::currentRouteName()==='admin.home'])>
                <a href="#"><i class="zmdi zmdi-view-dashboard zmdi-hc-2x"></i><span> داشبورد</span>
                </a>
            </li>

            <li @class(['active open'])> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label"></i><span>برند
                        ها</span></a>
                <ul class="ml-menu">
                    <li @class(['active'])><a href={{ route('admin.brands.index') }}>لیست برند ها</a></li>
                    <li @class(['active'])><a href={{ route('admin.brands.create') }}>ایجاد برند</a></li>
                </ul>
            </li>
            <li @class(['active open'])> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-hc-fw"></i><span>محصولات</span></a>
                <ul class="ml-menu">
                    <li @class(['active'])><a href={{ route('admin.attributes.index') }}>ویژگی ها</a></li>
                </ul>
            </li>


            <li><a target="_blank" href="https://app.raychat.io/login"><i class="zmdi zmdi-hc-fw"></i><span>چت
                        آنلاین</span></a>
            <li> <a href="#">
                    <i class="zmdi zmdi-hc-fw"></i><span>نظرات</span></a>
            </li>
            <li><a href="#"><i class="zmdi zmdi-hc-fw"></i><span>
                        درباره ما </span></a></li>
            <!-- تنظیمات -->
            <li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-settings zmdi-hc-spin"></i><span>تنظیمات</span></a>
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
