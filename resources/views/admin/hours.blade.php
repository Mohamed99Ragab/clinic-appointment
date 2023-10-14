@extends('admin.layouts.master')

@section('title')
Working Hours
@endsection

@section('css')

@endsection

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">





        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Opening hours</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('adminpanel')}}">Home</a></li>
                    <li class="breadcrumb-item active">hours</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible w-75 mx-auto">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fas fa-ban"></i>
                <span>{{$errors->first()}}</span>
            </div>

        @endif



        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-11">

                            </div>

                            <div class="col-md-1">
                                <button class="btn btn-success" data-toggle="modal" data-target="#addOpenhour"> Add</button>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($working_hours as $hour)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$hour->day}}</td>
                                    <td>{{date_format(\Carbon\Carbon::parse($hour->start_time),'h:i A')}}</td>
                                    <td>{{date_format(\Carbon\Carbon::parse($hour->end_time),'h:i A')}}</td>

                                    <td>
                                        <button class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-target="#edithour{{$hour->id}}" >
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletehour{{$hour->id}}" >
                                            <i class="fas fa-trash"></i>
                                        </button>

                                    </td>

                                </tr>



                                {{--   edit hour modal --}}
                                <div class="modal fade" id="edithour{{$hour->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit working hour</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('hours.update',[$hour->id])}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="">Day:</label>
                                                        <select name="day" class="form-control">
                                                            <option {{$hour->day =='Saturday'?'selected':''}} value="Saturday">Saturday</option>
                                                            <option {{$hour->day =='Sunday'?'selected':''}}  value="Sunday">Sunday</option>
                                                            <option {{$hour->day =='Monday'?'selected':''}} value="Monday">Monday</option>
                                                            <option {{$hour->day =='Tuesday'?'selected':''}} value="Tuesday">Tuesday</option>
                                                            <option {{$hour->day =='Wednesday'?'selected':''}} value="Wednesday">Wednesday</option>
                                                            <option {{$hour->day =='Thursday'?'selected':''}} value="Thursday">Thursday</option>
                                                            <option {{$hour->day =='Friday'?'selected':''}} value="Friday">Friday</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Start Time:</label>
                                                        <input value="{{$hour->start_time}}" type="time"name="start_time"class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">End Time:</label>
                                                        <input value="{{$hour->end_time}}" type="time"name="end_time"class="form-control">
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>




                                {{--   delete hour modal --}}
                                <div class="modal fade" id="deletehour{{$hour->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{route('hours.destroy',[$hour->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="w-50 mx-auto">
                                                        <p class="text-info">
                                                            Do you sure form make operation ?
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


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



{{--   add hour modal --}}
<div class="modal fade" id="addOpenhour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add working hour</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

               <form action="{{route('hours.store')}}" method="post">
                   @csrf
                   <div class="form-group">
                       <label for="">Day:</label>
                       <select name="day" class="form-control">
                           <option disabled selected>select day</option>
                           <option value="Saturday">Saturday</option>
                           <option value="Sunday">Sunday</option>
                           <option value="Monday">Monday</option>
                           <option value="Tuesday">Tuesday</option>
                           <option value="Wednesday">Wednesday</option>
                           <option value="Thursday">Thursday</option>
                           <option value="Friday">Friday</option>
                       </select>
                   </div>


                   <div class="form-group">
                       <label for="">Start Time:</label>
                       <input type="time"name="start_time"class="form-control">
                   </div>

                   <div class="form-group">
                       <label for="">End Time:</label>
                       <input type="time"name="end_time"class="form-control">
                   </div>


                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">Save</button>
                   </div>

               </form>
            </div>

        </div>
    </div>
</div>





@endsection


@section('js')




@endsection
