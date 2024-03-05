@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams 2022-2023</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="msg-swamiji">
      <div class="container" data-aos="fade-up">
        <h2>Participation in Competitive Exams 2022-2023</h2>
        <div class="row mt-4 mb-4">
          <div class="col-md-4 exam">
            <h6>Olympiad-JH2464</h6>
            <img src="{{url('frontend/img/Group 1448.png')}}" alt="">
            <div class="participate">
              <a href="{{url('frontend/pdf/olympiad-JH2464-01.pdf')}}" download="" target="_blank"> <img src="{{url('frontend/img/pdf.png')}}"
                  alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam">
            <h6>Olympiad-JH2464</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="{{url('frontend/pdf/olympiad-JH2464-02.pdf')}}" download="" target="_blank"> <img src="{{url('frontend/img/pdf.png')}}"
                  alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam">
            <h6>Olympiad-JH2464</h6>
            <img src="{{url('frontend/img/Group 1448.png')}}" alt="">
            <div class="participate">
              <a href="{{url('frontend/pdf/olympiad-JH2464-03.pdf')}}" download="" target="_blank"> <img src="{{url('frontend/img/pdf.png')}}"
                  alt=""> </a>
            </div>
          </div>
        </div>
      </div>
    </section>
</body>
@endsection
