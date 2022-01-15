@extends('layouts.app')

@section('title')
 عرض جميع الأساتذة | تسيير مدارس
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
                                <h4 class="card-title">جميع الأساتذة  </h4>
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
                                            <th>تاريخ الميلاد</th>
                                            <th>مكان الميلاد</th>
                                            <th>المادة التي يدرسها</th>
                                            <th>تاريخ الالتحاق</th>
                                            <th> الأقسام التي يدرسها</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($teachers)
                                            @foreach($teachers as $teacher)
                                                <tr>
                                                    <td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
                                                    <td>{{$teacher->date_of_birth}}</td>
                                                    <td>{{$teacher->wilaya->name}}</td>
                                                    <td>{{$teacher->material->name}}</td>
                                                    <td>{{$teacher->joining_date}}</td>
                                                    <td>
                                                        @php
                                                            $rooms = $techRoom->find($teacher->id)->rooms()->get();
                                                            
                                                            foreach ($rooms as $room) {

                                                                $levelName = $level->find($room->level_id)->first()->name;

                                                                $specializationName = $specialization->find($room->specialization_id)->first()->name;

                                                                echo '[ ' . $levelName .' '.$specializationName . ' '. $room->name  . ' ]<br/>';
                                                                
                                                            }
                                                            
                                                        @endphp 
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">

                                                            <a target="_blanck" href="{{ url('dashboard/certificates/work-certificate/' . $teacher->id) }}"
                                                                class="btn btn-outline-success  box-shadow-3 mr-1 mb-1">ش.عمل</a>    

                                                                <a onclick="getDataUpdate('{{$teacher->id}}', '{{$teacher->first_name}}', 
                                                                    '{{$teacher->last_name}}', '{{$teacher->date_of_birth}}', 
                                                                        '{{$teacher->wilaya->id}}', '{{$teacher->wilaya->name}}', 
                                                                        '{{ $teacher->joining_date}}', '{{$teacher->material->id}}', 
                                                                        '{{$teacher->material->name}}', '{{$teacher->gender}}' )" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$teacher->id}}')" 
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
            <form class="form" action="{{ route('teachers.update') }}"
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
                                <label for="">  تاريخ الميلاد  <span class="text-danger"> (*) </span></label>
                                <input type="date" value="{{ old('dateOfBirth') }}" required
                                        class="form-control"
                                        id="dateOfBirth"
                                        name="dateOfBirth">
                            @error('dateOfBirth')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> مكان الميلاد <span class="text-danger"> (*) </span></label>
                                
                                <select 
                                        class="form-control"
                                        id="wilayaId"
                                        name="wilayaId">
                                    <option value="" selected disabled></option>
                                    @foreach ($wilayas as $wilaya)
                                        <option value="{{ $wilaya->id }}">
                                            {{ $wilaya->name  }}
                                        </option> 
                                    @endforeach

                                </select>

                                @error('wilayaId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> المادة التي يدرسها <span class="text-danger"> (*) </span></label>
                                
                                <select 
                                        class="form-control"
                                        id="materialId"
                                        name="materialId">
                                    <option value="" selected disabled></option>
                                    @foreach ($materials as $material)
                                        <option value="{{ $material->id }}">
                                            {{ $material->name  }}
                                        </option> 
                                    @endforeach

                                </select>

                                @error('materialId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">  تاريخ الالتحاق بالمؤسسة <span class="text-danger"> (*) </span> </label>
                                <input type="date" value="{{ old('joiningDate') }}" required
                                        class="form-control"
                                        id="joiningDate"
                                        name="joiningDate">
                            @error('joiningDate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-11">
                            <h4 class="mb-1">الجنس <span class="text-danger"> (*) </span></h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input id="male" type="radio"  name="gender" class="custom-control-input" value="ذكر">
                                <label class="custom-control-label" for="male">ذكر</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                <input id="female" type="radio"  name="gender" class="custom-control-input" value="أنثى">
                                <label  class="custom-control-label" for="female">أنثى</label>
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
            <form action="{{ route('teachers.delete') }}" method="post">
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
        function getDataUpdate(id, firstName, lastName, dateOfBirth, wilayaId, 
                                wilayaName, joiningDate, materialId, materialName, gender ){
                                    
            $('#id').val(id);
            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#dateOfBirth').val(dateOfBirth);
            $('#joiningDate').val(joiningDate);

            $('#male').removeAttr('checked');
            $('#female').removeAttr('checked');
                
            if(gender === 'ذكر'){
                $('#male').attr('checked', true);
            } else {
                $('#female').attr('checked', true);
            }

            //*******************Remove******************************

            $( "#wilayaId > option" ).each(function( index ) {
                $( this ).removeAttr('selected');
            });

            $( "#materialId > option" ).each(function( index ) {
                $( this ).removeAttr('selected');
            });

            //*******************add******************************
            
            $( "#wilayaId > option" ).each(function( index ) {
                if($(this).val() == wilayaId){
                    $(this).attr('selected', true);
                    return;
                }
            });

            $( "#materialId > option" ).each(function( index ) {
                if($(this).val() == materialId){
                    $(this).attr('selected', true);
                    return;
                }
            });
        }

        function getIdForDel(id){
            $('#idDel').val(id);
        }
    </script>
@endsection