@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>academic Session</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <div class="topper mt-4">
    <div class="container" data-aos="fade-up">
      
      @foreach($academics as $index => $academicData) 
     
      <div class="row justify-content-center" style="margin:40px 0px;">
        @foreach($academicData as $academic)
          <div class="col-md-6 academic text-center">
            <p>{{$academic->title}}({{$academic->year}})</p>
            <img src="{{url('/admin/upload/academic/' .$academic->image)}}">
            <div class="eye">
              <a href="{{url('/admin/upload/academic/pdf/' .$academic->pdf)}}"><img src="{{url('frontend/assets/img/eye.png')}}" alt=""></a>
              <a href="{{url('/admin/upload/academic/pdf/' .$academic->pdf)}}" download="" target="blank"><img src="{{url('frontend/assets/img/pdf.png')}}" alt=""></a>
            </div>
            </div>
        @endforeach
      </div>
      @endforeach
      </div>
    </div>
</body>
@endsection