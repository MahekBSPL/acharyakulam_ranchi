@extends('frontend/layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>ACHARYAKULAM PROSPECTUS</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Admission</span>
        </h5>
      </div>
    </div>

    <section class="prospectus">
      <div class="container" data-aos="fade-up">
        <div class="col-md-12 text-center">
          <h4>Prospectus(2024-2025)</h4>
          <div class="prospectus-img">
            <img src="{{url('frontend/img/prospects-img.jpg')}}">
          </div>

          <div class="toper-pdf">
            <div class="eye">
              <a href="{{url('frontend/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf')}}"><img src="{{url('frontend/img/eye.png')}}"
                  alt=""></a>
              <a href="{{url('frontend/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf')}}" download="" target="blank"><img
                  src="{{url('frontend/img/pdf.png')}}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
@endsection