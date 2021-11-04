<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('backend/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.svg')}}" type="image/x-icon">
    @yield('spesifik_link')
</head>

<body>

    <div id="app">
        @include('layouts.backend.sidebar')
        <div id="main">
            @yield('content')
        </div>
    </div>

    <script src="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('backend/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('backend/js/main.js')}}"></script>
</body>

</html>