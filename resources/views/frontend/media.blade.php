@extends('frontend.layouts.main')
@section('container')

<body>
    <main id="main">
        <div class="banner">
            <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Media Print</h1>
                <h5>
                    <a href="{{url('/')}}">Home</a> / <span>Gallery</span>
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
                            <img src="{{url('/public/admin/upload/notification/'.$media->image)}}" class="img-fluid" alt="">
                            @elseif ($media->menutype == 2)
                            <img src="{{url('/public/admin/upload/notification/'.$media->fileupload)}}" class="img-fluid" alt="">
                            @endif
                            <div class="mask"></div>
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                @if ($media->menutype == 1)
                                <a href="{{url('/public/admin/upload/notification/'.$media->image)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                @elseif ($media->menutype == 2)
                                <a href="{{url('/public/admin/upload/notification/'.$media->fileupload)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i class="bi bi-plus"></i></a>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
</body>
@endsection