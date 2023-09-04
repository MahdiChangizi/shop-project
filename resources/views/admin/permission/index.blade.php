@extends('admin.layouts.master')

@section('content')


    @if (Session::has('alert-success'))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get('alert-success') }}</li>
            </ul>
        </div>
    @endif


    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-3">دسترسی ها</h5>
            <a href="{{ route('admin.permission.create') }}" class="btn btn-primary float-end">اضافه کردن دسترسی</a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <th>{{ $permission->id }}</th>
                            <td>{{ $permission->name }}</td>

                            <td>
                                <a href="{{ route('admin.permission.edit', $permission->id) }}"
                                    class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.permission.delete', $permission->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light deleteButton"
                                        id="deleteButton">حذف</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $permissions->links('pagination::bootstrap-5') }}
    </div>


@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
