@extends('frontend.layouts.main')
@section('container')
<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Topper Students Lists</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="topper">
      <div class="container" data-aos="fade-up">
        <div class="heading pt-3">
          <h2>Topper-Student-2022-2023</h2>
          <span class="topper-student-pdf">
            <div class="eye">
              <a href="{{url('frontend/pdf/Topper-Students-List-2022-2023.pdf')}}"><img src="{{url('frontend/img/eye.png')}}" alt=""></a>
              <a href="{{url('frontend/pdf/Topper-Students-List-2022-2023.pdf')}}" download="" target="blank"><img
                  src="{{url('frontend/img/pdf.png')}}" alt=""></a>
            </div>
          </span>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 mt-4">
            <img src="{{url('frontend/img/toper-list-img-2022-2023.webp')}}">
          </div>
        </div>
      </div>

      <div class="container pt-5" data-aos="fade-up">
        <div class="heading">
          <h2>Topper-Student-2021-2022</h2>
          <span class="topper-student-pdf">
            <div class="eye">
              <a href="{{url('frontend/pdf/Topper-Students-ListSession2021-2022.pdf')}}"><img src="{{url('frontend/img/eye.png')}}" alt=""></a>
              <a href="{{url('frontend/pdf/Topper-Students-ListSession2021-2022.pdf')}}" download="" target="blank"><img
                  src="{{url('frontend/img/pdf.png')}}" alt=""></a>
            </div>
          </span>
        </div>
        <div class="row align-items-center justify-content-center mt-4">
          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-01.jpg')}}">
          </div>

          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-02.jpg')}}">
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-03.jpg')}}">
          </div>

          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-04.jpg')}}">
          </div>
        </div>

        <div class="row mt-4">
          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-05.jpg')}}">
          </div>

          <div class="col-md-6">
            <img src="{{url('frontend/img/TopperStudents-2022-06.jpg')}}">
          </div>
        </div>
      </div>

      <div class="container pt-5" data-aos="fade-up">
        <div class="heading">
          <h2>Topper-Student-2020-2021</h2>
          <span class="topper-student-pdf">
            <div class="eye">
              <a href="{{url('frontend/pdf/Topper Students List Session 2020-2021.pdf')}}"><img src="{{url('frontend/img/eye.png')}}" alt=""></a>
              <a href="{{url('frontend/pdf/Topper Students List Session 2020-2021.pdf')}}" download="" target="blank"><img
                  src="{{url('frontend/img/pdf.png')}}" alt=""></a>
            </div>
          </span>
        </div>

        <div class="row mt-4">
          <div class="col-md-4">
            <img src="{{url('frontend/img/TopperStudents-List-Session2020-2021.jpg')}}">
          </div>
          <div class="col-md-4">
            <img src="{{url('frontend/img/TopperStudents-List-Session2020-2021-2.jpg')}}">
          </div>
          <div class="col-md-4">
            <img src="{{url('frontend/img/TopperStudents-List-Session2020-2021-3.jpg')}}">
          </div>
        </div>
      </div>
    </section>
</body>
@endsection