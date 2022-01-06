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
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/weather-icons/climacons.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/fonts/meteocons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/charts/morris.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/charts/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/forms/selects/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('admin/vendors/css/charts/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('admin/vendors/css/forms/toggle/bootstrap-switch.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/forms/toggle/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="a{{ url('dmin/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/pages/chat-application.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/custom-rtl.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ url('admin/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/fonts/simple-line-icons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/css-rtl/pages/timeline.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/extensions/datedropper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin/vendors/css/extensions/timedropper.min.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet"  type="text/css" href="{{ url('admin/css-rtl/style-rtl.css') }}">
    <!-- END Custom CSS-->

    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ url('admin/css/style.css') }}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>
<body class="vertical-layout vertical-menu 2-columns data-open="click" data-menu="vertical-menu" data-col="2-columns">
@include("includes.navbar")
@include("includes.sidebar")

<div class="app-content content" style="margin-top: 50px ">
    @yield('content')
</div>
    
@include("includes.footer")
<!-- BEGIN VENDOR JS-->
<script src="{{ url('admin/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->


<script src="{{ url('admin/vendors/js/forms/toggle/bootstrap-switch.min.js') }}"
        type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/forms/toggle/bootstrap-checkbox.min.js') }}"
        type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/scripts/forms/switch.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ url('admin/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/charts/echarts/echarts.js') }}" type="text/javascript"></script>

<script src="{{ url('admin/vendors/js/extensions/datedropper.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/vendors/js/extensions/timedropper.min.js') }}" type="text/javascript"></script>

<script src="{{ url('admin/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/scripts/pages/chat-application.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ url('admin/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ url('admin/js/scripts/customizer.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ url('admin/js/scripts/pages/dashboard-crypto.js') }}" type="text/javascript"></script>


<script src="{{ url('admin/js/scripts/tables/datatables/datatable-basic.js') }}"
        type="text/javascript"></script>
<script src="{{ url('admin/js/scripts/extensions/date-time-dropper.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{ url('admin/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>

<script src="{{ url('admin/js/scripts/modal/components-modal.js') }}" type="text/javascript"></script>

<script defer src="{{ url('admin/js/all.js') }}"></script>

<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true,setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true,setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true,setCurrentTime: false
    });
</script>

</body>
</html>