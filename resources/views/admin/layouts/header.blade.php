<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('adminpanel')}}" class="nav-link">Home</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">



        <!-- Notifications Dropdown Menu -->
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                <i class="far fa-bell"></i>--}}
{{--                <span class="badge badge-warning navbar-badge">15</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                    <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-users mr-2"></i> 8 friend requests--}}
{{--                    <span class="float-right text-muted text-sm">12 hours</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <i class="fas fa-file mr-2"></i> 3 new reports--}}
{{--                    <span class="float-right text-muted text-sm">2 days</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--            </div>--}}
{{--        </li>--}}

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">

                @if(!empty(auth()->user()->photo))
                    <img style="max-width: 30px" src="{{asset('uploads/users/'.auth()->user()->photo)}}" class="img-circle elevation-2" alt="User Image">

                @else
                    <img style="max-width: 30px" src="{{asset('Admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

                @endif



            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="{{route('profile')}}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">
                    <i class="fas fa-arrow-right mr-2"></i> logout
                </a>

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>
<!-- /.navbar -->
