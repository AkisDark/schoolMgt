@extends('layouts.app')

@section('title')
 اضافة أستاذ(ة) جديد | تسيير مدارس
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-body">
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="basic-layout-form"> اضافة أستاذ(ة) جديد  </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                           
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('teachers.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  اللقب  </label>
                                                <input type="text" value="{{ old('firstName') }}" required
                                                       class="form-control"
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
                                                <input type="date" value="{{ old('firstName') }}" required
                                                       class="form-control"
                                                       name="firstName">
                                            @error('firstName')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> مكان الميلاد </label>
                                               
                                                <select 
                                                        class="form-control"
                                                        name="wilaya">
                                                    
                                                    @foreach ($wilayas as $wilaya)
                                                        <option value="{{ $wilaya->id }}">
                                                            {{ $wilaya->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('wilaya')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                 
                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2">تاريح الالتحاق بالمؤسسة </label>
                                               
                                                <input type="date" value="{{ old('joiningDate') }}" required
                                                       class="form-control"
                                                       name="joiningDate">
                
                                                @error('joiningDate')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> اسم المادة التي يدرسها </label>
                                               
                                                <select required
                                                        class="form-control"
                                                        name="material">
                                                    
                                                    @foreach ($materials as $material)
                                                        <option value="{{ $material->id }}">
                                                            {{ $material->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('material')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-11">
                                            <h4 class="mb-1">الجنس</h4>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="ذكر" checked>
                                                <label class="custom-control-label" for="customRadioInline1">ذكر</label>
                                              </div>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="أنثى">
                                                <label class="custom-control-label" for="customRadioInline2">أنثى</label>
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
</div>


@endsection