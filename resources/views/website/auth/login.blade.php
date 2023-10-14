@extends('website.layouts.master')

@section('title')
    Login
@endsection

@section('content')


    @if(session()->has('success'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>
            <span>{{session()->get('success')}}</span>
        </div>

    @endif




    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-ban"></i>
            <span>{{session()->get('error')}}</span>
        </div>

    @endif





        <div class="w-50 mx-auto my-5">

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible my-4">
                    <i class="icon fas fa-ban"></i>
                    <span>{{$errors->first()}}</span>
                </div>

            @endif



            <div class="section-title">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Login Now</h5>
                <h1 class="display-6 mb-4">Login TO Make Your Appointment</h1>
            </div>


            <div class="row">
                <form action="{{route('loginCheck')}}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"  name="email" id="email">
                    </div>


                    <div class="col-md-12">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"  name="password" id="password">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                </form>

            </div>

        </div>




@endsection
