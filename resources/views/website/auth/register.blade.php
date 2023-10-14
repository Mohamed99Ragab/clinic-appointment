@extends('website.layouts.master')

@section('title')
    Register
@endsection

@section('content')






        <div class="w-50 mx-auto my-5">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible my-4">
                    <i class="icon fas fa-ban"></i>
                    <span>{{$errors->first()}}</span>
                </div>

            @endif



            <div class="section-title">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Register Now</h5>
                <h1 class="display-6 mb-4">Create Your Account Now</h1>
            </div>


            <div class="row">
                <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="col-md-12">
                        <label for="name">Full Name</label>
                        <input type="text"value="{{old('name')}}" class="form-control"  name="name" id="name">
                    </div>



                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email"value="{{old('email')}}"  class="form-control"  name="email" id="email">
                    </div>


                    <div class="col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"  name="password" id="password">
                    </div>

                    <div class="col-md-12">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control"  name="password_confirmation" id="password_confirmation">
                    </div>

                    <div class="col-md-12">
                        <label for="photo">Photo</label>
                        <br>
                        <input type="file" class="form-control-file"  name="photo" id="photo">
                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>

            </div>

        </div>




@endsection
