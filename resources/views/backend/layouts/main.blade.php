<?php $url = explode('/', url()->full()) ?>
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
    <link rel="stylesheet" href="/backend/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('backend/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            @if(user()->role == 'company')
                @include('backend/layouts/sidebar')
            @else
                @include('layouts.backend.jobseeker.sidebar')
            @endif
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        @yield('backendcontainer')

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Loker Programer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span>  <a
                            href="#">Loker Programer</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{asset('backend/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('backend/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

<script src="{{asset('backend/js/main.js')}}"></script>
<script src="/backend/vendors/fontawesome/all.min.js"></script>
<script src="/backend/js/main.js"></script>

<script src="/backend/vendors/simple-datatables/simple-datatables.js"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
</body>

</html>
