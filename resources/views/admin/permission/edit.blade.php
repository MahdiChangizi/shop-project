@extends('admin.layouts.master')

@section('content')

<form action="{{ route('admin.permission.update', $permission->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div>


    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن دسترسی</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام دسترسی</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $permission->name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>



        <div class="m-auto float-end">
            <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection
