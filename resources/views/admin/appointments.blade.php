@extends('admin.layouts.master')

@section('title')
    Appointments
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if(auth()->user()->role == 1)
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient Photo</th>
                                    <th>Patient Name</th>
                                    <th>Service</th>
                                    <th>Doctor</th>
                                    <th>Doctor Photo</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            @if(!empty($appointment->user->photo))

                                                <img style="max-width: 50px" class="rounded-circle" src="{{asset('uploads/users/'.$appointment->user->photo)}} " alt="patient_img" srcset="">
                                            @else
                                                <img style="max-width: 50px" class="rounded-circle" src="{{asset('admin/dist/img/patient.png')}} " alt="patient_img" srcset="">


                                            @endif


                                        </td>
                                        <td> {{$appointment->user->name}} </td>
                                        <td> {{$appointment->service->name}} </td>
                                        <td> {{$appointment->doctor->name}} </td>
                                        <td>
                                            <img style="max-width: 50px" class="rounded-circle" src="{{asset('uploads/doctors/'.$appointment->doctor->photo)}} " alt="doctor_img" srcset="">

                                        </td>
                                        <td>

                                            @if($appointment->status =='is pending')
                                                <span class="badge badge-primary">{{$appointment->status}} </span>


                                            @elseif($appointment->status =='accepted')
                                                <span class="badge badge-success">{{$appointment->status}} </span>

                                            @elseif($appointment->status =='canceled')
                                                <span class="badge badge-danger">{{$appointment->status}} </span>

                                            @endif

                                        </td>
                                        <td>{{date_format(\Carbon\Carbon::parse($appointment->appointment_date),'d-m-Y')}}</td>
                                        <td>{{date_format(\Carbon\Carbon::parse($appointment->appointment_time),'g:i A')}}</td>
                                        <td>{{date_format(\Carbon\Carbon::parse($appointment->created_at),'d-m-Y')}}</td>

                                        <td>
                                            <button class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#editAppointment{{$appointment->id}}" >
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteAppointment{{$appointment->id}}" >
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>

                                    </tr>



                                    {{--   edit appointment modal --}}
                                    <div class="modal fade" id="editAppointment{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Change Status Of Appointment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('appointments.update',[$appointment->id])}}" method="post">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="form-group">
                                                            <label for="">Status:</label>
                                                            <select name="status"class="form-control">
                                                                <option  {{$appointment->status == 'is pending'?'selected':''}} value="is pending">is pending</option>
                                                                <option  {{$appointment->status == 'accepted'?'selected':''}} value="accepted">accepted</option>
                                                                <option  {{$appointment->status == 'canceled'?'selected':''}} value="canceled">canceled</option>

                                                            </select>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Change</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    {{--   delete appointment modal --}}
                                    <div class="modal fade" id="deleteAppointment{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('appointments.destroy',[$appointment->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="w-50 mx-auto">
                                                            <p class="text-info">
                                                                Do you sure from make operation ?
                                                            </p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>






                                @endforeach


                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            @endif


                @if(auth()->user()->role == 2)
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient Photo</th>
                                            <th>Patient Name</th>
                                            <th>Service</th>
                                            <th>Doctor</th>
                                            <th>Doctor Photo</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($patientAppointments as $appointment)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>
                                                    @if(!empty($appointment->user->photo))

                                                        <img style="max-width: 50px" class="rounded-circle" src="{{asset('uploads/users/'.$appointment->user->photo)}} " alt="patient_img" srcset="">
                                                    @else
                                                        <img style="max-width: 50px" class="rounded-circle" src="{{asset('admin/dist/img/patient.png')}} " alt="patient_img" srcset="">


                                                    @endif


                                                </td>
                                                <td> {{$appointment->user->name}} </td>
                                                <td> {{$appointment->service->name}} </td>
                                                <td> {{$appointment->doctor->name}} </td>
                                                <td>
                                                    <img style="max-width: 50px" class="rounded-circle" src="{{asset('uploads/doctors/'.$appointment->doctor->photo)}} " alt="doctor_img" srcset="">

                                                </td>
                                                <td>

                                                    @if($appointment->status =='is pending')
                                                        <span class="badge badge-primary">{{$appointment->status}} </span>


                                                    @elseif($appointment->status =='accepted')
                                                        <span class="badge badge-success">{{$appointment->status}} </span>

                                                    @elseif($appointment->status =='canceled')
                                                        <span class="badge badge-danger">{{$appointment->status}} </span>

                                                    @endif

                                                </td>
                                                <td>{{date_format(\Carbon\Carbon::parse($appointment->appointment_date),'d-m-Y')}}</td>
                                                <td>{{date_format(\Carbon\Carbon::parse($appointment->appointment_time),'g:i A')}}</td>

                                                <td>


                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelAppointment{{$appointment->id}}" >
                                                        <i class="fas fa-ban"></i> Cancel
                                                    </button>

                                                </td>

                                            </tr>





                                            {{--   cancel appointment modal --}}
                                            <div class="modal fade" id="cancelAppointment{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cancle Appointment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <form action="{{route('appointments.cancel',[$appointment->id])}}" method="post">
                                                                @csrf


                                                                <div class="w-50 mx-auto">
                                                                    <p class="text-info">
                                                                        Do you sure from cancel your appointment ?
                                                                    </p>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger">cancle</button>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>






                                        @endforeach


                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                    </div>
                @endif

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
