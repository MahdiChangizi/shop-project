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
            <h5 class="card-title mb-3">برند ها</h5>
            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary float-end">اضافه کردن برند</a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام</th>
                        <th>توضیحات</th>
                        <th>لوگو</th>
                        <th>اسلاگ</th>
                        <th>وضعیت</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <th>{{ $brand->id }}</th>
                            <td>{{ $brand->persian_name }}</td>
                            <td>{{ Str::limit($brand->description, 10, ' ...') }}</td>

                            <td>
                                <img width="100" height="50" src="{{ asset('/adm/products/images/'. $brand->logo) }}">
                            </td>


                            <td>{{ $brand->slug }}</td>

                            @if ($brand->status == 1)
                                <td>
                                    <a href="{{ route('admin.brand.status', $brand->id) }}"
                                        class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.brand.status', $brand->id) }}"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                                </td>
                            @endif

                            <td>
                                <a href="{{ route('admin.brand.edit', $brand->id) }}"
                                    class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.brand.delete', $brand->id) }}"
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
        {{ $brands->links('pagination::bootstrap-5') }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
