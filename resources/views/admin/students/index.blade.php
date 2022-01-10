@extends('layouts.app')

@section('title')
 عرض جميع التلاميذ | تسيير مدارس
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
                                <h4 class="card-title">جميع التلاميذ  </h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                
                            </div>

                            @include('includes.alerts.success')
                            @include('includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard" >
                                    <table id="table" class="table nowrap table-striped table-bordered scroll-horizontal">
                                        <thead class="">
                                        <tr>
                                            <th>الاسم الكامل</th>
                                            <th>تاريخ الميلاد</th>
                                            <th>مكان الميلاد</th>
                                            <th>الجنس</th>
                                            <th>اسم الولي</th>
                                            <th>المستوى</th>
                                            <th>القسم</th>
                                            <th>التخصص</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($students)
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                                                    <td>{{$student->date_of_birth}}</td>
                                                    <td>{{$student->wilaya->name}}</td>
                                                    <td>{{$student->gender}}</td>
                                                    <td>{{$student->parent->first_name}} {{$student->parent->last_name}}</td>
                                                    <td>{{$student->level->name}}</td>
                                                    <td>{{$student->room->name}}</td>
                                                    <td>{{$student->specialization->name}}</td>
                                                    <td>

                                                        

                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">

                                                            <a onclick=""
                                                                class="btn btn-outline-success box-shadow-3 mr-1 mb-1">ش.مدرسية</a>
                                                            <a onclick="getDataUpdate('{{$student->id}}', '{{$student->first_name}}', 
                                                                                        '{{$student->last_name}}', '{{$student->date_of_birth}}', 
                                                                                        '{{$student->gender}}', '{{$student->wilaya->id}}',
                                                                                        '{{$student->wilaya->name}}', '{{$student->parent->id}}', 
                                                                                        '{{$student->parent->first_name}}', '{{$student->parent->last_name}}', 
                                                                                        '{{$student->parent->identity_card}}', '{{$student->level->id}}', '{{ $student->level->name}}',
                                                                                        '{{$student->room->id}}', '{{ $student->room->name}}', 
                                                                                        '{{$student->specialization->id}}', '{{$student->specialization->name}}' )" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$student->id}}')" 
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
            <form class="form" action="{{ route('students.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                                   
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="projectinput1">  اللقب  </label>
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
                                <label for="projectinput1">  الاسم  </label>
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
                                <label for="projectinput1">  تاريخ الميلاد  </label>
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
                                <label for=""> مكان الميلاد </label>
                                
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
                                <label for="">اسم الولي </label>
                                
                                <select 
                                        class="form-control"
                                        id="parentId"
                                        name="parentId">
                                    <option value="" selected disabled></option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">
                                            {{ $parent->first_name  }} {{ $parent->last_name  }} ( {{ $parent->identity_card }} )
                                        </option> 
                                    @endforeach

                                </select>

                                @error('parentId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> المستوى الدراسي </label>
                                
                                <select required
                                        class="form-control"
                                        id="levelId"
                                        name="levelId">
                                    <option value="" selected disabled></option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">
                                            {{ $level->name  }}
                                        </option> 
                                    @endforeach

                                </select>

                                @error('levelId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">القسم </label>
                                
                                <select 
                                        class="form-control"
                                        id="roomId"
                                        name="roomId">
                                    <option value="" selected disabled></option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">
                                            {{ $room->name  }}
                                        </option> 
                                    @endforeach

                                </select>

                                @error('roomId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for=""> التخصص</label>
                                
                                <select 
                                        class="form-control"
                                        id="specializationId"
                                        name="specializationId">
                                    <option value="" selected disabled></option>
                                    @foreach ($specializations as $specialization)
                                        <option value="{{ $specialization->id }}">
                                            {{ $specialization->name  }}
                                        </option> 
                                    @endforeach

                                </select>

                                @error('specializationId')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-11">
                            <h4 class="mb-1">الجنس</h4>
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
            <form action="{{ route('students.delete') }}" method="post">
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
        function getDataUpdate(id, firstName, lastName, dateOfBirth, gender, wilayaId, 
                                wilaya, parentId, parentFirstName, parentLastName, 
                                parentIdentityCard, levelId, level, roomId, 
                                room, specializationId, specialization ){
                                    
            $('#id').val(id);
            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#dateOfBirth').val(dateOfBirth);
             
            if(gender === 'ذكر'){
                $('#male').attr('checked', true);
            } else {
                $('#female').attr('checked', true);
            }
             
                   
            $('#wilayaId').append('<option selected value="'+ wilayaId +'">'+ wilaya+'</option>');
            $('#parentId').append('<option selected value="'+ parentId +'">'+ parentFirstName+ " " +parentLastName +" ( "+ parentIdentityCard +" ) "+'</option>');
            $('#levelId').append('<option selected value="'+ levelId +'">'+ level+'</option>');
            $('#roomId').append('<option selected value="'+ roomId +'">'+ room+'</option>');
            $('#specializationId').append('<option selected value="'+ specializationId +'">'+ specialization+'</option>');
            
        }

        function getIdForDel(id){
            $('#idDel').val(id);
        }
    </script>
@endsection

