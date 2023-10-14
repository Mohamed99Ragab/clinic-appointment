@extends('admin.layouts.master')

@section('title')
    Edit doctor
@endsection

@section('css')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Doctor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('doctors.index')}}">Doctors</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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

                        <div class="card-body">

                            <form action="{{route('doctors.update',[$doctor->id])}}"method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Full name:</label>
                                            <input value="{{$doctor->name}}" type="text"name="name"class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Service:</label>
                                            <select name="service_id"class="form-control">
                                                @foreach($services as $service)
                                                    <option {{$service->id == $doctor->service->id ? 'selected':''}} value="{{$service->id}}">{{$service->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email:</label>
                                            <input value="{{$doctor->email}}" type="email"name="email"class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Photo:</label>
                                            <br>
                                            <img style="max-width: 70px" class="rounded-circle" src="{{asset('uploads/doctors/'.$doctor->photo)}} " alt="doctor_img" srcset="">

                                            <input type="file"name="photo"class="form-control-file">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Facebook Profile:</label>
                                            <input value="{{$doctor->facebook_url}}" type="text"name="facebook_url"class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Twitter Profile:</label>
                                            <input value="{{$doctor->twitter_url}}" type="text"name="twitter_url"class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">LinkedIn Profile:</label>
                                            <input value="{{$doctor->linkedin_url}}" type="text"name="linkedin_url"class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Instagram Profile:</label>
                                            <input value="{{$doctor->instagram_url}}" type="text"name="instagram_url"class="form-control">
                                        </div>
                                    </div>


                                </div>

                                <button class="btn btn-primary" type="submit">Save</button>

                            </form>

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
