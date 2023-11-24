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
            <h5 class="card-title mb-3">دسته بندی ها</h5>
            <form class="d-flex justify-content-between" action="{{ route('admin.category.index') }}" method="get">
                <div class="input-group w-25">
                    <input type="search" name="search" class="form-control" placeholder="خدا برات زنتو حفظ کنه">
                    <button class="btn btn-warning" type="submit">search</button>
                </div>
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary float-end">اضافه کردن دسته بندی</a>
            </form>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام</th>
                        <th>توضیحات</th>
                        <th>زیر دسته</th>
                        <th>اسلاگ</th>
                        <th>وضعیت</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ Str::limit($category->description, 10, ' ...') }}</td>

                            @if ($category->parent_id !== null)
                            <td class="text-warning"> {{ $category->parent->id }}- {{ $category->parent->name }}</td>
                            @else
                            <td class="text-danger">ندارد</td>
                            @endif

                            <td>{{ $category->slug }}</td>

                            @if ($category->status == 1)
                                <td>
                                    <a href="{{ route('admin.category.status', $category->id) }}"
                                        class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.category.status', $category->id) }}"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                                </td>
                            @endif

                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.category.delete', $category->id) }}"
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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
