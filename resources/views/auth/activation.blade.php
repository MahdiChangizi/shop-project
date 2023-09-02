@extends('auth.layout.master')
@section('content')

<style>
    /* تنظیم عرض باکس کلی */
    .login-wrapper {
        width: 370px; /* عرض جدید */
    }
</style>


<form action="{{ route('auth.activation') }}" method="POST">
@csrf

<section class="vh-100 d-flex justify-content-center align-items-center pb-5">
    <section class="login-wrapper mb-5">
        <!-- ... سایر بخش‌ها ... -->
        <section class="login-logo">
            <img src="{{ asset('coustomer/images/logo/4.png') }}" alt="">
        </section>
        <section class="login-title fs-5">فعال سازی حساب</section>

        <section class="login-input-text">
            <input type="text" name="mobile" class="form-control recaptcha-input" placeholder="شماره موبایل خود را وارد کنید ..." value="{{ old('mobile', auth()->user()->mobile) }}">
            @error('mobile')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </section>

        <section class="login-input-text">
            <input type="code" name="code" class="form-control recaptcha-input" placeholder="کد فعال سازی را وارد کنید ...">
            @error('code')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </section>


        <section class="login-btn d-grid g-2">
            <button class="btn btn-danger">تایید حساب </button>
        </section>


    </section>
</section>

</form>

@endsection
