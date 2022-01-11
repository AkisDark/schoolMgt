<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="{{url('admin/css/certificate.css')}}">
</head>
<body>


    <p class="center-text" style="font-size:30px">
        <b>قائمة التلاميذ</b>
        <br/>
        <b>القسم</b>
        <br/>
        <b>{{$students[0]->category->name}}</b>
    </p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>اللقب</th>
                <th>الاسم</th>
                <th>تاريخ الميلاد</th>
                <th>مكان الميلاد</th>
                <th>رقم التعريف</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
            @forelse ( $students as $student )
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->date_of_birth}}</td>
                    <td>{{$student->location}}</td>
                    <td>{{$student->identity_card}}</td>
                </tr>
            @empty
                <tr >
                    <td class="center-text" colspan="6">لا توجد بيانات</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
