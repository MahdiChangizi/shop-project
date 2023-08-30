@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">اضافه کردن محصول جدید</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام محصول</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name') }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">قیمت محصول</label>
            <div class="col-md-10">
              <input class="form-control mb-2" name="price" type="text" placeholder="قیمت را وارد کنید ..." value="{{ old('price') }}">

              @error('price')
                  <span class="text-danger mt-3">{{ $message }}</span>
              @enderror

            </div>
          </div>



          <div class="mb-3 row">
            <label class="col-md-2 col-form-label">تعداد کالای موجود</label>
            <div class="col-md-10">
              <input class="form-control mb-2" name="frozen_number" type="text" placeholder="تعداد کالای موجود را وارد کنید ..." value="{{ old('frozen_number') }}">

              @error('frozen_number')
                  <span class="text-danger mt-3">{{ $message }}</span>
              @enderror

            </div>
          </div>



        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">توضیحات</label>
          <div class="col-md-10">
            <textarea class="form-control mb-2" placeholder="توضیحات را وارد کنید ..." name="description" cols="30" rows="10">{{ old('description') }}</textarea>

            @error('description')
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


        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت محصول</label>
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
          <label for="parent" class="col-md-2 col-form-label">انتخاب دسته بندی</label>
          <div class="col-md-10">
            <select id="parent" name="category_id" class="form-select mb-2">
                <option value="{{ null }}">انتخاب دستبندی</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
                    @error('category_id')
                            <span class="text-danger mt-3">{{ $message }}</span>
                    @enderror
          </div>
        </div>


        <div class="mb-3 row">
          <label for="parent" class="col-md-2 col-form-label">انتخاب برند</label>
          <div class="col-md-10">
            <select id="parent" name="brand_id" class="form-select mb-2">
                <option value="{{ null }}">انتخاب برند</option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
              </select>
                    @error('brand_id')
                            <span class="text-danger mt-3">{{ $message }}</span>
                    @enderror
          </div>
        </div>

        <div class="mb-3 row">
            <h4 class="col-md-2 col-form-label">ویژگی محصولات</h4>
            <div class="col-md-10">

                <div>
                    <h4 class="btn btn-primary" id="add-feature">افزودن ویژگی</h4>
                    <div id="feature-container">
                        <!-- اینجا ویژگی‌ها اضافه می‌شوند -->
                    </div>
                </div>



              </div>
            </div>



        <div class="m-auto float-end">
            <a href="{{ route('admin.product.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">اضافه کردن</button>
        </div>

      </div>

    </div>
</div>
</form>


@endsection


@section('script')
<script>
    $(document).ready(function () {
        var featureCounter = 0; // یک شمارنده برای نام‌گذاری منحصر به فرد نیم‌ینپوت‌ها

        $("#add-feature").click(function () {
            var featureContainer = $("#feature-container");
            var featureRow = $("<div class='row mb-2'></div>");

            // ایجاد نام‌های منحصر به فرد بر اساس شمارنده
            var featureNameInput = $("<div class='col'><input type='text' class='form-control' name='attributes[" + featureCounter + "][name]' placeholder='ویژگی محصول'></div>");
            var featureValueInput = $("<div class='col'><input type='text' class='form-control' name='attributes[" + featureCounter + "][value]' placeholder='مقدار ویژگی محصول'></div>");
            var removeButton = $("<div class='col'><button class='btn btn-danger'>حذف</button></div>");

            // اضافه کردن ویژگی‌ها و دکمه حذف به ردیف جدید
            featureRow.append(featureNameInput);
            featureRow.append(featureValueInput);
            featureRow.append(removeButton);

            featureContainer.append(featureRow);

            // حذف ردیف در صورت فشردن دکمه حذف
            removeButton.click(function () {
                featureRow.remove();
            });

            featureCounter++; // افزایش شمارنده برای نام‌گذاری منحصر به فرد نیم‌ینپوت‌ها
        });
    });
</script>



@endsection
