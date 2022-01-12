@extends('layouts.app')

@section('title')
 اضافة تخصص جديد | تسيير مدارس
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
                            <h4 class="card-title" id="basic-layout-form"> اضافة مادة جديد  </h4>
                            <a class="heading-elements-toggle"><i
                                    class="la la-ellipsis-v font-medium-3"></i></a>
                           
                        </div>
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('materials.add') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="form-group">
                                                <label for="projectinput1"> اسم المادة  <span class="text-danger"> (*) </span></label>
                                                <input type="text" value="{{ old('nameMt') }}" required
                                                       class="form-control"
                                                       name="nameMt">
                                            @error('nameMt')
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