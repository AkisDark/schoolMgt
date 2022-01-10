@extends('layouts.app')

@section('title')
 عرض جميع التخصصات | تسيير مدارس
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
                                <h4 class="card-title">جميع التخصصات </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                               
                            </div>

                            @include('includes.alerts.success')
                            @include('includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table
                                    id = "table"
                                        class="table nowrap table-striped table-bordered scroll-horizontal">
                                        <thead class="">
                                        <tr>
                                            <th>رقم المعرف</th>
                                            <th>اسم التخصص</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($specialties)
                                            @foreach($specialties as $specialtie)
                                                <tr>
                                                    <td>{{$specialtie->id}}</td>
                                                    <td>{{$specialtie->name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" 
                                                                aria-label="Basic example">
                                                            <a onclick="getDataUpdate('{{$specialtie->id}}', '{{$specialtie->name}}')" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$specialtie->id}}')" data-toggle="modal" data-target="#popupDel"
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
            <form class="form" action="{{ route('specializations.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-11">
                                <div class="form-group">
                                    <label for="projectinput1"> اسم التخصص </label>
                                    <input type="text" value="{{ old('specialization') }}" 
                                        id="specialization"
                                        class="form-control"
                                        name="specialization">
                                    @error('specialization')
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
            <form action="{{ route('specializations.delete') }}" method="post">
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
        function getDataUpdate(id, specialization ){
        $('#id').val(id);
        $('#specialization').val(specialization);
        }

        function getIdForDel(id){
        $('#idDel').val(id);
        }
    </script>
@endsection