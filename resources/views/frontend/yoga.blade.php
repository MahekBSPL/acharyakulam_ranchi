@extends('frontend.layouts.main')
@section('container')

<body>
    <main id="main">
        <div class="banner">
            <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Participation in Yoga</h1>
                <h5>
                    <a href="{{url('frontend/index')}}">Home</a> / <span>Academics</span>
                </h5>
            </div>
        </div>

        <section class="sport">
            <div class="container" data-aos="fade-up">
                <div class="heading">
                    <h2>Participation in Yoga</h2>
                </div>
                <div class="craft mt-4">
                    <div class="row">

                    @foreach($yogas as $yoga)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{url('/admin/upload/yoga/'.$yoga->image)}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                               
                                    <div class="portfolio-links">
                                        <a href="{{url('/admin/upload/yoga/'.$yoga->image)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 74.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 74.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 75.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 75.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 76.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 76.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 77.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 77.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4  col-md-6  portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 78.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 78.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="assets/img/yoga/Mask Group 79.png" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        <a href="assets/img/yoga/Mask Group 79.png" data-gallery="portfolioGallery"
                                            class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>-->
                    </div>
                </div>
            </div>
        </section>

</body>
@endsection