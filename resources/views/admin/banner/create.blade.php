@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">اضافه کردن بنر</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">لینک بنر</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="url" type="text" placeholder="لینک را وارد کنید ..." value="{{ old('url') }}">

            @error('url')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>





        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت بنر</label>
          <div class="col-md-10">
                <select name="status" id="status" class="form-select mb-2">
                    <option  value="{{ null }}">انتخاب وضعیت</option>
                    <option value="0">غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
                @error('status')
                        <span class="text-danger mt-3">{{ $message }}</span>
                @enderror
          </div>
        </div>


        <div class="mb-3 row">
          <label for="position" class="col-md-2 col-form-label">انتخاب موقعیت بنر</label>
          <div class="col-md-10">
                <select name="position" id="position" class="form-select mb-2">
                    <option value="top-right">بالا-راست</option>
                    <option value="top-left">بالا-چپ</option>
                    <option value="between-items">میان-محصولات</option>
                    <option value="bottom-items">پایین-محصولات</option>
                </select>
                @error('position')
                        <span class="text-danger mt-3">{{ $message }}</span>
                @enderror
          </div>
        </div>


        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">تصویر</label>
            <div class="col-md-10">
              <input class="form-control mb-2" name="image" type="file" id="formFile">
              @error('image')
                  <span class="text-danger mt-3">{{ $message }}</span>
              @enderror
            </div>
          </div>


        <div class="m-auto float-end">
            <a href="{{ route('admin.banner.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">اضافه کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection
