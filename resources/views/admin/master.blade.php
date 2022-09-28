<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/template/assets/images/favicon.png')}}">
    <title>AdminBite admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{asset('admin/template/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/admin-style.css')}}" rel="stylesheet">
    <!-- jquery-confirm -->
    <link href="{{asset('libs/jquery-confirm/dist/jquery-confirm.min.css')}}" rel="stylesheet">
    <!-- bootstrap 5.2.0 -->
{{--    <link href="{{asset('bootstrap-5.2.0-dist/css/bootstrap.css')}}" rel="stylesheet">--}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Painting @yield('title') </title>
</head>

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
<input type="hidden" value="{{session()->get('locale')}}" name="local" id="hidden-locale">
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">

    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @include('admin.layout.topbar')
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('admin.layout.right-sidebar')
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
            @yield('content')
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- footer -->
        <!-- ============================================================== -->
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
<!-- customizer Panel -->
@include('admin.layout.customize-aside')
<!-- ============================================================== -->

<div class="chat-windows"></div>
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('admin/template/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin/template/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin/template/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{asset('admin/template/dist/js/app.min.js')}}"></script>
<script src="{{asset('admin/template/dist/js/app.init.js')}}"></script>
<script src="{{asset('admin/template/dist/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('admin/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin/template/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin/template/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('admin/template/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin/template/dist/js/custom.min.js')}}"></script>
<!-- ckeditor -->
<script src="{{asset('admin/ckeditor5/ckeditor.js')}}"></script>
<!--bootstrap 5.2.0 -->
{{--<script src="{{asset('bootstrap-5.2.0-dist/js/bootstrap.bundle.js')}}"></script>--}}
<!-- jquery confirm -->
<script src="{{asset('libs/jquery-confirm/dist/jquery-confirm.min.js')}}"></script>

<script src="{{asset('admin/template/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('admin/template/assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('admin/template/dist/js/pages/forms/select2/select2.init.js')}}"></script>

<!-- my js files -->
<script src="{{asset('admin/js/adminJs.js')}}"></script>
@yield('script')
</body>

</html>
