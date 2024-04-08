@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Rules & Regulation</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>Admission</span>
        </h5>
      </div>
    </div>

    <section>
      <div class="container" data-aos="fade-up">
        <h2>General Rules:–</h2>

        <div class="row rules mt-4">
          <?php
          $i=1;
          foreach($rules as $row){
          ?>
          <div class="col-md-4">
            <div class="rules-inr-outer">
              <div class="rules-inr">
                <h6><?=$i++?></h6>
              </div>
              <p><?=$row->description?></p>
            </div>
          </div>

         <?php }?>


      


      </div>
    </section>

</body>
@endsection