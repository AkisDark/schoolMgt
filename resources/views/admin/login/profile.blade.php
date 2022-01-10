@extends('layouts.app')

@section('title')
 حسابي | تسيير مدارس
@endsection

@section('content')

<div class="content-wrapper">
    <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                       
                        @include('includes.alerts.success')
                        @include('includes.alerts.errors')
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <form class="form" action="{{ route('users.update') }}"
                                      method="POST">
                                    @csrf
                                   
                                    <div class="form-body">
                                        <h4 class="form-section"><i class="fas fa-id-card color-i"></i> بيانات حسابي </h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center mb-2">
                                            <img src="{{ url('admin/images/profile/user.png') }}" alt="Image">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput1"> اللقب   </label>
                                                <input type="text" value="{{ auth()->user()->first_name }}" 
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
                                                <label for=""> الاسم   </label>
                                                <input type="text" value="{{ auth()->user()->last_name }}" 
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
                                                <label for=""> الايمايل </label>
                                                <input type="email" value="{{ auth()->user()->email }}" required
                                                class="form-control"
                                                name="email">
         
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput3"> اسم المستخدم   </label>
                                                <input type="text" value="{{ auth()->user()->username }}" required
                                                class="form-control"
                                                name="username">
         
                                                @error('username')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for=""> الهاتف  </label>
                                                <input type="number" value="{{ auth()->user()->phone }}" required
                                                       class="form-control"
                                                       name="phone">
                
                                                       @error('phone')
                                                           <small class="text-danger">{{ $message }}</small>
                                                       @enderror
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="projectinput3"> كلمة المرور </label>
                                                <input type="password" 
                                                       class="form-control"
                                                       placeholder="كلمة المرور"
                                                       name="password">
                
                                                       @error('password')
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

<script>
    function getDaiarsById(){
        var wilayaId = $("#wilaya").val();
        var url = "{{ url('dashboard/school/dairas/') }}/" + wilayaId;
 
        $.get(url, function(data, status){
            $("#dairas").html(data);
        });
    }
</script>

@endsection