@extends('coustomer.home.profile.layouts.master')

@section('main')
<main id="main-body" class="main-body col-md-9">
    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

        <!-- Start content header -->
        <section class="content-header mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="content-header-title">
                    <span>ویرایش اطلاعات حساب</span>
                </h2>
            </div>
        </section>
        <!-- End content header -->

        <section class="d-flex justify-content-end my-4">
            <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="{{ route('coustomer.profile') }}">
                <i class="fa fa-edit px-1"></i>
                بازگشت
            </a>
        </section>

        <section class="row">


            <form action="{{ route('coustomer.updateProfile', auth()->user()->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="userName">نام کاربری</label>
                            <input type="text" name="userName" class="form-control" id="userName" placeholder="نام کاربری خود را وارد کنید ..." value="{{ old('userName', auth()->user()->userName) }}">
                            @error('userName')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="نام خود را وارد کنید ..." value="{{ old('first_name', auth()->user()->profile ? auth()->user()->profile->first_name : '') }}">
                            @error('first_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="نام خانوادگی خود را وارد کنید ..." value="{{ old('last_name', auth()->user()->profile ? auth()->user()->profile->last_name : '') }}">
                            @error('last_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-danger">ویرایش</button>
                </div>

            </form>


        </section>
    </section>
</main>

@endsection
