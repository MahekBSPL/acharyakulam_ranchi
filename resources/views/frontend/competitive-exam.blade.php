@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="competative-slide">
      <div class="container" data-aos="fade-up">
        <h2>Participation in Competitive Exams</h2>
        <div class="row">
        
          <div class="col-md-6">
              <div class="competative-slide-inr">
            <h6>Competitive Exams 2022-2023</h6>
            <a  href="{{url('frontend/competitive-exam-2022-2023')}}">View More</a>
            
          </div>
          </div>

          <div class="col-md-6">
               <div class="competative-slide-inr">
                   <h6>Competitive Exams 2023-2024</h6>
               <a href="{{url('frontend/competitive-exam-2023-2024')}}">View More</a>
            </div>
          </div>

        </div>
      </div>
    </section>
</body>
@endsection