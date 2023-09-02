@extends('auth.layout.master')
@section('content')

<style>
    /* تنظیم عرض باکس کلی */
    .login-wrapper {
        width: 370px; /* عرض جدید */
    }
</style>


<form action="{{ route('auth.login') }}" method="POST">
@csrf

<section class="vh-100 d-flex justify-content-center align-items-center pb-5">
    <section class="login-wrapper mb-5">
        <!-- ... سایر بخش‌ها ... -->
        <section class="login-logo">
            <img src="{{ asset('coustomer/images/logo/4.png') }}" alt="">
        </section>
        <section class="login-title fs-5">ورود</section>

        <section class="login-input-text">
            <input type="text" name="mobile" class="form-control recaptcha-input" placeholder="شماره موبایل خود را وارد کنید ..." value="{{ old('mobile') }}">
            @error('mobile')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </section>

        <section class="login-input-text">
            <input type="password" name="password" class="form-control recaptcha-input" placeholder="رمز عبور خود را وارد کنید ...">
            @error('password')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </section>

        <section class="login-input-text">
            {!! htmlFormSnippet() !!}
            @error('g-recaptcha-response')
                <span class="text-danger mt-2">{{ $message }}</span>
            @enderror
        </section>

        <section class="login-btn d-grid g-2">
            <button class="btn btn-danger">ورود به آمازون</button>
        </section>


        <section>
            <div class="mb-2">
                <a href="#" class="text-decoration-none">رمز عبورم را فراموش کردم!</a>
            </div>
            <div>
                <a href="{{ route('auth.registerForm') }}" class="text-decoration-none">ثبت نام در سایت</a>
            </div>
        </section>


    </section>
</section>

</form>
@endsection


