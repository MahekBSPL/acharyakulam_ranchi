@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Student Council</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="student">
      <div class="container" data-aos="fade-up">
        <h2 class="text-center">Captain</h2>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 1 && $section->id == 1)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 1 && $council->section == 1)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 1 && $section->id == 2)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 1 && $council->section == 2)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 1 && $section->id == 3)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 1 && $council->section == 3)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 2 && $section->id == 1)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 2 && $council->section == 1)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 2 && $section->id == 2)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 2 && $council->section == 2)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 3 && $section->id == 1)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 3 && $council->section == 1)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 3 && $section->id == 2)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 3 && $council->section == 2)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

        <div class="row justify-content-center">
          @foreach($classnames as $classname)
          @foreach($sections as $section)
          @if($classname->id == 3 && $section->id == 3)
          <!-- <h3 class="text-center mr-4">IX-B</h3> -->
          <h3 class="text-center mr-4">{{$classname->title}}-{{$section->title}}</h3>
          @endif
          @endforeach
          @endforeach
          @foreach($councils as $council)
          @if($council->class == 3 && $council->section == 3)
          <div class="col-md-3">
            <img src="{{url('/admin/upload/council/' .$council->image)}}" alt="student">
            <div class="info">
              <h6>{{$council->student_name}}</h6>
              <p>{{$council->about}}</p>
            </div>
          </div>
          @endif
          @endforeach
        </div>

      </div>
      </div>

    </section>


</body>
@endsection