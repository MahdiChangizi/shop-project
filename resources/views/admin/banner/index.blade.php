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
            <h5 class="card-title mb-3">بنر ها</h5>
            <a href="{{ route('admin.banner.create') }}" class="btn btn-primary float-end">اضافه کردن بنر</a>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>لینک</th>
                        <th>بنر</th>
                        <th>وضعیت</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <th>{{ $banner->id }}</th>
                            <td>{{ Str::limit($banner->url, 35, '...') }}</td>
                            <td>
                                <img src="{{ asset($banner->image) }}" width="100" alt="{{ $banner->id }}">
                            </td>




                            @if ($banner->status == 1)
                                <td>
                                    <a href="{{ route('admin.banner.status', $banner->id) }}"
                                        class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.banner.status', $banner->id) }}"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                                </td>
                            @endif

                            <td>
                                <a href="{{ route('admin.banner.edit', $banner->id) }}"
                                    class="btn btn-sm rounded-pill btn-info waves-effect waves-light">ویرایش</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.banner.delete', $banner->id) }}"
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
        {{-- {{ $banners->links('pagination::bootstrap-5') }} --}}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
