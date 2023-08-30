<!doctype html>
<html lang="fa" dir="rtl">
<head>
@include('auth.hedtag')
</head>
<body>

    @yield('content')


    @include('auth.script')
    {!! htmlScriptTagJsApi() !!}
    @include('sweetalert::alert')

</body>
</html>
