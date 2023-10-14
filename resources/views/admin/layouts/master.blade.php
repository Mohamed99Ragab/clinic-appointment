<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>



    @include('admin.layouts.heading')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



        @include('admin.layouts.header')

    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

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

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')

</div>
<!-- ./wrapper -->
@include('admin.layouts.scripts')
</body>
</html>
