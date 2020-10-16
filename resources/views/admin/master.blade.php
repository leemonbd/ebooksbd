<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Dashboard - Islamic E-Book BD</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/feather.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/css/select2.css">
    <link rel="stylesheet" href="{{asset('/')}}admin/css/app-dark.css" id="darkTheme">
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidemenu')
</div> <!-- .wrapper -->
@yield('main')

<script src="{{asset('/')}}admin/js/jquery.min.js"></script>
<script src="{{asset('/')}}admin/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}js/apps.js"></script>
<script src='{{asset('/')}}admin/js/select2.min.js'></script>

<script>
    $('.select2').select2(
        {
            theme: 'bootstrap4',
        });
    $('.select2-multi').select2(
        {
            multiple: true,
            theme: 'bootstrap4',
        });

</script>
<script src="{{asset('/')}}admin/js/apps.js"></script>
<script>
    $(document).ready(function (){
        $('#removeMessage').click(function (){
            $(this).text('');
        });
    });

</script>


<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="categoryId"]').on('change',function (){
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

