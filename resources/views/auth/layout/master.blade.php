<!doctype html>
<html lang="fa" dir="rtl">
<head>
@include('auth.layout.hedtag')
</head>
<body>

    @yield('content')


    @include('auth.layout.script')
    {!! htmlScriptTagJsApi() !!}
    @include('sweetalert::alert')

</body>
</html>
