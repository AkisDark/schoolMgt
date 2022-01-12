<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   
    <title>  @yield('title') </title>
    <link rel="apple-touch-icon" href="{{ url('admin/images/logo/logo.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('admin/images/logo/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/plugins/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('admin/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/pages/timeline.css') }}">
    <link rel="stylesheet"  type="text/css" href="{{ url('admin/css-rtl/style-rtl.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns  menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="2-columns">
@include("includes.navbar")
@include("includes.sidebar")

<div class="app-content content">
    @yield('content')
</div>
    
@include("includes.footer")


<script src="{{ url('admin/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/tables/datatable/datatables.min.js') }}"
        type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"
        type="text/javascript"></script>
<script src="{{ url('admin/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/core/app.js') }}" type="text/javascript"></script>

<script defer src="{{ url('admin/js/all.js') }}"></script>
<script src="{{ url('admin/js/chart.js') }}"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable({

            "language": {
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                }
            }
        });
    });

</script>

@stack('scripts')
</body>
</html>