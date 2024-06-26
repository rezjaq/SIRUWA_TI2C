<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIRUWA</title>
    <link rel="shortcut icon" href="{{ asset('assets/icon/favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('asset/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    @stack('css')
</head>

<body>
    <div class="container-scroller">
        @include('template-admin.header')
        <!-- partial -->
        <div class=" page-body-wrapper">
            @if (Auth::check())
                @if (Auth::user()->level == 'RW')
                    @include('template-admin.sidebar')
                @elseif(Auth::user()->level == 'RT')
                    @include('template-admin.sidebarRT')
                @endif
            @endif
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- DataTables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('asset/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('asset/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('asset/js/off-canvas.js') }}"></script>
    {{-- <script src="{{ asset('asset/js/misc.js') }}"></script> --}}
    <script src="{{ asset('asset/js/settings.js') }}"></script>
    <script src="{{ asset('asset/js/todolist.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.cookie.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('asset/js/dashboard.js') }}"></script>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- End custom js for this page -->
    @stack('js')
</body>

</html>
