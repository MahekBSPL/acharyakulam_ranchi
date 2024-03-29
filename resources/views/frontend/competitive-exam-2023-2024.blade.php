@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Participation in Competitive Exams 2023-2024</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="msg-swamiji">
      <div class="container" data-aos="fade-up">
        <h2>Participation in Competitive Exams 2023-2024</h2>
        <div class="row mt-4 mb-4">

        @foreach ($competitiveExam as $competitive)
          <div class="col-md-4 exam">
            <h6>{{$competitive->name}}</h6>
            <img src="{{url('frontend/assets/img/Group 1448.png')}}" alt="">
            <div class="participate">
              <a href="{{url('/admin/upload/competitiveExam/' .$competitive->pdf)}}" download="" target="_blank"> <img src="{{url('frontend/assets/img/pdf.png')}}" alt=""> </a>
            </div>
          </div>
          @endforeach

          <!-- <div class="col-md-4 exam">
            <h6>Olympiad Social Science</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="assets/pdf/2024/Olympiad-Social-science-2024.pdf" download="" target="_blank"> <img src="assets/img/pdf.png" alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam">
            <h6>Olympiad English</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="assets/pdf/Olympiad-ENGLISH-2023-2024.pdf" download="" target="_blank"> <img src="assets/img/pdf.png" alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam">
            <h6>Olympiad General Knowledge</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="assets/pdf/Olympiad-General-Knowledge-2023-2024.pdf" download="" target="_blank"> <img src="assets/img/pdf.png" alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam">
            <h6>Olympiad SCIENCE</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="assets/pdf/Olympiad-SCIENCE-2023-2024.pdf" download="" target="_blank"> <img src="assets/img/pdf.png" alt=""> </a>
            </div>
          </div>

          <div class="col-md-4 exam mt-4">
            <h6>Olympiad Mathematics</h6>
            <img src="assets/img/Group 1448.png" alt="">
            <div class="participate">
              <a href="assets/pdf/Olympiad-Mathematics.pdf" download="" target="_blank"> <img src="assets/img/pdf.png" alt=""> </a>
            </div>
          </div> -->
        </div>
      </div>
    </section>

</body>
@endsection