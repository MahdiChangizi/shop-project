@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="user-profile-header-banner">
                <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top img-fluid">
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                <div class="flex-grow-1 mt-3 mt-sm-5">
                    <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                        <div class="user-profile-info">
                          @if (auth()->user()->profile)
                          <h4>{{ auth()->user()->FullName }}</h4>
                          @else
                          <a href="{{ route('admin.profile.setting') }}">پروفایل خود را کامل کنید!</a>
                          @endif
                            <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                @if (auth()->user()->profile)
                                  <li class="list-inline-item"><i class="ti ti-color-swatch"></i> ادمین</li>
                                  <li class="list-inline-item"><i class="ti ti-calendar"></i> {{ jdate(auth()->user()->created_at)->format('%A, %d %B %Y') }}</li>
                                @endif
                            </ul>
                        </div>
                        <a href="{{ route('admin.profile.setting') }}" class="btn btn-primary waves-effect waves-light">
                            <i class="ti ti-user-check me-1"></i>ویرایش
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@if (auth()->user()->profile)
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- About User -->
      <div class="card mb-4">
        <div class="card-body">
          <small class="card-text text-uppercase">پروفایل</small>
          <ul class="list-unstyled mb-4 mt-3">

            <li class="d-flex align-items-center mb-3">
              <i class="ti ti-user"></i><span class="fw-bold mx-2">نام و نام خانوادگی:</span> <span>{{ auth()->user()->FullName }}</span>
            </li>

            <li class="d-flex align-items-center mb-3">
              <i class="ti ti-check"></i><span class="fw-bold mx-2">وضعیت:</span> <span>{{ auth()->user()->mobile_verified_at !== null ? 'فعال' : 'غیر فعال' }}</span>
            </li>


          </ul>
          <small class="card-text text-uppercase">اطلاعات</small>
          <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
              <i class="ti ti-phone-call"></i><span class="fw-bold mx-2">شماره موبایل:</span>
              <span>{{ auth()->user()->mobile }}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
              <i class="ti ti-brand-skype"></i><span class="fw-bold mx-2">نام کاربری:</span>
              <span>{{ auth()->user()->userName }}</span>
            </li>
          </ul>
         
        </div>
      </div>
      <!--/ About User -->
    </div>
    {{--  --}}
</div>
@endif

@endsection
