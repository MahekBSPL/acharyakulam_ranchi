@extends('frontend.layouts.main')
@section('container')


<body>
    <main id="main">
        <div class="banner">
        <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Games</h1>
                <h5>
                    <a  href="{{url('/')}}">Home</a> / <span>FACILITIES</span>
                </h5>
            </div>
        </div>

        <div class="sport">
            <div class="container" data-aos="fade-up">
                <div class="heading pt-3">
                    <h2>Games</h2>
                </div>
            </div>
            <section class="craft">
                <div class="container" data-aos="fade-up">
                    <div class="row">
<?php
foreach($result as $row){
?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <div class="gallery">
                                <img src="{{ URL::asset('/public/admin/upload/photoGallery/thumbnail/'.$row->thumbnail)}}" class="img-fluid" alt="">

                                    <h5><?=$row->title?></h5>
                                </div>
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="/public/assets/img/facility/Badminton.webp" data-gallery="portfolioGallery"
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





