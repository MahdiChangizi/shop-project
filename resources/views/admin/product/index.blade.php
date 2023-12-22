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
            <h5 class="card-title mb-3">محصولات</h5>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-end">اضافه کردن محصول</a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                <tr>
                    <th>آیدی</th>
                    <th>نام</th>
                    <th>برند</th>
                    <th>قیمت</th>
                    <th>اسلاگ</th>
                    <th>دسته بندی</th>
                    <th>وضعیت</th>
                    <th>آپشن ها</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->price }}</td>

                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->category}}</td>

                        @if ($product->status == 1)
                            <td>
                                <a href="{{ route('admin.product.status', $product->id) }}"
                                   class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                            </td>
                        @else
                            <td>
                                <a href="{{ route('admin.product.status', $product->id) }}"
                                   class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                            </td>
                        @endif

                        <td>
                            <a href="{{ route('admin.product.attributes', $product->id) }}"
                               class="btn btn-sm rounded-pill btn-warning waves-effect waves-light">ویژگی ها</a>


                            <a href="{{ route('admin.product.edit', $product->id) }}"
                               class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>


                            <form id="deleteButton" class="d-inline"
                                  action="{{ route('admin.product.delete', $product->id) }}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <button type="button"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light deleteButton"
                                        id="deleteButton">حذف
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
