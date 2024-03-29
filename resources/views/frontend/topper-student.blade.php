@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Topper Students Lists</h1>
        <h5>
          <a href="index.php">Home</a> / <span>Academics</span>
        </h5>
      </div>
    </div>

    <section class="topper">
      <div class="container" data-aos="fade-up">
         <?php
         foreach($result as $row){
          
           ?>
        <div class="heading pt-3">
          <h2><?=$row->title?></h2>
          <span class="topper-student-pdf">
            <div class="eye">
              <a href="{{URL::asset('admin/upload/topperstudent/pdf/'.$row->pdf)}}"><img src="assets/img/eye.png" alt=""></a>
              <a href="{{URL::asset('admin/upload/topperstudent/pdf/'.$row->pdf)}}" download="" target="blank"><img
                  src="assets/img/pdf.png" alt=""></a>
            </div>
          </span>
        </div>
        <div class="row align-items-center justify-content-center">
          <?php
           $check_image=check_topper_student_image_count($row->id);
           $topper_student_image=topper_student_image($row->id);
           if($check_image==1){
            $class='col-md-6 mt-4';
           }elseif($check_image== 3){
            $class='col-md-4';
           }else{
            $class='col-md-6';
           }
          ?>
            <?php
            foreach($topper_student_image as $img)
            {
            ?>
             <div class="<?=$class?>">
            <img src="{{URL::asset('admin/upload/topperstudent/image/'.$img->image)}}">
            </div>
            <?php }?>
        </div>
<?php }?>
</div>
     

    </section>
</body>
@endsection