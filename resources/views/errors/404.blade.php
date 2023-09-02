@extends('errors.layout')

@section('error')

    <div class="text-center">
        <div class="container-xxl container-p-y">
            <div class="misc-wrapper">
                <h2 class="mb-1 mt-4">صفحه یافت نشد!</h2>
                <p class="mb-4 mx-2">اوه! 😖 آدرس درخواستی در این سرور یافت نشد</p>
                <a href="{{ route('coustomer.home') }}" class="btn btn-primary mb-4">Back to home</a>
                <div class="mt-4">
                    <img src="{{ asset('assets/img/illustrations/page-misc-error.png') }}" width="225" class="img-fluid"/>
                </div>
            </div>
        </div>
        <div class="container-fluid misc-bg-wrapper">
            <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}"/>
        </div>
    </div>

@endsection
