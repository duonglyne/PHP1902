
<!DOCTYPE html>
<html lang="en">
<!--head-->
    @include('frontend.partial.head')
<!--//head-->

<body>
<!-- header-starts -->
    @include('frontend.partial.header')
<!-- //header-ends -->
    @yield('content')
<!-- newsletter -->
    @include('frontend.partial.newletter')
<!-- //newsletter -->
<!--footer-->
    @include('frontend.partial.footer')
<!--//footer-->
<!-- main-js -->
    @include('frontend.partial.main-js')
<!-- //main-js -->
</body>
</html>
