<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>Dashboard | {{ env('APP_NAME') }}</title>

<!-- Favicon -->
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="{{ asset('assets/login/images/icons/favicon.ico') }}" type="image/x-icon">

<!-- Data table CSS -->
<link href="{{ asset('assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}"
    rel="stylesheet" type="text/css" />

<!-- Custom CSS -->
<link href="{{ asset('assets/dist/css/style.css') }}" rel="stylesheet" type="text/css">

@yield('css')
