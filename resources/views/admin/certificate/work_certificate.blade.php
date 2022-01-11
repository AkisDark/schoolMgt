<!DOCTYPE html>
<html>
<head>
    <title>شهادة عمل</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{url('admin/css/certificate.css')}}">
</head>
<body>
    <h3 class="center-text m-4 mb-5">الجمهورية الجزائرية الديموقراطية الشعبية<br/> وزارة التربية الوطنية</h3>
    <p class="m-4">
        <div class="float-right">
            <div>مديرية التربية لولاية :  ............<b>{{$location_school}}</b>.........</div>
            <div>المؤسسة :  ..........<b>{{$name_school}}</b>...........</div>
        </div>
        <div class="float-left">
            @if (!empty($img_qr_code))
                <p class="center-text mt-5">
                    <img src="{{$img_qr_code}}" width="100" height="100">
                </p>
            @endif
        </div>

    </p>
    <h2 class="center-text m-4">شهادة عمل</h2>
    <p style="padding-right:30px"><b>انا الممضي أسفله</b></p>
    <p>  العنوان: <b> ......... ثانوية {{$name_school}} {{$location_school}} .........</b></p>
    <p>  اشهد ان: <b>......... {{$first_name}} {{$last_name}} .........</b></p>
    <p> تاريخ ومكان الميلاد: <b dir="ltr">......... {{$date_of_birth}} {{$location}}  .........</b></p>
    <p> الساكن ب <b>......... {{$location}} .........</b></p>
    <p>يعمل بمؤسستي منذ: <b dir="ltr">......... {{$joining_date}} .........</b></p>
    <p class="center-text m-4">  الى يومنا هذا بصفة <b>أستاذ(ة)</b> </p>
    <p> حرر ب<b> .... {{$location_school}} .....</b> في .... <b dir="ltr">{{$data_now}}</b> ....  لاسغلالها حسب ما يسمح القانون   </p>
    <p class="left-text mt-5 pl-1"> خاتم وامضاء المستخـــدم </p>

</body>
</html>
