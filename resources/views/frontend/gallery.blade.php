
@extends('frontend.layouts.main')
@section('container')
<body>
    <main id="main">
        <div class="banner">
        <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1><?=!empty($title)?$title:'Gallery'?></h1>
                <h5>
                    <a href="{{url('/')}}">Home</a> /Gallery<span><?=!empty($title)?'/'.$title:''?></span>     
                </h5>
            </div>
        </div>

        <section class="craft">
            <div class="container mx-auto">
                <div class="row align-items-center justify-content-center">
                @foreach($photocategory_data as $photo_cat )
                @php
                                $rowcount11 ='';
                    $check_photo_category=check_photo_category($photo_cat->id);
                    $rowcount11 =get_parent_photocat($photo_cat->id);
                    @endphp
                    <div class="col-lg-4 col-md-6">
                    @if($check_photo_category>0 || $rowcount11 > 0)
                    @if($rowcount11 > 0)
                                <a href="{{url('frontend/sub_photo_gallery/'.$photo_cat->id)}}">
                                @else
                                <a href="{{url('frontend/photo_gallery_details/'.$photo_cat->id)}}">
                                @endif
                   
                            <div class="gallery">
                                <img src="{{ URL::asset('/public/admin/upload/photoGallery/thumbnail/'.$photo_cat->thumbnail)}}" class="img-fluid" alt="">
                                <h5>
                                @if($rowcount11 > 0)
                                <a style="color:white" href="{{url('frontend/sub_photo_gallery/'.$photo_cat->id)}}">
                                @else
                                <a style="color:white" href="{{url('frontend/photo_gallery_details/'.$photo_cat->id)}}">
                                @endif
                                {{$photo_cat->title}}
                            
                            </a>
                        </h5>
                               @else
                               <h5><a style="color:white" href="#">{{$photo_cat->title}}</a></h5>
                               @endif
                            </div>
                        </a>
                    </div>
                  
                    @endforeach


                </div>
            </div>
        </section>


    </main>


</body>
@endsection