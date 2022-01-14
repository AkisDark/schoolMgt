@extends('layouts.app')

@section('title')
 اضافة أستاذ(ة) جديد | تسيير مدارس
@endsection
@push('css')
    <link rel="stylesheet" href="{{ url('admin/selectBox/virtual-select.min.css') }}">
@endpush

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
                                                <label for="projectinput1">  اللقب  <span class="text-danger"> (*) </span></label>
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
                                                <label for="projectinput1">  الاسم  <span class="text-danger"> (*) </span></label>
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
                                                <label for="projectinput1">  تاريخ الميلاد  <span class="text-danger"> (*) </span></label>
                                                <input type="date" value="{{ old('dateOfBirth') }}" required
                                                       class="form-control"
                                                       name="dateOfBirth">
                                            @error('dateOfBirth')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for=""> مكان الميلاد <span class="text-danger"> (*) </span></label>
                                               
                                                <select style="height: 47px"
                                                        class="form-control"
                                                        name="wilayaId">
                                                    
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
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">تاريخ الالتحاق بالمؤسسة <span class="text-danger"> (*) </span></label>
                                               
                                                <input type="date" value="{{ old('joiningDate') }}" 
                                                        required
                                                       class="form-control"
                                                       name="joiningDate">
                
                                                @error('joiningDate')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for=""> اسم المادة التي يدرسها <span class="text-danger"> (*) </span></label>
                                               
                                                <select required
                                                        style="height:47px"
                                                        class="form-control"
                                                        name="materialId">
                                                    
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

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for=""> الأقسام التي يدرسها <span class="text-danger"> (*) </span></label>
                                               
                                                <select required 
                                                        placeholder=" " 
                                                        id="select-box"
                                                        multiple
                                                        class="form-control"
                                                        name="roomId">
                                                    
                                                    @foreach ($rooms as $room)
                                                        <option value="{{ $room->id }}">
                                                            {{ $room->level->name  }} {{ $room->specialization->name  }} {{ $room->name  }}
                                                        </option> 
                                                    @endforeach

                                                </select>
                
                                                @error('roomId')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-11">
                                            <h4 class="mb-1">الجنس <span class="text-danger"> (*) </span></h4>
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

@push('scripts')
    <script src="{{ url('admin/selectBox/virtual-select.min.js') }}"></script>
    <script>

       
        VirtualSelect.init({ 
            ele: '#select-box' ,
            optionsSelectedText: 'عناصر محددة',
            optionSelectedText: 'عنصر محدد',
            searchPlaceholderText: 'البحث ...',
            selectAllText: 'تحديد الكــل',
            noOptionsText: 'لا توجد نتيجة',
            noSearchResultsText: 'لا توجد نتيجة',
            noOptionsText: 'لا توجد نتيجة',
            allOptionsSelectedText: 'الكل',
            textDirection: 'rtl',
            optionHeight: '50px',
        });
    </script>
@endpush