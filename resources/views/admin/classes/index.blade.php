


@extends('layouts.app')

@section('title')
 عرض جميع الأقسام  | تسيير مدارس
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
                                <h4 class="card-title">جميع الأقسام</h4>
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
                                            <th>المستوى</th>
                                            <th>التخصص</th>
                                            <th>القسم</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($rooms)
                                            @foreach($rooms as $room)
                                                <tr>
                                                    <td>{{$room->level->name}}</td>
                                                    <td>{{$room->specialization->name}}</td>
                                                    <td>{{$room->name}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                            <a onclick="getDataUpdate('{{$room->id}}', 
                                                                                    '{{$room->level->id}}', '{{$room->specialization->id}}',
                                                                                    '{{$room->level->name}}', '{{$room->specialization->name}}', 
                                                                                    '{{$room->name}}')" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$room->id}}')" 
                                                                data-toggle="modal" data-target="#popupDel"
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
            <form class="form" action="{{ route('classes.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">         
                     
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""> المستوى  <span class="text-danger"> (*) </span></label>
                                    <select required
                                            class="form-control"
                                            id="level"
                                            name="level">
                                            @foreach ($levels as $level)
                                                <option value="{{ $level->id }}">{{  $level->name  }}</option>
                                            @endforeach
                                    </select>
                                    @error('level')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
    
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="projectinput20"> التخصص  <span class="text-danger"> (*) </span></label>
                                    
                                    <select required
                                            class="form-control"
                                            id="specialization"
                                            name="specialization">
                                            
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}">{{  $specialization->name  }}</option>
                                            @endforeach
                                    </select>
    
                                    @error('specialization')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""> القسم  <span class="text-danger"> (*) </span></label>
                                    
                                    <select 
                                        class="form-control"
                                        id="className"
                                        name="className">
                                        @for ($i = 1; $i < 20; $i++)
                                        <option value="{{ $i }}" >{{ $i }}</option>
                                        @endfor
                                    </select>
    
                                    @error('className')
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
            <form action="{{ route('classes.delete') }}" method="post">
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
        function getDataUpdate(id, levelId, specializationId, level, specialization, className){
            $('#id').val(id);
            $('#className').val(className);

            //********************Remove***************************

            $( "#level > option" ).each(function( index ) {
                $( this ).removeAttr('selected');
            });

            $( "#specialization > option" ).each(function( index ) {
                $( this ).removeAttr('selected');
            });


            //***********************Add*************************

            $( "#level > option" ).each(function( index ) {
                if($(this).val() == levelId){
                    $(this).attr('selected', true);
                    return;
                }
            });

            $( "#specialization > option" ).each(function( index ) {
                if($(this).val() == specializationId){
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