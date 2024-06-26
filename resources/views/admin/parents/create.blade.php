@extends('layouts.app')

@section('title')
اضافة ولي جديد   | تسيير مدارس
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
                            <h4 class="card-title" id="basic-layout-form">  اضافة ولي   </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                           
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('parents.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">اللقب <span class="text-danger"> (*) </span> </label>
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
                                                <label for="">  الاسم  <span class="text-danger"> (*) </span> </label>
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
                                                <label for="">البريد الالكترني </label>
                                               
                                                <input type="email" value="{{ old('email') }}"
                                                       class="form-control"
                                                       name="email">
                
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">رقم الهاتف</label>
                                               
                                                <input type="number" value="{{ old('phone') }}"
                                                       class="form-control"
                                                       name="phone">
                
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-12 my-1">
                                            <div class="form-group">
                                                <label for="">رقم بطاقة التعريف الوطني</label>
                                               
                                                <input type="number"
                                                       class="form-control text-center"
                                                       name="identityCard">
                
                                                @error('identityCard')
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