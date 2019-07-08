<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--head-->
    @include('admin.partials.head')
<!--//head-->

<body class="cbp-spmenu-push">
<div class="main-content">

    <!--left-fixed -navigation-->

    <!-- header-starts -->

    <!-- //header-ends -->
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            @yield('content')
        </div>
    </div>
    <!--footer-->
    @include('admin.partials.footer')
    <!--//footer-->
</div>

<!--main-js-->
    @include('admin.partials.main-js')
<!--//main-js-->

</body>
</html>
