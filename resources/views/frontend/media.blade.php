@extends('frontend.layouts.main')
@section('container')

<body>
    <main id="main">
        <div class="banner">
            <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Media Print</h1>
                <h5>
                    <a href="{{url('frontend/index')}}">Home</a> / <span>Gallery</span>
                </h5>
            </div>
        </div>

        <section class="craft media-slide">
            <div class="container" data-aos="fade-up">
                <div class="row">

                    @foreach($medias as $media)
                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            @if ($media->menutype == 1)
                            <img src="{{url('/admin/upload/notification/'.$media->image)}}" class="img-fluid" alt="">
                            @elseif ($media->menutype == 2)
                            <img src="{{url('/admin/upload/notification/'.$media->fileupload)}}" class="img-fluid" alt="">
                            @endif
                            <div class="mask"></div>
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                @if ($media->menutype == 1)
                                <a href="{{url('/admin/upload/notification/'.$media->image)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                @elseif ($media->menutype == 2)
                                <a href="{{url('/admin/upload/notification/'.$media->fileupload)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/8.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/8.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/45.jpg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/45.jpg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/46.jpg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/46.jpg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/47.jpg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/47.jpg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/3.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/3.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6  portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/22.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/media/22.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6  portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/17.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/media/17.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6  portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/21.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/media/21.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6  portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/68.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                           
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/media/68.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/16.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/16.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/7.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/7.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/10.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/10.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/12.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/12.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/18.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/18.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/19.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/19.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/23.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/23.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/32.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/32.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/24.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/24.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/33.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/33.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/57.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/57.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/35.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/35.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/36.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/36.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/48.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/48.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/54.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/54.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/70.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/70.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/9.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/9.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/11.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/11.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/22.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/22.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/53.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/53.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/52.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/52.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/51.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/51.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/72.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/72.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/62.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/62.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/65.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/65.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/7.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/7.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/4.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/4.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/55.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/55.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/56.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/56.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/66.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/66.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/41.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/41.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/42.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/42.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/43.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/43.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/13.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/13.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/14.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/14.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/15.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/15.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/59.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/59.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/63.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/63.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/60.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/60.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/39.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/39.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/64.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/64.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/49.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/49.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/28.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/28.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/31.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/31.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/58.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/58.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/20.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/20.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/37.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/37.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/38.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/38.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/29.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/29.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/30.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/30.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/34.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/34.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/25.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/25.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/26.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/26.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/27.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/27.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/71.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/71.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/69.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/69.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/6.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/6.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/50.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/50.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/44.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/44.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/media/40.jpeg" class="img-fluid" alt="">
                            <div class="mask"></div>
                            
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/media/40.jpeg" data-gallery="portfolioGallery"
                                        class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> -->



                </div>
            </div>
        </section>

</body>
@endsection