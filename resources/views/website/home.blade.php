@extends('website.layouts.master')

@section('title')
    Clinic Appointment
@endsection

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('website/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Keep Your Teeth Healthy</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Best Quality Dental Treatment</h1>
                            <a href="#appointment" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('website/img/carousel-2.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Keep Your Teeth Healthy</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Best Quality Dental Treatment</h1>
                            <a href="#appointment" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                            <a href="#contact" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Banner Start -->
    <div class="container-fluid banner mb-5">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Opening Hours</h3>
                        @foreach($hours as $hour)
                        <div class="d-flex justify-content-between text-white mb-3">
                            <h6 class="text-white mb-0">{{$hour->day}}</h6>
                            <p class="mb-0"> {{date_format(\Carbon\Carbon::parse($hour->start_time),'h:i a')}} - {{date_format(\Carbon\Carbon::parse($hour->end_time),'h:i a')}}</p>
                        </div>
                        @endforeach
                        <a class="btn btn-light" href="#appointment">Appointment</a>
                    </div>
                </div>
                <div class="col-lg-6 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-secondary d-flex flex-column p-5" style="height: 300px;">
                        <h3 class="text-white mb-3">Make Appointment</h3>
                        <p class="text-white"> When is the next appointment at the dentist?</p>
                        <h2 class="text-white mb-0">+012 345 6789</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Start -->


    <!-- About Start -->
    <div id="about" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-primary text-uppercase">About Us</h5>
                        <h1 class="display-5 mb-0">The World's Best Dental Clinic That You Can Trust</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4">We have the best dental materials you need and the best dentists</h4>
                    <p class="mb-4">If you have a complaint, go to the Contact Us page and write your complaint</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>24/7 Opened</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div>
                    <a href="appointment.html" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{asset('website/img/about.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Appointment Start -->
    <div id="appointment" class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can Trust</h1>
                        <p class="text-white mb-0">Dentistry is one of the methods used in the treatment of dental problems so that the smile looks wonderful, white, bright and beautiful. The shape and beauty of the teeth is the task of dentists. A clean person knows the shape and beauty of his teeth and access to white teeth is the goal of many people.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form action="{{route('make.appoint')}}"method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select name="service" class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected disabled>Select A Service</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select name="doctor" class="form-select bg-light border-0" style="height: 55px;">

                                    </select>
                                </div>


                            </div>

                            <div class="form-group my-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="date" name="appointment_date"
                                           class="form-control bg-light border-0 datetimepicker-input"
                                           placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="time" id="time1" data-target-input="nearest">
                                    <input name="appointment_time" type="time"
                                           class="form-control bg-light border-0"
                                           placeholder="Appointment Time"  style="height: 55px;">
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Service Start -->
    <div id="services" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">

           <div class="w-50 mx-auto">
               <div class="section-title mb-5">
                   <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Services</h5>
                   <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
               </div>
           </div>

            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-3 service-item wow zoomIn" data-wow-delay="0.6s">
                        <div class="rounded-top overflow-hidden">
                            <img class="img-fluid" src="{{asset('uploads/services/'.$service->img)}}" alt="">
                        </div>
                        <div class="position-relative bg-light rounded-bottom text-center p-4">
                            <h5 class="m-0">{{$service->name}}</h5>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>
    <!-- Service End -->





    <!-- Team Start -->
    <div id="team" class="container-fluid py-5">
        <div class="container">

            <div class="w-50 mx-auto">
                <div class="section-title mb-5">
                    <h5 class="position-relative  d-inline-block text-primary text-uppercase">Our Dentist</h5>
                    <h1 class=" mb-0">Meet Our Certified & Experienced Dentist</h1>
                </div>
            </div>

            <div class="row">
                @foreach($doctors as $doctor)
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="{{asset('uploads/doctors/'.$doctor->photo)}}" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                @if($doctor->twitter_url)
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                @endif
                                @if($doctor->facebook_url)
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                @endif

                                @if($doctor->linkedin_url)
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                @endif

                                @if($doctor->instagram_url)
                                <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. {{$doctor->name}}</h4>
                            <p class="text-primary mb-0">{{$doctor->service->name}}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Contact Start -->
    <div id="contact" class="container-fluid py-5">
        <div class="container">
            <div class="w-50 mx-auto">
                <div class="section-title">
                    <h5 class="position-relative d-inline-block text-primary text-uppercase">Contact Us</h5>
                    <h1 class="display-6 mb-4">Feel Free To Contact Us</h1>
                </div>

            </div>
            <div class="row g-5">
                <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded h-100 p-5">

                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">Our Office</h5>
                                <span>Salah Salem Street, BNS, Egypt</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">Email Us</h5>
                                <span>info@example.com</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                            <div class="text-start">
                                <h5 class="mb-0">Call Us</h5>
                                <span>+012 345 6789</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form action="{{route('contact.us')}}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <input type="text"name="name" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="email"name="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text"name="subject" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control border-0 bg-light px-4 py-3" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                    <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13947.56039473566!2d31.0908217!3d29.079392400000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1680014865636!5m2!1sen!2seg" aria-hidden="false style="min-height: 400px; border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection


@section('js')

    <script>
        $(document).ready(function() {
            $('select[name="service"]').on('change', function() {
                var ServiceId = $(this).val();
                if (ServiceId) {
                    $.ajax({
                        url: "{{ URL::to('doctors') }}/" + ServiceId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="doctor"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="doctor"]').append('<option value="' +
                                    key + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>
@endsection
