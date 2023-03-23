<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@@page-discription">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Default Dashboard | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=1.4.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=1.4.0')}}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    
 {!! Toastr::message() !!}   
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @include('includes.sidebar')

            <!-- wrap @s -->
            <div class="nk-wrap ">

            @include('includes.header')
                <!-- Content -->

            @yield('content')

                <!--- Content-end -->

                <!-- footer @s -->
     
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{asset('assets/js/bundle.js?ver=1.4.0')}}"></script>
    <script src="{{asset('assets/js/scripts.js?ver=1.4.0')}}"></script>
    <script src="{{asset('assets/js/charts/gd-general.js?ver=1.4.0')}}"></script>
    <script src="{{asset('assets/js/example-toastr.js?ver=1.4.0')}}"></script>
</body>

</html>