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
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
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
                                                    <option value="" selected disabled></option>
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
                                                <label for="projectinput2">اسم الولي </label>
                                               
                                                <select 
                                                        class="form-control"
                                                        name="parent">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($parents as $parent)
                                                        <option value="{{ $parent->id }}">
                                                            {{ $parent->first_name  }} {{ $parent->last_name  }} ( {{ $parent->identity_card }} )
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('parent')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> المستوى الدراسي </label>
                                               
                                                <select 
                                                        class="form-control"
                                                        name="level">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}">
                                                            {{ $level->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('level')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2">القسم </label>
                                               
                                                <select 
                                                        class="form-control"
                                                        name="room">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($rooms as $room)
                                                        <option value="{{ $room->id }}">
                                                            {{ $room->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('room')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput2"> التخصص</label>
                                               
                                                <select 
                                                        class="form-control"
                                                        name="levspecializationel">
                                                    <option value="" selected disabled></option>
                                                    @foreach ($specializations as $specialization)
                                                        <option value="{{ $specialization->id }}">
                                                            {{ $specialization->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('specialization')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-11">
                                            <h4 class="mb-1">الجنس</h4>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input checked type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="ذكر">
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
        <!-- // Basic form layout section end -->
    </div>
</div>


@endsection