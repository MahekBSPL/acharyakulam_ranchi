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
        <div class="row  align-items-center justify-content-center">
        <?php
        foreach($result as $row){
        $check_year=check_academics_year($row->year);
            if($check_year==1)
            {
              $class='12';
            } elseif($check_year==2){
              $class='6';
            }      
        ?>
          <div class="col-md-<?=$class?> academic text-center">
            <p><?=$row->title?>(<?=$row->year?>)</p>
            <img src="{{url('admin/upload/academic/'.$row->image)}}">
            <div class="eye">
              <a href="{{URL::asset('admin/upload/academic/'.$row->image)}}"><img src="{{url('frontend/assets/img/eye.png')}}" alt=""></a>
              <a href="{{URL::asset('admin/upload/academic/pdf/'.$row->pdf)}}" download="" target="blank"><img src="{{url('frontend/assets/img/pdf.png')}}"
                  alt=""></a>
            </div>
          </div>
          <?php }?>

        </div>
      </div>

    

      </div>
</div>
</body>
@endsection