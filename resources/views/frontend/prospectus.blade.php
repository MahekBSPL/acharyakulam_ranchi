@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>ACHARYAKULAM PROSPECTUS</h1>
        <h5>
          <a href="{{url('/')}}">Home</a>/<span>Admission</span>
        </h5>
      </div>
    </div>

    @foreach($prospectuss as $prospectus)
    <section class="prospectus">
      <div class="container" data-aos="fade-up">
        <div class="col-md-12 text-center">
          <h4>{{$prospectus->title}}</h4>
          <div class="prospectus-img">
            <img src="{{url('/public/admin/upload/prospectus/image/' .$prospectus->image)}}">
          </div>

          <div class="toper-pdf">
            <div class="eye">
              <a href="{{url('/public/admin/upload/prospectus/pdf/' .$prospectus->pdf)}}"><img src="{{url('public/frontend/assets/img/eye.png')}}"
                  alt=""></a>
              <a href="{{url('/public/admin/upload/prospectus/pdf/' .$prospectus->pdf)}}" download="" target="blank"><img
                  src="{{url('/public/frontend/assets/img/pdf.png')}}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endforeach
</body>
@endsection