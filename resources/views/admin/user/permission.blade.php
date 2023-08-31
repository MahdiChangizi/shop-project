@extends('admin.layouts.master')

@section('headTag')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
@endsection



@section('content')

<form action="{{ route('admin.role.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div>


    <div class="card mb-4">
      <h5 class="card-header mb-3">اضافه کردن دسترسی</h5>
      <div class="card-body">


        <div class="mb-3 row">
            <label for="role" class="col-md-2 col-form-label">دسترسی ها</label>
            <div class="col-md-10">
                <select id="role" name="role[]" class="select2 form-select" multiple>
                    @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}" {{ in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'selected' : '' }} >{{ $permission->name }}</option>
                    @endforeach
                </select>


                @error('role')
                    <span class="text-danger mt-3">{{ $message }}</span>
                @enderror


            </div>
        </div>


        <div class="m-auto float-end">
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">بازگشت</a>
            <button type="submit" class="btn btn-success">اضافه کردن</button>
        </div>

      </div>

    </div>
</div>
</form>
@endsection



@section('script')

<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

<script>
    $('#role').select2({})
</script>



@endsection