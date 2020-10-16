<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('/')}}front-end/css/main.css" />
    <link rel="shortcut icon" type="{{asset('/')}}front-end/image/x-icon" href="{{asset('/')}}front-end/image/favicon.ico">
</head>

<body>

<div class="site-wrapper">


@include('front-end.includes.header2')
    <!--=================================
    Hero Area
===================================== -->

@yield('body2')
<!-- Modal -->

    <!--=================================
Footer
===================================== -->
</div>



<!--=================================

Footer Area
===================================== -->
@include('front-end.includes.footer')

<!-- Use Minified Plugins Version For Fast Page Load -->
<script src="{{asset('/')}}front-end/js/plugins.js"></script>
<script src="{{asset('/')}}front-end/js/ajax-mail.js"></script>
<script src="{{asset('/')}}front-end/js/custom.js"></script>



</body>

</html>
