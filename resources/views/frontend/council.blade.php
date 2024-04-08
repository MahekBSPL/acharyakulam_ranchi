@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Student Council</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="student">
      <div class="container" data-aos="fade-up">
        <h2 class="text-center">Captain</h2>
     @foreach($classnames as $classname)
      @foreach($sections as $section)
        @php
            $found = false;
        @endphp

        @foreach($councils as $council)
            @if($council->class == $classname->id && $council->section == $section->id)
                @php
                    $found = true;
                @endphp
                @break
            @endif
        @endforeach

        @if($found)
            <div class="row justify-content-center">
                <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
                @foreach($councils as $council)
                    @if($council->class == $classname->id && $council->section == $section->id)
                        <div class="col-md-3">
                            <img src="{{url('/public/admin/upload/council/' .$council->image)}}" alt="student">
                            <div class="info">
                                <h6>{{$council->student_name}}</h6>
                                <p>{{$council->about}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @endforeach
@endforeach


      </div>
      </div>

    </section>


</body>
@endsection