@extends('admin.layouts.master')

@section('headTag')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
@endsection



@section('content')

<form action="{{ route('admin.user.role.create', $user->id) }}" method="POST">
    @csrf
<div>


    <div class="card mb-4">
      <h5 class="card-header mb-3">اضافه کردن نقش</h5>
      <div class="card-body">


        <div class="mb-3 row">
            <label for="roles" class="col-md-2 col-form-label">نقش ها</label>
            <div class="col-md-10">
                <select id="roles" name="roles[]" class="select2 form-select" multiple>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }} >{{ $role->name }}</option>
                    @endforeach
                </select>


                @error('roles')
                    <span class="text-danger mt-3">{{ $message }}</span>
                @enderror


            </div>
        </div>


        <div class="m-auto float-end">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">بازگشت</a>
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
    $('#roles').select2({})
</script>



@endsection
