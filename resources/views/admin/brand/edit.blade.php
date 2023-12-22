@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن برند</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام برند</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $brand->persian_name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">توضیحات</label>
          <div class="col-md-10">
            <textarea class="form-control mb-2" placeholder="توضیحات را وارد کنید ..." name="description" cols="30" rows="10">{{ old('description', $brand->description) }}</textarea>

            @error('description')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">لوگو برند</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="logo" type="file" id="formFile">

            <div>
                <img class="w-50 mt-2 mb-4" src="{{ asset($brand->logo) }}" alt="">
            </div>

            @error('logo')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror
          </div>
        </div>


        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت برند</label>
          <div class="col-md-10">
                <select name="status" id="status" class="form-select mb-2">
                    <option value="{{ null }}">انتخاب وضعیت</option>
                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>فعال</option>
                </select>
                @error('status')
                        <span class="text-danger mt-3">{{ $message }}</span>
                @enderror
          </div>
        </div>




        <div class="m-auto float-end">
            <a href="{{ route('admin.brand.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection
