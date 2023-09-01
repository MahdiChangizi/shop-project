@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.city.update', $city->id) }}" method="POST">
    @csrf
    @method('put')
<div>

    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن شهر جدید</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام شهر</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $city->name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
            <label for="parent_id" class="col-md-2 col-form-label">انتخاب استان شهر</label>
            <div class="col-md-10">
                  <select name="parent_id" id="parent_id" class="form-select mb-2">
                      <option value="{{ null }}">انتخاب شهر</option>

                      @foreach ($provinces as $province)
                      <option value="{{ $province->id }}" {{ $province->name == $city->parent->id ? 'selected' : '' }} >{{ $province->name }}</option>
                      @endforeach

                  </select>
                  @error('parent_id')
                          <span class="text-danger mt-3">{{ $message }}</span>
                  @enderror
            </div>
          </div>


        <div class="mb-3 row">
          <label for="status" class="col-md-2 col-form-label">انتخاب وضعیت شهر</label>
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
            <a href="{{ route('admin.city.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>


@endsection
