<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIRUWA</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('asset/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('asset/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('asset/images/favicon.png')}}" />

    @stack('css')
</head>

<body>
    <div class="container-scroller">
        @include('template-admin.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('template-admin.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @include('template-admin.breadcrumb')
                    <section>
                        @yield('content')
                    </section>
                </div>
                <!-- content-wrapper ends -->
                @include('template-admin.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('asset/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('asset/js/off-canvas.js')}}"></script>
    <script src="{{asset('asset/js/misc.js')}}"></script>
    <script src="{{asset('asset/js/settings.js')}}"></script>
    <script src="{{asset('asset/js/todolist.js')}}"></script>
    <script src="{{asset('asset/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('asset/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    @stack('js')
</body>

</html>
