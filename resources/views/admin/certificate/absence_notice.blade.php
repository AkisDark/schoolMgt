<!DOCTYPE html>
<html>
<head>
    <title>اشعار بالغياب</title>
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

    <h4 class="mt-5">الموضوع :   {{ $notice }}  </h4>
    <P class="line-height">
        بناء على القرار الوزاري رقم 833 والمؤرخ في 1991/11/31 والمتعلق بمواظبة التلاميذ في المؤسسات ولاسيما المادة 12 منه وبعد المراسلات التالية<br/>
        يؤسفني أن أنهي علمكم بأن ابنكم / ابنتكم : ................ <b>{{$first_name}} {{$last_name}}</b> ..............<br>
        المولود(ة) بتاريخ : ........<span style="direction: ltr">{{ date('d-m-Y', strtotime($date_of_birth)) }}</span>......... ب ......... {{$location}} ........ من القسم  ........{{$level}}.......<br>
        قد تغيب(ت) عن الدراسة منذ .............. <span style="direction: ltr">{{ date('d-m-Y', strtotime($date_start)) }}</span> ...............الى يومنا هذا.<br>
        لذا نطلب منكم الحضور الى المؤسسة لتبرير الغياب فور استلامكم هذا الاشعار<br>
    </P>
    <p class="left-text mt-5 pl-1"> حرر ب  <b dir="rtl">......... {{$data_now}} ... {{$location_school}} .........</b> </p>
    <p class="left-text mt-5 pl-1"> خاتم وامضاء مدير(ة) المؤسسة </p>
    

</body>
</html>
