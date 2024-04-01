@extends('frontend.layouts.main')
@section('container')

<body>

  @php
  $menuData = getMenuData();
  @endphp

  <main id="main">
    <div class="banner">
      @foreach($menuData as $menu)
      @foreach($menu->subMenu as $subMenu)
      @if($subMenu->title == 'Participation in Competitive Exam')
      @if($subMenu->banner_image)
      <img src="{{ url('/admin/upload/menu/banner/'. $subMenu->banner_image) }}" class="img-fluid" alt="banner">
      @else
      <img src="{{ url('frontend/assets/img/Mask Group 108.jpg') }}" class="img-fluid" alt="banner">
      @endif
      @endif
      @endforeach
      @endforeach

      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams</h1>

        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <!-- <span>Academics</span> -->
          @foreach($menuData as $menu)
          @if($menu->title == 'Academics')
          <span>{{ $menu->title }}</span>
          @endif
          @endforeach
        </h5>
      </div>
    </div>

    <section class="competative-slide">
      <div class="container" data-aos="fade-up">
        <h2>Participation in Competitive Exams</h2>
        <div class="row">

          @foreach ($participations as $participation)
          <div class="col-md-6">
            <div class="competative-slide-inr">
              <h6>{{$participation->title}} {{$participation->year}}</h6>
              <a href="{{url('frontend/competitive_exam_details').'/'.$participation->id}}">View More</a>
            </div>
          </div>
          @endforeach

          <!-- <div class="col-md-6">
            <div class="competative-slide-inr">
              <h6>Competitive Exams 2022-2023</h6>
              <a href="{{url('frontend/competitive-exam-2022-2023')}}">View More</a>
            </div>
          </div>     -->


          <!-- <div class="col-md-6">
            <div class="competative-slide-inr">
              <h6>Competitive Exams 2023-2024</h6>
              <a href="{{url('frontend/competitive-exam-2023-2024')}}">View More</a>
            </div>
          </div> -->

        </div>
      </div>
    </section>

</body>
@endsection