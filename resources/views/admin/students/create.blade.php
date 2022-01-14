@extends('layouts.app')

@section('title')
 اضافة تلميذ(ة) جديد | تسيير مدارس
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
                            <h4 class="card-title" id="basic-layout-form"> اضافة  تلميذ(ة) جديد  </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                            
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('students.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  اللقب  <span class="text-danger"> (*) </span></label>
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
                                                <label for="projectinput1">  الاسم  <span class="text-danger"> (*) </span></label>
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
                                                <label for="projectinput1">  تاريخ الميلاد  <span class="text-danger"> (*) </span></label>
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
                                                <label for="">اسم الولي <span class="text-danger"> (*) </span></label>
                                                
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
                                                <label for=""> المستوى الدراسي <span class="text-danger"> (*) </span></label>
                                                
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
                                                <label for="">القسم <span class="text-danger"> (*) </span></label>
                                                
                                                <select 
                                                        class="form-control"
                                                        id="roomId"
                                                        name="roomId">
                                                    <option value="" selected disabled></option>
                                                    @for ($i = 1; $i < 20; $i++)
                                                    <option value="{{ $i }}" >{{ $i }}</option>
                                                    @endfor
                        
                                                </select>
                
                                                @error('roomId')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for=""> التخصص <span class="text-danger"> (*) </span></label>
                                                
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
                                            <h5 class="mb-1">الجنس <span class="text-danger"> (*) </span></h5>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input id="male" type="radio"  name="gender" class="custom-control-input" value="ذكر" checked>
                                                <label class="custom-control-label" for="male">ذكر</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                <input id="female" type="radio"  name="gender" class="custom-control-input" value="أنثى">
                                                <label  class="custom-control-label" for="female">أنثى</label>
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