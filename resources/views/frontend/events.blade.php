@extends('frontend.layouts.main')
@section('container')

<style>
  .events-slide h5 {
    font-size: 15px;
    font-weight: 600;
    margin-top: 0;
    margin-bottom: 5px;
  }
</style>

<body>
  <main id="main">
    <div class="banner">
      <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Events</h1>
        <h5>
          <a href="index.php">Home</a> / <span>Events</span>
        </h5>
      </div>
    </div>


    <section class="events-slide">
      <div class="container" data-aos="fade-up">
<?php
foreach($result as $row)
{
  ?>
        <div class="row align-items-center">
          <h4><?=$row->title?></h4>
          <?php
          if(!empty($row->sub_title)){
          ?>
          <h5><?=$row->sub_title?></h5>
          <?php }?>
          <h6><span><strong> Date:</strong><?=$row->date?> </span> <br /><span><strong> Event
                Location:</strong>  <?=$row->location?> </span></h6>

          <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="200">
         
            <img src="{{ URL::asset('admin/upload/event/'.$row->image)}}" class="img-fluid" alt="">
          </div>
        
         <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
         <?=$row->description?>
            <!-- <ul>
              <li>1. Adm no. Rajat Kaushik  (IX-B) Won Silver Medal</li>
              <li>2. Adm no. 01234 Keshav Purohit (IX-C) Won Bronze Medal</li>
              <li>3. Adm no. 00619 Abhinash kumar (IX-C) Won Bronze Medal</li>
              <li>4. Adm no. 00322 Aditya Raj (IX-C) Participants</li>
              <li>5. Adm no. 01392 Shresth Mathur  (IX-C) Participants</li>
            </ul> -->
          </div> 
        </div>
<?php }?>

        <!-- <div class="row align-items-center">
          <h4>19th Sub Junior Wushu State Championship -2023 Jharkhand</h4>
          <h6><strong> Date:</strong> From- 13-05-2023 to
            14-05-20232</span> <span><strong>Event
                Location:</strong> Muri Ranchi, Jharkhand</span></h6>
          <img src="assets/img/events/Wushu-State -2023-A.webp" class="img-fluid" alt="" style="margin-bottom:20px;">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <ul>
              <li> Adm no. 01976 - Lipika Shrestha (V-A Won Silver Medal) </li>
              <li>Adm No. 00259 – Aditya pandey (VIII-B) Won Silver Medal</li>
              <li>Adm No. 01946 – Soumya Kumari (VII-A) Won Silver Medal</li>
              <li>Adm No. 00286 – Suhana Sikha (VIII-A) Won Silver Medal</li>
            </ul>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <ul>

              <li>Adm No. 00286 – Janvi Kumari (V-C) Won Silver Medal</li>
              <li>Adm No. 00439 - Anushka Jaiswal (VI-A) Won Silver Medal</li>
              <li>Adm No. 01671 - Anik Sharma (VI-B) Won Silver Medal</li>
            </ul>
          </div>
        </div> -->




          


        </div>
      </div>
    </section>

    @endsection
</body>
