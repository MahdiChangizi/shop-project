<aside id="sidebar" class="sidebar col-md-3">
    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <!-- start sidebar nav-->
        <section class="sidebar-nav">
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="my-orders.html">سفارش های من</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="my-addresses.html">آدرس های من</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="my-favorites.html">لیست علاقه مندی</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('coustomer.profile') }}">ویرایش حساب</a></span>
            </section>
            <section class="sidebar-nav-item">
                <span class="sidebar-nav-item-title">
                    <form action="{{ route('auth.logout') }}" method="POST">
                        <button class="btn p-3">خروج از حساب کاربری</button>
                    </form>
                </span>
            </section>

        </section>
        <!--end sidebar nav-->
    </section>
</aside>
