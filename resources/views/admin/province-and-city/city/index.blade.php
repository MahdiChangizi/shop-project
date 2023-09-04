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
            <h5 class="card-title mb-3">شهر ها</h5>
            <a href="{{ route('admin.city.create') }}" class="btn btn-primary float-end">اضافه کردن شهر</a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام</th>
                        <th>استان</th>
                        <th>وضعیت</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <th>{{ $city->id }}</th>
                            <td>{{ $city->name }}</td>

                            <td>{{ $city->parent->name }}</td>


                            @if ($city->status == 1)
                                <td>
                                    <a href="{{ route('admin.city.status', $city->id) }}"
                                        class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.city.status', $city->id) }}"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                                </td>
                            @endif


                            <td>

                                <a href="{{ route('admin.city.edit', $city->id) }}" class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.city.delete', $city->id) }}"
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
        {{ $cities->links('pagination::bootstrap-5') }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
