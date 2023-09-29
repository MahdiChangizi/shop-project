@extends('admin.layouts.master')

@section('content')

@if (Session::has('alert-success'))
<div class="alert alert-success">
    <ul>
        <li>{{ Session::get('alert-success') }}</li>
    </ul>
</div>
@endif

@if (Session::has('alert-error'))
<div class="alert alert-danger">
    <ul>
        <li>{{ Session::get('alert-error') }}</li>
    </ul>
</div>
@endif

<div class="card mb-4">
   
    <hr class="my-0">
    <div class="card-body">
      <form action="{{ route('admin.profile.settingUpdate', auth()->user()->id) }}" method="POST" class="fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3 col-md-6 fv-plugins-icon-container">
            <label for="first_name" class="form-label">نام</label>
            <input class="form-control" type="text" id="first_name" name="first_name"  @if(auth()->user()->profile) value="{{ old('first_name', auth()->user()->profile->first_name) }}" @endif  autofocus="">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            @error('first_name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 col-md-6 fv-plugins-icon-container">
            <label for="last_name" class="form-label">نام خانوادگی</label>
            <input class="form-control" type="text" name="last_name" id="last_name" @if(auth()->user()->profile) value="{{ old('last_name', auth()->user()->profile->last_name) }}" @endif>
          <div class="fv-plugins-message-container invalid-feedback"></div>
          @error('last_name')
                <span class="text-danger mt-3">{{ $message }}</span>
          @enderror
        </div>
        
        <div class="mb-3 col-md-6 fv-plugins-icon-container">
            <label for="profile" class="form-label">تصویر پروفایل</label>
            <input class="form-control" type="file" name="profile" id="profile">
            <div class="fv-plugins-message-container invalid-feedback"></div>
            @error('profile')
                  <span class="text-danger mt-3">{{ $message }}</span>
            @enderror
        </div>

        </div>

        <div class="mt-2">
          <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">ویرایش</button>
        </div>

    </form>
    </div>
    <!-- /Account -->
</div>


@endsection
