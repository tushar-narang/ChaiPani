<!DOCTYPE html>
<html dir="ltr" lang="en">
@include('matrix.head')
<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        @include('matrix.header')
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('matrix.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">

        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ URL::asset('libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ URL::asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ URL::asset('extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ URL::asset('js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ URL::asset('js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ URL::asset('js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="{{ URL::asset('libs/flot/excanvas.js') }}"></script>
<script src="{{ URL::asset('libs/flot/jquery.flot.js') }}"></script>
<script src="{{ URL::asset('libs/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ URL::asset('libs/flot/jquery.flot.time.js') }}"></script>
<script src="{{ URL::asset('libs/flot/jquery.flot.stack.js') }}"></script>
<script src="{{ URL::asset('libs/flot/jquery.flot.crosshair.js') }}"></script>
<script src="{{ URL::asset('libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ URL::asset('js/pages/chart/chart-page-init.js') }}"></script>

</body>

</html>
