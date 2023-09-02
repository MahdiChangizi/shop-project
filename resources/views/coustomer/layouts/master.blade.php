<!doctype html>
<html lang="fa" dir="rtl">
<head>
   @include('coustomer.layouts.headTag')
</head>
<body>


   @include('coustomer.layouts.navbar')



    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        @yield('content')

    </main>
    @include('coustomer.layouts.footer')




    @include('coustomer.layouts.script')
    @include('sweetalert::alert')

</body>
</html>
