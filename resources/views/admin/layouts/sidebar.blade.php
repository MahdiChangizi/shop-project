<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Vuexy</span>
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
                        <div data-i18n="List">لیست دسته بندی ها</div>
                    </a>
                </li>
            </ul>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.category.create') }}" class="menu-link">
                        <div data-i18n="List">اضافه کردن دسته بندی</div>
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
