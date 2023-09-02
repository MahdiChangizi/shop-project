@extends('coustomer.layouts.master')

@section('content')


<section class="">
    <section id="main-body-two-col" class="container-xxl body-container">
        <section class="row">

            {{-- sidbar --}}
            @include('coustomer.home.profile.layouts.sidbar')
            {{-- sidbar --}}

            @yield('main')
        </section>
    </section>
</section>

@include('sweetalert::alert')
@endsection
