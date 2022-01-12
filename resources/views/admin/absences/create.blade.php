@extends('layouts.app')

@section('title')
 اضافة غياب أو تأخر | تسيير مدارس
@endsection

@section('content') 

<div class="content-wrapper">
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form"> اضافة غياب أو تأخر </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('absences.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  الاسم الكامل  <span class="text-danger"> (*) </span></label>
                                                <select required
                                                        class="form-control"
                                                        name="student">
                                                        <option value="" selected disabled></option>
                                                        @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">
                                                            {{ $student->first_name }} {{ $student->last_name }}
                                                        </option> 
                                                        @endforeach


                                                </select>
                                            @error('student')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> السبب  <span class="text-danger"> (*) </span></label>
                                               
                                                <select required
                                                        class="form-control"
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
                                                <label for="projectinput1">  مـــــــــن  <span class="text-danger"> (*) </span></label>
                                                <input type="date" value="{{ old('firstName') }}"
                                                        required 
                                                       class="form-control"
                                                       name="dateStart">
                                            @error('dateStart')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  الـــــــــى  <span class="text-danger"> (*) </span></label>
                                                <input type="date" value="{{ old('firstName') }}" required
                                                       class="form-control"
                                                       name="dateEnd">
                                            @error('dateEnd')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="button" class="btn btn-warning mr-1" 
                                                onclick="history.back();">
                                            <i class="ft-x"></i> تراجع
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> حفظ
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic form layout section end -->
    </div>
</div>


@endsection