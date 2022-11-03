
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('frontend.includes.head')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

    <!-- BEGIN: Header-->
    @include('frontend.includes.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('frontend.includes.mainmenu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    @yield('content')
    {{-- @include('frontend.includes.content') --}}
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('frontend.includes.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
     @include('frontend.includes.script')
</body>
<!-- END: Body-->

</html>