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
        @dd( $academic)
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

    <!-- <div class="topper mt-4">
      <div class="container" data-aos="fade-up">
        <div class="row  align-items-center justify-content-center">
          <div class="col-md-6 academic text-center">
            <p>School Planner(2023-2024)</p>
            <img src="{{url('frontend/assets/img/School-Planner-2023-24.webp')}}">

            <div class="eye">
              <a href="{{url('frontend/assets/pdf/School-Planner-2023-24.pdf')}}"><img src="{{url('frontend/assets/img/eye.png')}}" alt=""></a>

              <a href="{{url('frontend/assets/pdf/School-Planner-2023-24.pdf')}}" download="" target="blank"><img src="{{url('frontend/assets/img/pdf.png')}}" alt=""></a>
            </div>

          </div>
        </div>
      </div>

      <div class="container" data-aos="fade-up">
        <div class="row mt-5">
          <div class="col-md-6 academic text-center">
            <p>School Planner(2022-2023)</p>
            <img src="{{url('frontend/assets/img/school-planer-2023.webp')}}">
            <div class="eye">
              <a href="{{url('frontend/assets/pdf/School calendar 2022-2023.pdf')}}"><img src="{{url('frontend/assets/img/eye.png')}}" alt=""></a>

              <a href="{{url('frontend/assets/pdf/Topper-Students-List-2022-2023.pdf')}}" download="" target="blank"><img src="{{url('frontend/assets/img/pdf.png')}}" alt=""></a>
            </div>
          </div>

          <div class="col-md-6 mt-2 academic text-center">
            <p>Holiday-List(2022-2023)</p>
            <img src="{{url('frontend/assets/img/holiday-list-2023.webp')}}">
            <div class="eye">
              <a href="{{url('frontend/assets/pdf/Holiday list 2022-2023.pdf')}}"><img src="{{url('frontend/assets/img/eye.png')}}" alt=""></a>

              <a href="{{url('frontend/assets/pdf/Holiday list 2022-2023.pdf')}}" download="" target="blank"><img src="{{url('frontend/assets/img/pdf.png')}}" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </div> 
 -->
</body>
@endsection