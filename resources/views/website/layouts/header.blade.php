<!-- Topbar Start -->
<div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <small class="py-2"><i class="far fa-clock text-primary me-2"></i>Opening Hours: Mon - Tues : 6.00 am - 10.00 pm, Sunday Closed </small>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-end">
            <div class="position-relative d-inline-flex align-items-center bg-primary text-white top-shape px-5">
                <div class="me-3 pe-3 border-end py-2">
                    <p class="m-0"><i class="fa fa-envelope-open me-2"></i>info@example.com</p>
                </div>
                <div class="py-2">
                    <p class="m-0"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
    <a href="{{url('/')}}" class="navbar-brand p-0">
        <h1 class="m-0 text-primary"><i class="fa fa-tooth me-2"></i>DentCare</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{url('/')}}" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="#services" class="nav-item nav-link">Service</a>
            <a href="#team" class="nav-item nav-link">Doctors</a>
            @auth()
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
                <div class="dropdown-menu m-0">
                    <a href="{{route('adminpanel')}}" class="dropdown-item">dashboard</a>
                    <a href="{{route('logout')}}" class="dropdown-item">logout</a>

                </div>
            </div>
            @endauth
            @guest()
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sign In</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('login')}}" class="dropdown-item">Login</a>
                        <a href="{{route('register')}}" class="dropdown-item">Register</a>

                    </div>
                </div>
            @endguest



            <a href="#contact" class="nav-item nav-link">Contact</a>
        </div>
        <button type="button" class="btn text-dark" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        <a href="#appointment" class="btn btn-primary py-2 px-4 ms-3">Appointment</a>
    </div>
</nav>
<!-- Navbar End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->
