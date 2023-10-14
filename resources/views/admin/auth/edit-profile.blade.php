@extends('admin.layouts.master')

@section('title')
    Edit Profile
@endsection

@section('css')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Profile</h1>
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

                            <form action="{{route('profile.edit')}}"method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="">Full name:</label>
                                    <input value="{{auth()->user()->name}}" type="text"name="name"class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input value="{{auth()->user()->email}}" type="email"name="email"class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">photo:</label>
                                    <input type="file"name="photo"class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="">password:</label>
                                    <input type="password"name="password"class="form-control">
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
