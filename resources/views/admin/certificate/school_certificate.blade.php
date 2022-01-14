<!DOCTYPE html>
<html>
<head>
    <title>شهادة مدرسية</title>
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
    <h2 class="center-text m-4">شهادة مدرسية</h2>
    <p>يشهد السيد(ة) مدير(ة) المؤسسة ان التلميذ(ة) :</p>
    <p class="m-4">اللقب : <b> .........{{$first_name}}.........</b></p>
    <p class=" m-4">الاسم : <b> .........{{$last_name}}.........</b></p>
    <p>  تاريخ ومكان الميلاد: <b dir="rtl">.........{{$date_of_birth}} {{$location}} .........</b></p>
    <p class="center-text m-4"><b>......... تابع(ت) دراسته(ها) .........</b></p>
    <p> السنة الدراسية: <b dir="rtl">......... 2021 / 2022 .........</b></p>
    <p>المستوى الدراسي: <b dir="ltr">.........{{$level}} ثانوي .........</b></p>
    <p class="left-text mt-5 pl-1"> حرر ب  <b dir="rtl">......... {{$data_now}} {{$location_school}} .........</b> </p>
    <p class="left-text mt-5 pl-1"> خاتم وامضاء مدير(ة) المؤسسة </p>

</body>
</html>
