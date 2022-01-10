@extends('layouts.app')

@section('title')
 عرض جميع الأولياء | تسيير مدارس
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">جميع الأولياء  </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                               
                            </div>

                            @include('includes.alerts.success')
                            @include('includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard" style="overflow:auto;width:98%;height:600px;margin:auto">
                                    <table
                                    id = "table"
                                        class="table nowrap table-striped table-bordered scroll-horizontal scroll-vertical">
                                        <thead class="">
                                        <tr>
                                            <th>رقم المعرف</th>
                                            <th>الاسم الكامل</th>
                                            <th>البريد الالكتروني</th>
                                            <th>رقم الهاتف</th>
                                            <th>رقم بطاقة التعريف الوطني</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($parents)
                                            @foreach($parents as $parent)
                                                <tr>
                                                    <td>{{$parent->id}}</td>
                                                    <td>{{$parent->first_name}} {{$parent->last_name}}</td>
                                                    <td>{{$parent->email}}</td>
                                                    <td>{{$parent->phone}}</td>
                                                    <td>{{$parent->identity_card}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                            <a href=""
                                                                class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a href=""
                                                                class="btn btn-outline-danger  box-shadow-3 mr-1 mb-1">حذف</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection