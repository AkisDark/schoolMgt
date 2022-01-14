


@extends('layouts.app')

@section('title')
 عرض جميع الغيابات والتأخرات | تسيير مدارس
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
                                <h4 class="card-title">الغيابات والتأخرات</h4>
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
                                            <th>السبب</th>
                                            <th>مــــــن</th>
                                            <th>الــــــى</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($absences)
                                            @foreach($absences as $absence)
                                                <tr>
                                                    <td>{{$absence->student->first_name}} {{ $absence->student->last_name}}</td>
                                                    <td>{{$absence->reason_of_absences}}</td>
                                                    <td>{{$absence->date_start}}</td>
                                                    <td>{{$absence->date_end}}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                           
                                                                <a data-toggle="modal" data-target="#popupDate" 
                                                                    class="btn btn-outline-success  box-shadow-3 mr-1 mb-1" 
                                                                    onclick="defineNotification('اشعار الغياب (1)', '{{$absence->student->id}}', '{{$absence->date_start}}', '1')">اشعار الغياب (1)</a> 
                                                         
                                                         
                                                                <a data-toggle="modal" data-target="#popupDate" 
                                                                    class="btn btn-outline-success  box-shadow-3 mr-1 mb-1"  
                                                                    onclick="defineNotification('اشعار الغياب (2)', '{{$absence->student->id}}', '{{$absence->date_start}}', '2')">اشعار الغياب (2)</a> 
                                                            
                                                          
                                                          <a onclick="getDataUpdate('{{$absence->id}}', '{{$absence->student->id}}', 
                                                                                        '{{$absence->student->first_name}}', '{{ $absence->student->last_name}}',
                                                                                        '{{ $absence->reason_of_absences}}', '{{ $absence->date_start}}', '{{ $absence->date_end}}')" 
                                                                data-toggle="modal" data-target="#updateData"
                                                                class="btn btn-outline-primary  box-shadow-3 mr-1 mb-1">تعديل</a>


                                                            <a onclick="getIdForDel('{{$absence->id}}')" 
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
            <form class="form" action="{{ route('absences.update') }}"
                                        method="POST">
                                        @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                 
                  <div class="row">
                      <div class="col-6">
                          <div class="form-group">
                              <label for="">  الاسم الكامل  <span class="text-danger"> (*) </span></label>
                              <select required
                                      id="fullName"
                                      class="form-control"
                                      name="studentId">
                                      <option value="" selected disabled></option>
                                      @foreach ($students as $student)
                                      <option value="{{ $student->id }}">
                                          {{ $student->first_name }} {{ $student->last_name }}
                                      </option> 
                                      @endforeach
                              </select>
                            @error('studentId')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                          </div>
                          
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label for="projectinput2"> السبب  <span class="text-danger"> (*) </span></label>
                             
                              <select required
                                      class="form-control"
                                      id="reasonOfAbsences"
                                      name="reasonOfAbsences">
                                      
                                      <option value="" selected disabled></option>
                                  
                                      <option value="مرض">
                                          مرض
                                      </option> 

                                      <option value="وفاة">
                                          وفاة
                                      </option> 

                                      <option value="زواج">
                                          زواج
                                      </option> 
                                      <option value="عطلة الأمومة">
                                         عطلة الأمومة
                                      </option> 

                                      <option value="تأخر">
                                          تأخر
                                      </option> 
                                      <option value="غير مبرر">
                                          غير مبرر
                                      </option> 

                                      <option value="سبب أخر">
                                          سبب أخر
                                      </option> 

                              </select>

                              @error('reasonOfAbsences')
                                  <small class="text-danger">{{ $message }}</small>
                              @enderror
                          </div>
                      </div>
                  
                  </div>
                  

                  <div class="row">
                      <div class="col-6">
                          <div class="form-group">
                              <label for="">  مـــــــــن  <span class="text-danger"> (*) </span></label>
                              <input type="date" value="{{ old('firstName') }}"
                                      required 
                                     class="form-control"
                                     id="dateStart"
                                     name="dateStart">
                          @error('dateStart')
                              <small class="text-danger">{{ $message }}</small>
                          @enderror

                          </div>
                          
                      </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label for="">  الـــــــــى  <span class="text-danger"> (*) </span></label>
                              <input type="date" value="{{ old('firstName') }}" required
                                     class="form-control"
                                     id="dateEnd"
                                     name="dateEnd">
                          @error('dateEnd')
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
            <form action="{{ route('absences.delete') }}" method="post">
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

    <!-- Modal (date (start-end)) -->
    <div class="modal fade" id="popupDate" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="titleDateAbs"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form id="formDate" action="{{ url('dashboard/certificates/absence-notice') }}" method="post" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="dateId" name="id">
                        <input type="hidden" id="typeDate" name="typeDate">
                        <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">بداية الغياب :</label>
                        <input type="date" value="" class="form-control" id="dateStartSel" name="dateStartSel" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="ft-x"></i> اغلاق</button>
                    <button type="submit" class="btn btn-primary">استخراج</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <script>
        function getDataUpdate(id, studentId, firstName, lastName,  reasonOfAbsences, dateStart, dateEnd){
            $('#id').val(id);;
            $('#dateStart').val(dateStart);
            $('#dateEnd').val(dateEnd);


            $( "#fullName > option" ).each(function( index ) {
                $(this).removeAttr('selected');
            });

            $( "#reasonOfAbsences > option" ).each(function( index ) {
                $(this).removeAttr('selected');
            });
            
            //**********************Add*************************************
            $( "#fullName > option" ).each(function( index ) {
                if($(this).val() == studentId){
                    $(this).attr('selected', true);
                    return;
                }
            });

            $( "#reasonOfAbsences > option" ).each(function( index ) {
                if($(this).val() == reasonOfAbsences){
                    $(this).attr('selected', true);
                    return;
                }
            });

            
        }

        function getIdForDel(id){
            $('#idDel').val(id);
        }

        function defineNotification(type, id, dateStartSel, sel){
            $('#titleDateAbs').text(type);
            $('#dateId').val(id);
            $('#dateStartSel').val(dateStartSel)
            $('#typeDate').val(sel)
        } 
    </script>
@endsection