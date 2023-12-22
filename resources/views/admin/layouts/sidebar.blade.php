<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('admin.index')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/fava.jpg') }}" alt="logo.png">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Admin Panel</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div>داشبورد</div>
            </a>
        </li>

        {{-- category --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-category"></i>
                <div data-i18n="Users">دسته بندی ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.category.index') }}" class="menu-link">
                        <div data-i18n="List">همه دسته بندی ها</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- category --}}



        {{-- brand --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-text-wrap-disabled"></i>
                <div data-i18n="Users">برند ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.brand.index') }}" class="menu-link">
                        <div data-i18n="List">همه برند ها</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- brand --}}




        {{-- product --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                    <path d="M17 17h-11v-14h-2"></path>
                    <path d="M6 5l14 1l-1 7h-13"></path>
                 </svg></i>
                <div data-i18n="Users">محصولات</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.product.index') }}" class="menu-link">
                        <div data-i18n="List">همه محصولات</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- product --}}



        {{-- comments --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-dots" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                        <path d="M12 11l0 .01"></path>
                        <path d="M8 11l0 .01"></path>
                        <path d="M16 11l0 .01"></path>
                     </svg>
                </i>
                <div data-i18n="Users">کامنت ها</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.comment.index') }}" class="menu-link">
                        <div data-i18n="List">همه کامنت ها</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- comments --}}



        {{-- banner --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-flag-3" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 14h14l-4.5 -4.5l4.5 -4.5h-14v16"></path>
                     </svg>
                </i>
                <div data-i18n="Users">بنر تبلیغاتی</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.banner.index') }}" class="menu-link">
                        <div data-i18n="List">همه بنر ها</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- banner --}}







        {{-- users --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">کاربران</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.user.index') }}" class="menu-link">
                        <div data-i18n="List">همه کاربران</div>
                    </a>
                </li>
            </ul>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.user.indexAdmin') }}" class="menu-link">
                        <div data-i18n="List">کاربران ادمین</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- users --}}


        {{-- permission and role --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                     <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Users">مجوز و نقش ها</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.permission.index') }}" class="menu-link">
                        <div data-i18n="List">همه دسترسی ها</div>
                    </a>
                </li>
            </ul>


            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.role.index') }}" class="menu-link">
                        <div data-i18n="List">همه نقش ها</div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- permission and role --}}



        {{-- cities --}}
        <li class="menu-item">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-skyscraper" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 21l18 0"></path>
                        <path d="M5 21v-14l8 -4v18"></path>
                        <path d="M19 21v-10l-6 -4"></path>
                        <path d="M9 9l0 .01"></path>
                        <path d="M9 12l0 .01"></path>
                        <path d="M9 15l0 .01"></path>
                        <path d="M9 18l0 .01"></path>
                     </svg>
                </i>
                <div data-i18n="Users">استان ها و شهر ها</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.province.index') }}" class="menu-link">
                        <div data-i18n="List">استان ها</div>
                    </a>
                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.city.index') }}" class="menu-link">
                        <div data-i18n="List">شهر ها </div>
                    </a>
                </li>
            </ul>

        </li>
        {{-- End cities --}}



    </ul>


</aside>
