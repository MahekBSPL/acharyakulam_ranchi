@extends('frontend.layouts.main')
@section('container')

<body>

  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams <?=$participation->year?></h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="msg-swamiji">
      <div class="container" data-aos="fade-up">
        <h2>Participation in Competitive Exams <?=$participation->year?></h2>
        <div class="row mt-4 mb-4">

          @foreach ($competitiveExam as $competitive)
          <div class="col-md-4 exam">
            <h6>{{$competitive->name}}</h6>
            <img src="{{url('public/frontend/assets/img/Group 1448.png')}}" alt="">
            <div class="participate">
              <a href="{{url('public/admin/upload/competitiveExam/'.$competitive->pdf)}}" download="" target="_blank"> <img src="{{url('public/frontend/assets/img/pdf.png')}}" alt=""> </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>

</body>
@endsection