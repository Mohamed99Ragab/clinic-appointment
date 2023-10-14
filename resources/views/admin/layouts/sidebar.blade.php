<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('Admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">My Clinic</span>
    </a>





    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(!empty(auth()->user()->photo))
                    <img src="{{asset('uploads/users/'.auth()->user()->photo)}}" class="img-circle elevation-2" alt="User Image">

                @else
                    <img src="{{asset('Admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">

                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{url('admin/home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                @if(auth()->user()->role == 1)
                <li class="nav-item">
                    <a href="{{route('services.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-medical"></i>
                        <p>
                            Services
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-stethoscope"></i>
                        <p>
                            Doctors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('doctors.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doctors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('doctors.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Doctor</p>
                            </a>
                        </li>


                    </ul>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{route('appointments.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-check"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>

                @if(auth()->user()->role == 1)

                <li class="nav-item">
                    <a href="{{route('hours.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-business-time"></i>
                        <p>
                            Working hours
                        </p>
                    </a>
                </li>

                @endif

                <li class="nav-item">
                    <a target="_blank"  href="{{url('/')}}" class="nav-link">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>
                            view Site
                        </p>
                    </a>
                </li>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
