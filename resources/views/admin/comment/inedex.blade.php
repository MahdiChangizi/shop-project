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
            <h5 class="card-title mb-3">کامنت ها</h5>
        </div>

        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th>آیدی</th>
                        <th>کامنت</th>
                        <th>نویسنده</th>
                        <th>محصول</th>
                        <th>زیر دسته</th>
                        <th>وضعیت</th>
                        <th>آپشن ها</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <th>{{ $comment->id }}</th>
                            <td>{{ Str::limit($comment->comment, 10, '...') }}</td>
                            <td>{{ $comment->user->userName }}</td>
                            <td>{{ $comment->product->id }}- {{ $comment->product->name }}</td>

                            @if ($comment->parent_id !== null)
                            <td class="text-warning"> {{ $comment->parent->id }}- {{ Str::limit($comment->parent->comment, 10, '...') }}</td>
                            @else
                            <td class="text-danger">ندارد</td>
                            @endif


                            @if ($comment->status == 1)
                                <td>
                                    <a href="{{ route('admin.comment.status', $comment->id) }}"
                                        class="btn rounded-pill btn-sm btn-success waves-effect waves-light">فعال</a>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('admin.comment.status', $comment->id) }}"
                                        class="btn rounded-pill btn-sm btn-danger waves-effect waves-light">غیر فعال</a>
                                </td>
                            @endif

                            <td>
                                <a href="{{ route('admin.comment.show', $comment->id) }}"
                                    class="btn btn-sm rounded-pill btn-info waves-effect waves-light">پاسخ</a>

                                <form id="deleteButton" class="d-inline" action="{{ route('admin.comment.delete', $comment->id) }}"
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
        {{ $comments->links('pagination::bootstrap-5') }}
    </div>

@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete')
@endsection
