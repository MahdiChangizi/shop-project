@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن دسته بندی</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام دسته بندی</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $category->name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">توضیحات</label>
          <div class="col-md-10">
            <textarea class="form-control mb-2" placeholder="توضیحات را وارد کنید ..." name="description" cols="30" rows="10">{{ old('description', $category->description) }}</textarea>

            @error('description')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">تصویر</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="image" type="file" id="formFile">

            <div>
                <img class="mt-2 mb-5 w-50" src="{{ asset($category->image) }}" alt="">
            </div>


            @error('image')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror
          </div>
        </div>


        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت دسته بندی</label>
          <div class="col-md-10">
                <select name="status" id="status" class="form-select mb-2">
                    <option>انتخاب وضعیت</option>
                    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>فعال</option>
                </select>
                @error('status')
                        <span class="text-danger mt-3">{{ $message }}</span>
                @enderror
          </div>
        </div>


        <div class="mb-3 row">
            <label for="parent" class="col-md-2 col-form-label">انتخاب دستبندی</label>
            <div class="col-md-10">
              <select id="parent" name="parent_id" class="form-select mb-2">
                  <option value="{{ null }}">انتخاب دستبندی</option>
                  @foreach ($allCategories as $allCategory)
                  <option value="{{ $allCategory->id }}">{{ $allCategory->name }}</option>
                  @endforeach
                </select>
                      @error('parent_id')
                              <span class="text-danger mt-3">{{ $message }}</span>
                      @enderror
            </div>
          </div>




        <div class="m-auto float-end">
            <a href="{{ route('admin.category.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection
