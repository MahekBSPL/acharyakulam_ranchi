<!DOCTYPE html>

@extends('frontend.layouts.main')
@section('container')

<body>
    <main id="main">
        <div class="banner">
            <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1><?= !empty($title) ? $title : "" ?></h1>
                <h5>
                    <a href="{{url('/')}}">Home</a> / <span>Gallery</span>
                </h5>
            </div>
        </div>

        <div class="sport">
            <div class="container" data-aos="fade-up"></div>
            <section class="craft">
                <div class="container" data-aos="fade-up">
                    <div class="row">

                        @foreach($photoGallery as $p)
                        @php
                        $check_photo_category=check_photo_category($p->id);
                        @endphp

                        <div class="col-lg-4  col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ URL::asset('/public/admin/upload/photoGallery/photo/'.$p->img)}}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <div class="portfolio-links">
                                        @if($check_photo_category>0)
                                        <h5><a style="color:white" href="{{url('public/frontend/photo_gallery_details/'.$p->id)}}">{{$p->title}}</a></h5>
                                        @else
                                        <h5><a style="color:white" href="#">{{$p->title}}</a></h5>
                                        @endif
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

        </div>

    </main>
</body>
@endsection