<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin-assets is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin-assets template with unlimited possibilities.">
    <meta name="keywords" content="admin-assets template, Vuexy admin-assets template, dashboard template, flat admin-assets template, responsive admin-assets template, web app">
    <meta name="author" content="PIXINVENT">
    <title>A1-Matka</title>
    <link rel="apple-touch-icon" href="{{ url('public/admin-assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('public/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/font_icon/css/font-awesome.min.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/pages/dashboard-ecommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/plugins/charts/chart-apex.css')}}">


    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/app-assets/css/components.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('public/admin-assets/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    
    <style>
        .card-datatable{
            padding: 9px;
        }
        tr{
            border-bottom: 1px solid rgb(105 94 94 / 20%) !important;
        }
        table.dataTable tbody tr.even {
            /* background-color: #f3f2f7; */
        }

        .table > :not(caption) > * > * {
            padding: 0.72rem 1rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: 1px;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }
        .uppercase{
            text-transform: uppercase;
        }
        .debit {
            color: red;
        }
        .credit {
            color: green;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        {{-- <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p> --}}
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    @include('admin.layouts.js')

</body>
<!-- END: Body-->

</html>