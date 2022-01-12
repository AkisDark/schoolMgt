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
                                                    <td>{{$parent->first_name}} {{$parent->last_name}}</td>
                                                    <td>{{$parent->email ?? '/'}}</td>
                                                    <td>{{$parent->phone ?? '/'}}</td>
                                                    <td>{{$parent->identity_card ?? '/'}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">

                                                            <a onclick="getDataUpdate('{{$parent->id}}', '{{$parent->first_name}}', 
                                                                    '{{$parent->last_name}}', 
                                                                        '{{$parent->email}}', '{{$parent->phone}}', 
                                                                        '{{ $parent->identity_card}}' )" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$parent->id}}')" 
                                                                data-toggle="modal" data-target="#popupDel"
                                                                class="btn btn-outline-danger box-shadow-3 mr-1 mb-1">حذف</a>

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

    <!-- Modal (update) -->
    <div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> تعديل البيانات </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form" action="{{ route('parents.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">  اللقب  <span class="text-danger"> (*) </span></label>
                                <input type="text" value="{{ old('firstName') }}" required
                                        class="form-control"
                                        id="firstName"
                                        name="firstName">
                            @error('firstName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">  الاسم  <span class="text-danger"> (*) </span></label>
                                <input type="text" value="{{ old('lastName') }}" required
                                        id="lastName"
                                        class="form-control"
                                        name="lastName">
                            @error('lastName')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for=""> الايمايل </label>
                                    <input type="email" value="{{ old('email') }}" 
                                            class="form-control"
                                            id="email"
                                            name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
    
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> رقم الهاتف </label>
                                <input type="number" value="{{ old('phone') }}" 
                                        class="form-control"
                                        id="phone"
                                        name="phone">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for=""> رقم بطاقة التعريف الوطني </label>
                                <input type="number" value="{{ old('identityCard') }}" 
                                        class="form-control"
                                        id="identityCard"
                                        name="identityCard">
                            @error('identityCard')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                    </div>
                   

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ft-x"></i> اغلاق </button>
                    <button type="submit" class="btn btn-success"><i class="la la-check-square-o"></i> تعديل </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- Modal (delete) -->
    <div class="modal fade" id="popupDel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> رسالة حذف </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('parents.delete') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="idDel" name="idDel" value="">
                هل أنت متأكد من الحذف ؟
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ft-x"></i> اغلاق</button>
                <button type="submit" class="btn btn-danger"><i class="la la-check-square-o"></i>  حذف</button>
                </div>
            </form>
        </div>
        </div>
    </div>

    <script>
        function getDataUpdate(id, firstName, lastName, email, phone, identityCard){                    
            $('#id').val(id);
            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#email').val(email);
            $('#phone').val(phone);
            $('#identityCard').val(identityCard);  
        }

        function getIdForDel(id){
            $('#idDel').val(id);
        }
    </script>
@endsection