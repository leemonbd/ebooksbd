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
<div class="site-wrapper" id="top">
    @include('front-end.includes.header3')
    <!--=================================
    Hero Area
===================================== -->
    @yield('body3')
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

<script type="text/javascript">
    $(document).ready(function (){
        $('li[value="categoryId"]').on('change',function (){
            var categoryId=$(this).val();
            if(categoryId){
                $.ajax({
                    url:"{{url('/get/subcat/')}}/"+categoryId,
                    type:"GET",
                    dataType:"json",
                    success:function (data){
                        $("#subcategoryId").empty();
                        $.each(data, function (key, value) {
                            $("#subcategoryId").append('<option value="' + value.id + '">' + value.subcategoryName + '</option>');
                        });
                    }
                })
            }else {
                alert('danger');
            }
        })

    })
</script>
</body>

</html>
