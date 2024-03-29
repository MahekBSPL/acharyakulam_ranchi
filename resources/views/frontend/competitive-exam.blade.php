@extends('frontend.layouts.main')
@section('container')

<body>

  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>
    
     <!-- @foreach ($menuData as $menuItem)
    @foreach ($menuItem->subMenu as $subMenuItem)
            @if ($subMenuItem->parent_menu == $menuItem->id)
                <h6>{{$menuItem->title}}</h6>  
                @endif
          @endforeach 
           @endforeach   -->

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