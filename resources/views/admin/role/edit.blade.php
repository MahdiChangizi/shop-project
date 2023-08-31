@extends('admin.layouts.master')

@section('headTag')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
@endsection



@section('content')

<form action="{{ route('admin.role.update', $role->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<div>


    <div class="card mb-4">
      <h5 class="card-header mb-3">ویرایش کردن نقش</h5>
      <div class="card-body">

        <div class="mb-3 row">
          <label class="col-md-2 col-form-label">نام نقش</label>
          <div class="col-md-10">
            <input class="form-control mb-2" name="name" type="text" placeholder="نام را وارد کنید ..." value="{{ old('name', $role->name) }}">

            @error('name')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

          </div>
        </div>


        <div class="mb-3 row">
            <label for="permissions" class="col-md-2 col-form-label">دسترسی ها</label>
            <div class="col-md-10">
                <select id="permissions" name="permissions[]" class="select2 form-select" multiple>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $permission->name }}</option>
                    @endforeach
                </select>


                @error('permissions')
                    <span class="text-danger mt-3">{{ $message }}</span>
                @enderror


            </div>
        </div>


        <div class="m-auto float-end">
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">ویرایش کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection



@section('script')

<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

<script>
    $('#permissions').select2({})
</script>



@endsection
