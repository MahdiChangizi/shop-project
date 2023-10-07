<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<title>Admin Panel</title>

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/fava.jpg') }}" />

<!-- Icons -->
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@yield('vendor-js')

<!-- Page CSS -->
@yield('page-js')

<!-- Helpers -->
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
<script src="{{ asset('assets/js/config.js') }}"></script>
