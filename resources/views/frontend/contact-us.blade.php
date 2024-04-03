@extends('frontend.layouts.main')
@section('container')
<body>

    <div class="banner">
        <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
        <div class="banner-inr breadcrumbs">
            <h1>Contact Us</h1>
            <h5>
                <a href="{{url('frontend/index')}}">Home</a> / <span>Contact Us</span>
            </h5>
        </div>
    </div>

    <main id="main">
        <!-- ======= About Section ======= -->

        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Namkum, Near Police Station,
                                        Ranchi, India, Jharkhand</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+91-6287842467</p>
                                    <p>+91-6287842461</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>officeacharyakulamranchi@gmail.com, enquiryacharyakulamranchi@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Monday - Saturday<br />9:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($errorMessage = Session::get('error'))
                        <div class="alert alert-danger">
                            <strong>Error!</strong> {{ $errorMessage }}
                        </div>
                    @endif

                    @if ($successMessage = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $successMessage }}
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <form action="{{ route('contactsave') }}" class="php-email-form" method="POST">
                        @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                                    <span class="text-danger">@error('name'){{$message}} @enderror</span>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                    <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                </div>

                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone Number">
                                    <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sub" id="sub" placeholder="Subject">
                                    <span class="text-danger">@error('sub'){{$message}} @enderror</span>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="msg" id="msg" rows="6" placeholder="Message"> </textarea>
                                    <span class="text-danger">@error('msg'){{$message}} @enderror</span>
     
                                </div>

                                <button type="submit" id="submit-button" value="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->
</body>
@endsection
