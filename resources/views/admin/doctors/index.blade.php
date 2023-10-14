@extends('admin.layouts.master')

@section('title')
    Doctors
@endsection

@section('css')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Doctors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Doctors</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-md-10">

                                </div>

                                <div class="col-md-2">
                                    <a href="{{route('doctors.create')}}" class="btn btn-success" > Add doctor</a>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Full name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">service</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($doctors as $doctor)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <img style="max-width: 50px" class="rounded-circle" src="{{asset('uploads/doctors/'.$doctor->photo)}} " alt="doctor_img" srcset="">

                                        </td>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->service->name}}</td>

                                        <td>

                                            <a href="{{route('doctors.edit',[$doctor->id])}}" class="btn btn-info mr-2">Edit</a>
                                            <button class="btn btn-danger"data-toggle="modal" data-target="#deleteDoctor{{$doctor->id}}" >Delete</button>
                                        </td>
                                    </tr>






                                    {{--   delete doctor modal --}}
                                    <div class="modal fade" id="deleteDoctor{{$doctor->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{route('doctors.destroy',[$doctor->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <div class="w-50 mx-auto">
                                                            <h6 class="text-info">
                                                                Do you sure from make operation ?
                                                            </h6>
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


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection


@section('js')

@endsection
