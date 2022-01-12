@extends('layouts.app')

@section('title')
   الاحصائيات | تسيير مدارس
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title text-center">الأعضاء</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/member.png') }}" alt="members">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['members']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title text-center">الاساتذة</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/teacher.png') }}" alt="teachers">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['teachers']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title text-center">التلاميذ</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/student.png') }}" alt="students">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['students']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title text-center">التخصصات</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/specialization.png') }}" alt="specializations">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['specializations']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body ">
                              <h5 class="card-title text-center">المواد</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/material.png') }}" alt="materials">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['materials']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                              <h5 class="card-title text-center">الأولياء</h5>
                              <div class="row">
                                  <div class="col-6">
                                    <img src="{{ url('admin/images/icons/parent.png') }}" alt="parents">
            
                                    </div>
                                    <div class="col-6">
                                        <h2>{{ $data['parents']}}</h2>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="container" >

                    <div class="row">
                        <div class="col-12" style="background-color:white">
                            <canvas id="chart-one" ></canvas> 
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    
    @push('scripts')
    <script>


        const ctx = document.getElementById('chart-one').getContext('2d');
        let lebs = new Array();
        let dts = new Array();

        $.get("{{ url('dashboard/statistics/classes') }}", function(data, status){
            for(let i = 0; i < data.length; i++){
                let rooms = data[i].stsRooms;
                let count = data[i].count;
                lebs.push(rooms);
                dts.push(count);
               
            }
            dts.push(50);
        });
      

        setTimeout(function () {
            new Chart(ctx, {
            type: 'bar',
            data: {
                labels: lebs,
                datasets: [{
                    label: '#  التلاميذ حسب الأقسام',

                    data: dts,
                    
                    backgroundColor: [
                        '#r96CEB4',
                        '#FFEEAD',
                        '#D9534F',
                        '#D9534F',
                        '#FFAD60',
                        '#FFAD60',
                        '#FF6363',
                        '#FFAB76'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });}, 500);

        
        </script>
    @endpush  
@endsection