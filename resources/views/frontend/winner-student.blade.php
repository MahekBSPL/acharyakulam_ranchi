@extends('frontend.layouts.main')
@section('container')

<body>
    <main id="main">
        <div class="banner">
        <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>winner student</h1>
                <h5>
                    <a  href="{{url('/')}}">Home</a> / <span>Winner Students</span>
                </h5>
            </div>
        </div>

        <div class="sport">
            <div class="container" data-aos="fade-up"></div>
            <section class="craft">
                <div class="container" data-aos="fade-up">
                    <div class="row">
 <?php
                    foreach($winner as $row){
                    ?>

 <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{URL::asset('admin/upload/winner/'.$row->image)}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/winner-student/competition-01.jpeg" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                 <?php }?>
                        
                    
                       
                    </div>
                </div>
            </section>
        </div>
</body>
        @endsection