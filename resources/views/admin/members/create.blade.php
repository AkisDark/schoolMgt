@extends('layouts.app')

@section('title')
اضافة عضو جديد  | تسيير مدارس
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
                            <h4 class="card-title" id="basic-layout-form">  اضافة عضو جديد </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                          
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('members.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">  اللقب  </label>
                                                    <input type="text" value="{{ old('firstName') }}" 
                                                           class="form-control"
                                                           required
                                                           name="firstName">
                                                @error('firstName')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                    
                                                </div>
                                                
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  الاسم  </label>
                                                <input type="text" value="{{ old('lastName') }}" 
                                                       class="form-control"
                                                       required
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
                                                <label for="projectinput1">  الايمايل  </label>
                                                <input type="email" value="{{ old('email') }}" 
                                                       class="form-control"
                                                       required
                                                       name="email">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1">  اسم المستخدم  </label>
                                                <input type="text" value="{{ old('username') }}" 
                                                       class="form-control"
                                                       required
                                                       name="username">
                                            @error('username')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="projectinput1">  رقم الهاتف  </label>
                                                <input type="number" value="{{ old('phone') }}" 
                                                       class="form-control"
                                                       required
                                                       name="phone">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">   كلمة المرور  </label>
                                                <input type="password" value="{{ old('password') }}" 
                                                       class="form-control"
                                                       required
                                                       name="password">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">   تأكيد كلمة المرور  </label>
                                                <input type="password" value="{{ old('password_confirmation') }}" 
                                                        class="form-control"
                                                        required
                                                        name="password_confirmation">
                                            @error('password_confirmation')
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