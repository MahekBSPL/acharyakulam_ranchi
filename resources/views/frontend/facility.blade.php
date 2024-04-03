@extends('frontend.layouts.main')
@section('container')
<style>
   campus {
      -webkit-transition: opacity .5s ease;
      -o-transition: opacity .5s ease;
      transition: opacity .5s ease;
      overflow: hidden;
      background: #fff url(../images/bg6.jpg) no-repeat top center;
      padding: 80px 40px;
   }


   .nav-tabs1 {
      border-bottom: 1px solid #fff
   }

   .nav-tabs1 .nav-link {
      background-color: #f7f7f7;
      border: 0px;
      margin-left: 4px;
      padding: 13px 14px;
      font-weight: 600;
      text-transform: uppercase;
      color: #858585;
      border-radius: 0
   }

   .nav-tabs1 .nav-link.active {
      color: #fff;
      background-color: #F57C00
   }

   .tab-content>.active {
      display: block;
      background-repeat: no-repeat;
      -webkit-box-shadow: 0 0 191px 0 rgba(0, 0, 0, .06);
      box-shadow: 0 0 191px 0 rgba(0, 0, 0, .06);
      width: 100%
   }

   .tab-content .img-box {
      margin-top: -70px;
      position: relative;
      padding: 0
   }

   .tab-content .content {
      padding: 45px;
   }

   .hindi-text {
      font-family: 'Poppins', sans-serif;
      font-size: 25px;
      font-weight: bold;
      color: #F57C00;
      padding-top: 20px
   }

   .white-text {
      color: #fff
   }

   .principal-message {
      background: #f1f0f6;
   }

   .principal-message .content {
      padding: 25px
   }


   .left_element {
      float: right;
      position: relative;
      width: auto;
      text-align: right
   }

   .left_element ul li {
      position: relative;
      display: inline-block
   }

   .left_element ul li a {
      display: inline-block;
      color: #fff;
      padding: 15px 15px;
      border-left: 1px solid rgba(255, 255, 255, .3);
      background: #002147
   }

   .left_element ul li:last-child a {
      border-right: 1px solid rgba(255, 255, 255, .3)
   }

   .left_element li a:hover {
      color: #fff;
      background: #F57C00
   }

   ul.top-menu {
      display: -webkit-inline-box;
      position: relative;
   }


   .highlight-item {
      position: relative;
      margin: 5px
   }

   .highlight-item .post-image1 {
      border-radius: 0px;
      margin-bottom: 0;
      overflow: hidden;
      margin: 0;
   }

   .highlight-item .post-image1 img {
      transition: transform 650ms ease-in-out, filter 650ms ease-in-out;
      overflow: hidden;
      width: 100%;
      height: auto
   }

   .highlight-item:hover .post-image1 img {
      transform: scale3d(1.05, 1.05, 1.05)
   }

   .highlight-item .post-image1 .mask {
      content: ' ';
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      pointer-events: none;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(65, 34, 54, 0)), to(#040404));
      background: linear-gradient(to bottom, rgba(65, 34, 54, 0) 55%, #131313 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00f7a42a', endColorstr='#f7a42a', GradientType=0);
      opacity: 1;
      border-radius: 0px
   }

   .highlight-item .post-content1 {
      position: absolute;
      padding: 5px 20px;
      bottom: 15px;
      width: 100%;
      text-align: center;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
   }

   .highlight-item .post-content1 h5 {
      font-size: 23px;
      color: #fff
   }

   .highlight-item .post-content1 p {
      color: #fff
   }

   .highlight-item a .post-content1 {
      color: #fff;
   }

   .facilities-item {
      position: relative;
      margin: 1px
   }

   .facilities-item .post-image1 {
      border-radius: 0px;
      margin-bottom: 0;
      overflow: hidden;
      margin: 0;
   }

   .facilities-item .post-image1 img {
      transition: transform 650ms ease-in-out, filter 650ms ease-in-out;
      overflow: hidden
   }

   .facilities-item:hover .post-image1 img {
      transform: scale3d(1.05, 1.05, 1.05)
   }

   .facilities-item .post-image1 .mask {
      content: ' ';
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      pointer-events: none;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      background: -webkit-gradient(linear, left top, left bottom, from(rgba(65, 34, 54, 0)), to(#040404));
      background: linear-gradient(to bottom, rgba(65, 34, 54, 0) 55%, #131313 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00f7a42a', endColorstr='#f7a42a', GradientType=0);
      opacity: 1;
      border-radius: 0px
   }

   .facilities-item .post-content1 {
      position: absolute;
      padding: 5px 20px;
      bottom: 15px;
      width: 100%;
      text-align: center;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
   }

   .facilities-item .post-content1 h5 {
      font-size: 24px;
      color: #fff
   }

   .facilities-item .post-content1 p {
      color: #fff
   }

   .facilities-item a .post-content1 {
      color: #fff;
   }

   .facilities-item1 {
      position: relative;
      margin-bottom: 10px
   }

   .facilities-item1 .post-image1 {
      border-radius: 0px;
      margin-bottom: 0;
      overflow: hidden;
      margin: 0;
   }

   .facilities-item1 .post-image1 img {
      transition: transform 650ms ease-in-out, filter 650ms ease-in-out;
      overflow: hidden
   }

   .facilities-item1:hover .post-image1 img {
      transform: scale3d(1.05, 1.05, 1.05)
   }

   .facilities-item1 .post-image1 .mask {
      content: ' ';
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      pointer-events: none;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      background: rgba(0, 0, 0, .25);
      opacity: 1;
      border-radius: 0px
   }

   .facilities-item1 .post-content1 {
      position: absolute;
      padding: 0 20px;
      top: 50%;
      width: 100%;
      text-align: center;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
   }

   .facilities-item1 .post-content1 h5 {
      font-size: 34px;
      color: #fff;
      text-shadow: 2px 2px 0px rgb(115 103 103 / 40%)
   }

   .facilities-item1 a .post-content1 {
      color: #fff;
   }

   .facilities-item2 {
      position: relative;
      margin-bottom: 25px
   }

   .facilities-item2 .post-image1 {
      border-radius: 0px;
      margin-bottom: 0;
      overflow: hidden;
      margin: 0;
   }

   .facilities-item2 .post-image1 img {
      transition: transform 650ms ease-in-out, filter 650ms ease-in-out;
      overflow: hidden
   }

   .facilities-item2:hover .post-image1 img {
      transform: scale3d(1.05, 1.05, 1.05)
   }

   .facilities-item2 .post-image1 .mask {
      content: ' ';
      position: absolute;
      z-index: 0;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      pointer-events: none;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      background: rgba(0, 0, 0, .5);
      opacity: 1;
      border-radius: 0px
   }

   .facilities-item2 .post-content1 {
      position: absolute;
      padding: 20px;
      bottom: 0px;
      width: 100%;
      text-align: center;
      -webkit-transition: all 0.5s ease;
      transition: all 0.5s ease;
      color: #fff
   }

   .facilities-item1 .post-content1 h5 {
      font-size: 34px;
      color: #fff;
      text-shadow: 2px 2px 0px rgb(115 103 103 / 40%)
   }

   .facilities-item2 a .post-content1 {
      color: #fff;
   }

   .read-more {
      opacity: 0;
      background: #fff;
      border-color: #fff;
      color: #232323;
      display: inline-block;
      border: 2px solid transparent;
      letter-spacing: .5px;
      line-height: inherit;
      border-radius: 0;
      width: auto;
      font-weight: bold;
      transition-duration: 0.3s;
      padding: 5px 25px;
      transition-timing-function: ease-in-out;
      font-size: 14px
   }

   .read-more:hover {
      border: 2px solid #fff;
      background: transparent;
      color: #fff
   }

   .facilities-item:hover .post-content1 {
      bottom: 20px
   }

   .facilities-item1:hover .post-content1 {
      bottom: 20px
   }

   .facilities-item2:hover .post-content1 {
      bottom: 20px
   }

   .facilities-item:hover .post-image1 img,
   .facilities-item1:hover .post-image1 img {
      transform: scale3d(1.05, 1.05, 1.05)
   }

   .facilities-item:hover .post-image1 .mask,
   .facilities-item2:hover .post-image1 .mask {}

   .facilities-item1:hover .post-image1 .mask {
      background: rgba(0, 0, 0, .5)
   }

   .facilities-item:hover .read-more,
   .facilities-item1:hover .read-more,
   .facilities-item2:hover .read-more {
      opacity: 1
   }

   .box {
      display: block;
      background: rgb(17 20 51 / 56%);
      margin-bottom: 1em;
   }

   .shlok {
      background: url(../images/shlok.jpg) no-repeat top center;
      background-size: cover;
      padding: 10px 30px;
      height: 100%
   }

   .slider {
      position: fixed;
      background: #fcc439;
      color: #1d1c1c;
      text-transform: uppercase;
      padding: 5px 10px;
      top: 285px;
      font-weight: bold;
      right: -70px;
      transform: rotate(-90deg);
      -webkit-transform: rotate(-90deg);
      -moz-transform: rotate(-90deg);
      -ms-transform: rotate(-90deg);
      z-index: 8;
      -o-transform: rotate(-90deg)
   }

   /* The Overlay (background) */
   .overlay {
      height: auto;
      width: 250px;
      position: fixed;
      /* Stay in place */
      z-index: 9;
      /* Sit on top */
      right: 0;
      top: 210px;
      background: url(../images/shlok.jpg) no-repeat top center;
      overflow-x: hidden;
      /* Disable horizontal scroll */
      transition: 0.5s;
      /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
   }

   .dir-sec {
      margin-bottom: 0px;
   }

   .dir-sec .col-sm-3 {
      padding: 3px;
   }

   .overlay h4 {
      color: #010101;
      font-size: 1.25rem;
      font-weight: 600
   }

   .overlay-content {
      position: relative;
      top: 12%;
      /* 25% from the top */
      text-align: center;
      /* Centered text/links */
      padding: 20px 10px;
      /* 30px top margin to avoid conflict with the close button on smaller screens */
   }

   .overlay a {
      text-decoration: none;
      display: block;
      /* Display block instead of inline */
      transition: 0.3s;
      /* Transition effects on hover (color) */
   }

   .overlay a:hover,
   .overlay a:focus {
      color: #333;
   }

   /* Position the close button (top right corner) */
   .overlay .closebtn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      color: #000;
      z-index: 9
   }

   /* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */

   .mrgt10 {
      margin-top: 20px;
   }

   .green-box-01 {
      background: #074;
      padding: 0px 15px;
      padding-top: 10px;
      padding-bottom: 1px;
      color: #fff;
      margin-bottom: 20px;
   }



   .date-ctrl {
      border: 1px solid #074;
      padding: 6px;
      color: #010101;
      text-align: center;
      font-size: 19px;
      background: transparent;
      width: 50px;
      height: 58px;
   }


   .dir-sec {
      position: relative;
      overflow: hidden
   }

   .dir-sec1 {
      position: relative;
      overflow: hidden
   }

   .slider1 {
      background: #FF9800;
      margin-top: 0px;
      position: absolute;
      right: 0px;
      transition: 0.3s;
      z-index: 9;
      top: 0;
      overflow: hidden;
      padding: 35px 25px;
      width: 100%;
      color: #fff;
      height: 100%;
      margin-right: 0px;
      margin-left: 0px;
   }

   .slider1 .close-btn {
      position: absolute;
      left: 95%;
      top: 9px;
      color: #fff;
      z-index: 1;
      display: block;
      cursor: pointer;
   }

   .slider2 {
      background: #2ea763;
      margin-top: 15px;
      position: absolute;
      right: 0px;
      transition: 0.3s;
      z-index: 9;
      bottom: 0;
      overflow: hidden;
      padding: 35px 25px;
      width: 100%;
      color: #fff;
      min-height: 360px;
      margin-right: 0px;
      margin-left: 0px;
   }

   .slider2 .close-btn {
      position: absolute;
      left: 95%;
      top: 9px;
      color: #fff;
      z-index: 1;
      display: block;
      cursor: pointer;
   }

   .div-description {
      display: none;
      transition: 1s;
      left: 0;
      animation: slide-in 0.5s forwards;
      -webkit-animation: slide-in 0.5s forwards;
   }


   @keyframes slide-in {
      0% {
         -webkit-transform: translateX(100%);
      }

      100% {
         -webkit-transform: translateX(0%);
      }
   }


   .house-activity img {

      width: 134px !important;

   }


   .panel {
      background: #f8f8f9;
      color: #535353;
      padding: 20px 40px 30px
   }

   .panelshow {
      display: block
   }

   .panelhide {
      display: none;
   }

   .slider-content1 {
      position: absolute;
      display: block;
      bottom: 18px;
      transform: none;
      left: 0%;
      z-index: 5;
      width: 100%;
      background: none;
      border: none;
      top: 37%;
   }




   .fs-14 {
      font-size: 14px;
   }

   .btn-ctrl-01 {
      background: #fcc439;
      font-size: 16px;
      color: #000;
      /* font-weight: 600; */
      padding: 9px 31px;
      border-radius: 3px;
   }

   .img-c1 {
      border-radius: 50%;
      width: 50% !important;

      margin-bottom: 13px;
   }

   .min-h {
      min-height: 450px;
   }

   .grey-text {
      color: #535353;
   }

   .m-ctrl {
      margin-top: 151px;
   }

   .m-ctrl1 {
      margin-top: 24px;
   }

   .m-ctrl2 {
      margin-top: 49px;
   }

   @media only screen and (max-width: 1366px) {
      .slider-content1 {
         position: absolute;
         display: block;
         bottom: 18px;
         transform: none;
         left: 0%;
         z-index: 5;
         width: 100%;
         background: none;
         border: none;
         top: 32%;
      }

      .m-ctrl {
         margin-top: 178px;
      }

      .m-ctrl1 {
         margin-top: 76px;
      }

      .date-ctrl {
         border: 1px solid #074;
         padding: 6px;
         color: #010101;
         text-align: center;
         font-size: 19px;
         background: transparent;
         width: 50px;
         height: 58px;
      }

      .pd-r {
         padding: 0 20px;
      }
   }

   .dir-sec p {
      color: #fff;
      line-height: 24px;
   }



   .innerdiv1 {
      display: inline-block;
      justify-content: space-evenly;
   }

   .tr {
      text-align: left;
   }

   .slider-content1 {
      position: absolute;
      display: block;
      bottom: -11px;
      transform: none;
      left: 0%;
      z-index: 5;
      width: 100%;
      background: none;
      border: none;
   }

   .m-ctrl {
      margin-top: 0px;
   }

   .m-ctrl1 {
      margin-top: 0px;
   }


   @media only screen and (max-width: 480px) {

      .dc {
         display: inline-flex;
      }

      .innerdiv1 {
         display: inline-block;
         justify-content: space-evenly;
      }


      .mrgt10 {
         margin-top: 10px;
      }

      .section-title-txt {
         font-size: 30px;
         line-height: 28px;
         margin-top: 0;
      }

      .tr {
         text-align: left;
      }

      .slider-content1 {
         position: absolute;
         display: block;
         bottom: -11px;
         transform: none;
         left: 0%;
         z-index: 5;
         width: 100%;
         background: none;
         border: none;
      }

      .m-ctrl {
         margin-top: 0px;
      }

      .m-ctrl1 {
         margin-top: 0px;
      }

      .banner-inner .gradient-bg {
         position: absolute;
         bottom: 0;
         height: 413px;
         background: linear-gradient(rgba(0, 0, 0, 0), rgb(0 0 0 / 63%));
         -moz-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         -o-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         -webkit-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         z-index: 2;
         width: 100%;
      }

      .mrgtop-20 {
         margin-top: 20px;
      }


      .m-ctrl2 {
         margin-top: 0;
      }

   }

   @media only screen and (max-width: 380px) {

      .dc {
         display: inline-flex;
      }

      .innerdiv1 {
         display: inline-block;
         justify-content: space-evenly;
      }

      .h1,
      h1 {
         font-size: 30px;
      }

      .mrgt10 {
         margin-top: 10px;
      }

      .section-title-txt {
         font-size: 30px;
         line-height: 28px;
         margin-top: 0;
      }

      .tr {
         text-align: left;
      }

      .slider-content1 {
         position: absolute;
         display: block;
         bottom: -11px;
         transform: none;
         left: 0%;
         z-index: 5;
         width: 100%;
         background: none;
         border: none;
      }

      .m-ctrl {
         margin-top: 0px;
      }

      .m-ctrl1 {
         margin-top: 0px;
      }

      .date-ctrl {
         width: 55px;
         border: 1px solid #ffc600;
         padding: 10px 10px;
         color: #fff;
         text-align: center;
         background: #074;
      }

      .banner-cont {
         position: absolute;
         top: 50%;
         z-index: 9;
         color: #fff !important;
         width: 100%;
         font-weight: bolder;
         text-align: center;
      }

      .banner-inner .gradient-bg {
         position: absolute;
         bottom: 0;
         height: 413px;
         background: linear-gradient(rgba(0, 0, 0, 0), rgb(0 0 0 / 63%));
         -moz-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         -o-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         -webkit-background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 100));
         z-index: 2;
         width: 100%;
      }

      .mrgtop-20 {
         margin-top: 20px;
      }



      .m-ctrl2 {
         margin-top: 0;
      }

      .date-ctrl {
         border: 1px solid #fff8f3;
         padding: 10px 6px;
         color: #fff;
         text-align: center;
         background: #074;
         width: 76px;
         height: 76px;
      }

      .heading {
         border-bottom: 1px solid lightgrey;
      }
   }
</style>

<body>
   <main id="main">
      <div class="banner">
         <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
         <div class="banner-inr breadcrumbs">
            <h1>Facilities</h1>
            <h5>
               <a href="{{url('frontend/index')}}">Home</a> / <span>Facilities</span>
            </h5>
         </div>
      </div>

      <section class="p70">
         <div class="container">
            <h2>Campus & Facility</h2>
            <div class="row">
               <div class="col-lg-7">
                  @foreach($facilityDescriptions as $facilityDescription)
                  <p>{{strip_tags(html_entity_decode($facilityDescription->description))}}</p>
                  @endforeach
               </div>

               <div class="col-lg-5">
                  <div class="swiper heroSwiper">
                     <div class="swiper-wrapper">
                        @foreach($facilitySliders as $facilitySlider)
                        <div class="swiper-slide">
                           <img src="{{url('/admin/upload/facilitySlider/' .$facilitySlider->image)}}" class="img-fluid" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section class="p20">
         <div class="container-fluid container-fluid1">
            <div class="row">
               <div class="col-md-12">
                  @foreach($facilitys as $key => $facility)
                  @if($key % 4 == 0)
                  <div class="dir-sec">
                     <div class="row">
                        @endif
                        @if($facility->type == 1)
                        <div class="slider1 div-description" id="dir-{{$key + 1}}" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-{{$key + 1}}');">
                                 <img src="{{url('frontend/assets/img/close-btn.png')}}" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">{{$facility->title}}</h3>
                                 <p>{{strip_tags(html_entity_decode($facility->description))}}</p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-{{$key + 1}}');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="{{url('/admin/upload/facility/' .$facility->image)}}" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>{{$facility->title}}</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                        @elseif($facility->type == 2)
                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="{{ url('/frontend/' . $facility->url) }}">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-{{$key + 1}}');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="{{url('/admin/upload/facility/' .$facility->image)}}" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>{{$facility->title}}</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>
                        @endif
                        @if(($key + 1) % 4 == 0 || $key == count($facilitys) - 1)
                     </div><!-- closing row -->
                  </div><!-- closing dir-sec -->
                  @endif
                  @endforeach
               </div>
            </div>

         </div>
      </section>


      <script type="text/javascript" src="{{url('frontend/assets/js/facility.js')}}"></script>
   </main>
</body>
@endsection