@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.province.update', $province->id) }}" method="POST">
    @csrf
    @method('put')
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن استان جدید</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام استان</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $province->name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>



        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت استان</label>
          <div class="col-md-10">
                <select name="status" id="status" class="form-select mb-2">
                    <option value="{{ null }}">انتخاب وضعیت</option>
                    <option value="0" {{  $province->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                    <option value="1" {{  $province->status == 1 ? 'selected' : '' }}>فعال</option>
                </select>
                @error('status')
                        <span class="text-danger mt-3">{{ $message }}</span>
                @enderror
          </div>
        </div>




        <div class="m-auto float-end">
            <a href="{{ route('admin.province.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>


@endsection
