@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Teacher's & Office Staff</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>About</span>
        </h5>
      </div>
    </div>

    <section class="goal">
      <div class="container" data-aos="fade-up">
        <div class="approach col-lg-12">
          <div class="row">
            <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{url('public/frontend/assets/img/staff.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 mt-5" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h2>Teacher's & Office Staff</h2>
                <p>
                  Great importance is attached to the quality of the staff at Acharyakulam. Trained, highly qualified
                  and experienced teachers are appointed to impart education. Compassion, devotion to duties, good
                  manners, helpfulness, dedication and strong belief in spiritualism are some of the prerequisites of
                  teachers at Acharyakulam.
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

</body>
@endsection