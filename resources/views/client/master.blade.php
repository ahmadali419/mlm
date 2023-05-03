<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
@include('client.components.head')
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
@include('client.components.header')
@include('client.components.sidebar')
@yield('content')
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
@include('client.components.footer')
@include('client.components.script')
@yield('js')
</body>
<!-- END: Body-->
</html>