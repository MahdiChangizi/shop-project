@extends('coustomer.layouts.master')

@section('content')

<section class="">
    <section id="main-body-two-col" class="container-xxl body-container">
        <section class="row">
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
                            <span class="sidebar-nav-item-title"><a class="p-3" href="my-profile.html">ویرایش حساب</a></span>
                        </section>
                        <section class="sidebar-nav-item">
                            <span class="sidebar-nav-item-title"><a class="p-3" href="#">خروج از حساب کاربری</a></span>
                        </section>

                    </section>
                    <!--end sidebar nav-->
                </section>

            </aside>
            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start vontent header -->
                    <section class="content-header mb-4">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>اطلاعات حساب</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end vontent header -->

                    <section class="d-flex justify-content-end my-4">
                        <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="#"><i class="fa fa-edit px-1"></i>ویرایش حساب</a>
                    </section>


                    <section class="row">


                        <section class="col-6 border-bottom mb-2 py-2">
                            <section class="field-title">نام کاربری</section>
                            <section class="field-value overflow-auto">{{ auth()->user()->userName }}</section>
                        </section>

                        <section class="col-6 border-bottom my-2 py-2">
                            <section class="field-title">شماره تلفن همراه</section>
                            <section class="field-value overflow-auto">{{ auth()->user()->mobile }}</section>
                        </section>

                        @if (auth()->user()->profile->first_name != null)
                        <section class="col-6 mb-2 py-2">
                            <section class="field-title">نام</section>
                            <section class="field-value overflow-auto">{{ auth()->user()->profile->first_name }}</section>
                        </section>
                        @else
                        <section class="col-6 mb-2 py-2">
                            <section class="field-title">نام</section>
                            <section class="field-value overflow-auto text-danger">...</section>
                        </section>
                        @endif

                        @if (auth()->user()->profile->last_name != null)
                        <section class="col-6 mb-2 py-2">
                            <section class="field-title">نام</section>
                            <section class="field-value overflow-auto">{{ auth()->user()->profile->last_name }}</section>
                        </section>
                        @else
                        <section class="col-6 mb-2 py-2">
                            <section class="field-title">نام خانوادگی</section>
                            <section class="field-value overflow-auto text-danger">...</section>
                        </section>
                        @endif




                    </section>




                </section>
            </main>
        </section>
    </section>
</section>

@endsection
