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
            <h5 class="card-title mb-3">کاربر ها</h5>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>نام کاربری</th>
                        <th>شماره موبایل</th>
                        <th>تاییدیه تلفن همراه</th>
                        <th>ادمین</th>
                        <th>اسلاگ</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->userName }}</td>
                            <td>{{ $user->mobile }}</td>

                            @if ($user->mobile_verified_at == null)
                            <td class="text-danger"> تایید نشده</td>
                            @else
                            <td class="text-success">تایید شده</td>
                            @endif


                            @if ($user->user_type == 1)
                            <td class="text-success">هست</td>
                            @else
                            <td class="text-danger">نیست</td>
                            @endif

                            <td>{{ $user->slug }}</td>



                            <td>
                                <form id="deleteButton" class="d-inline" action="{{ route('admin.user.delete', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
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

    <div class="text-center mt-5">
        {{ $users->links() }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
