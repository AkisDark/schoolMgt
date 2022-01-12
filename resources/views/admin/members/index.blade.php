@extends('layouts.app')

@section('title')
 عرض جميع الأعضاء  | تسيير مدارس
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
                                <h4 class="card-title">جميع الأعضاء</h4>
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
                                            <th>الايمايل</th>
                                            <th>اسم المستخدم</th>
                                            <th>رقم الهاتف</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($users)
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->first_name}} {{ $user->last_name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->username}}</td>
                                                    <td>{{$user->phone}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                            <a data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1"
                                                                onclick="getDataUpdate('{{ $user->id }}', '{{ $user->first_name }}', '{{ $user->last_name }}',
                                                                                        '{{ $user->email }}','{{ $user->username }}','{{ $user->phone }}',)">تعديل</a>


                                                            <a  onclick="getIdForDel('{{ $user->id }}')" data-toggle="modal" data-target="#popupDel"
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
            <form class="form" action="{{ route('members.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="projectinput1"> اللقب <span class="text-danger"> (*) </span></label>
                                    <input type="text" value="{{ old('firstName') }}" 
                                        id="firstName"
                                        class="form-control"
                                        name="firstName">
                                    @error('firstName')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="projectinput1">  الاسم  <span class="text-danger"> (*) </span></label>
                                <input type="text" value="{{ old('lastName') }}" 
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
                                <label for="projectinput1">  الايمايل  <span class="text-danger"> (*) </span></label>
                                <input type="email" value="{{ old('email') }}" 
                                    id="email"
                                    class="form-control"
                                    name="email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="projectinput1">  اسم المستخدم  <span class="text-danger"> (*) </span></label>
                                <input type="text" value="{{ old('username') }}" 
                                    id="username"
                                    class="form-control"
                                    name="username">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="projectinput1">  رقم الهاتف  <span class="text-danger"> (*) </span></label>
                                <input type="number" value="{{ old('phone') }}" 
                                    id="phone"
                                    class="form-control"
                                    name="phone">
                                @error('phone')
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
            <form action="{{ route('members.delete') }}" method="post">
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
        function getDataUpdate(id, firstName, lastName, email, username, phone ){
        $('#id').val(id);
        $('#firstName').val(firstName);
        $('#lastName').val(lastName);
        $('#email').val(email);
        $('#username').val(username);
        $('#phone').val(phone);
        }

        function getIdForDel(id){
        $('#idDel').val(id);
        }
    </script>
@endsection