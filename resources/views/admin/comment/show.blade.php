@extends('admin.layouts.master')

@section('content')
<div class="card mb-4">
    <h5 class="card-header mb-3">پاسخ به نظر کاربر</h5>
    <div class="card-body">


<div class="mb-3 row">
    <label class="col-md-2 col-form-label">نظر کاربر</label>
    <div class="col-md-10">
      <textarea class="form-control mb-2" cols="20" rows="6" disabled>{{ $comment->comment }}</textarea>

    </div>
  </div>


  <form action="{{ route('admin.comment.ShowCreate', $comment->id) }}" method="POST">
    @csrf
        <div class="mb-3 row">
            <label class="col-md-2 col-form-label">متن نظر شما</label>
            <div class="col-md-10">
            <textarea class="form-control mb-2" placeholder="نظر خود را وارد کنید ..." name="comment" cols="30" rows="10">{{ old('comment') }}</textarea>

            @error('comment')
                <span class="text-danger mt-3">{{ $message }}</span>
            @enderror

            </div>
        </div>

        <button type="submit" class="btn btn-success float-end">اضافه کردن نظر</button>

  </form>


    </div>
  </div>

@endsection

