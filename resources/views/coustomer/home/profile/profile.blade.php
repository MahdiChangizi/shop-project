@extends('coustomer.home.profile.layouts.master')

@section('main')
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
            <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="{{ route('coustomer.editProfile') }}">
                <i class="fa fa-edit px-1"></i>
                ویرایش حساب
            </a>
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


            <section class="col-6 mb-2 py-2">
                <section class="field-title">نام</section>
                <section class="field-value overflow-auto">
                    {{ auth()->user()->profile ? auth()->user()->profile->first_name : '...' }}
                </section>
            </section>


            <section class="col-6 mb-2 py-2">
                <section class="field-title">نام خانوادگی</section>
                <section class="field-value overflow-auto">
                    {{ auth()->user()->profile ? auth()->user()->profile->last_name : '...' }}
                </section>
            </section>


        </section>




    </section>
</main>
@endsection
