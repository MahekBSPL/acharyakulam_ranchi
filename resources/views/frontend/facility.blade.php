<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php"); ?>

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
         <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
         <div class="banner-inr breadcrumbs">
            <h1>Facilities</h1>
            <h5>
               <a href="index.php">Home</a> / <span>Facilities</span>
            </h5>
         </div>
      </div>

      <section class="p70">
         <div class="container">
            <h2>Campus & Facility</h2>
            <div class="row">
               <div class="col-lg-7">
                  <p>The Acharyakulam, under the spiritual and divine guidance of Param Pujya Yogrishii Swami Ramdevji
                     and Param Shraddhey Acharya Balkrishnaji, nurtures its students in the divine and spiritual
                     precincts along with progressive education. We take care of our students’ dreams and aspirations
                     and are determined to provide holistic education by combining values, ethics and scientific
                     temperament.</p>
                  <p>Our students have proved their stature through their performance at the national level inyoga,
                     Bhagwat-Geeta, Sports, Wushu, and painting competitions. Students also participate in prestigious
                     events like the Mathematics, Science, General Knowledge, English and Social Science Olympiad.</p>
                  </p>
                  <p>Enhancing the skills of both teachers and students is the primary aim of Acharyakulam. We conduct
                     numerous teacher orientation programs to train our teachers. The classrooms are made lively and
                     constructive with the use of smart classes, state of the art teaching aids and innovative
                     pedagogies.</p>
               </div>

               <div class="col-lg-5">
                  <div class="swiper heroSwiper">

                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-A.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-B.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-C.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-D.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-E.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-F.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-G.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-H.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-I.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-J.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-K.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-L.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-M.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-N.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-O.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-P.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-Q.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-R.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-S.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-T.png" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-1.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-2.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-3.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-4.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-5.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-6.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-7.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-8.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-9.webp" class="img-fluid" alt="...">
                        </div>
                     </div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!-- <section class="p70">
         <div class="container">
            <h2>Campus & Facility</h2>
            <div class="row">
               <div class="col-lg-7">
                  <p>The Acharyakulam, under the spiritual and divine guidance of Param Pujya Yogrishii Swami Ramdevji
                     and Param Shraddhey Acharya Balkrishnaji, nurtures its students in the divine and spiritual
                     precincts along with progressive education. We take care of our students’ dreams and aspirations
                     and are determined to provide holistic education by combining values, ethics, and scientific
                     temperament.</p>
                  <p>Our students have proved their stature through their performance at the national level in yoga,
                     Bhagwat-Geeta, Sports, Wushu, and painting competitions. Students also participate in prestigious
                     events like the Mathematics, Science, General Knowledge, English and Social Science Olympiad.</p>
                  <p>Enhancing the skills of both teachers and students is the primary aim of Acharyakulam. We conduct
                     numerous teacher orientation programs to train our teachers. The classrooms are made lively and
                     constructive with the use of smart classes, state of the art teaching aids, and innovative
                     pedagogies.</p>
               </div>

               <div class="col-lg-5">
                  <div class="swiper heroSwiper">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-A.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-B.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-C.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-D.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-E.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-F.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-G.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-H.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-I.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-J.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-K.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-L.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-M.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-N.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-O.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-P.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-Q.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-R.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-S.png" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-T.png" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-1.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-2.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-3.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-4.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-5.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-6.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-7.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-8.webp" class="img-fluid" alt="...">
                        </div>

                        <div class="swiper-slide">
                           <img src="assets/img/facility/campus-9.webp" class="img-fluid" alt="...">
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                     </div>
                  </div>
               </div>
            </div>
      </section> -->

      <section class="p20">
         <div class="container-fluid container-fluid1">
            <div class="row">
               <div class="col-md-12">
                  <div class="dir-sec">
                     <div class="row">
                        <div class="slider1 div-description" id="dir-1" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-1');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Co-Curricular Activities</h3>
                                 <p> The school has two activity rooms for small kids to enable them to enhance in all
                                    cocurricular activities. Poem recitation, debate, speech, declamation, essay writing
                                    painting, sketching, calligraphy, poster making, collage making, mock parliament
                                    etc. are
                                    such various competitions which are organized from time to time to develop students’
                                    oratory, writing, painting etc. skills. Picnic and educational tours are also
                                    organized by
                                    school.
                                 </p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-1');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/activity.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Co-Curricular Activities</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>


                        <div class="slider1 div-description" id="dir-2" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-2');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Administrative Block</h3>
                                 <p>The nodal point of our campus, the Acharyakulam Administrative Block is designed to
                                    reflect the lively and Vedic transparent character of the school. It accommodates
                                    key staff offices and departments, the conferencing center, the visitors’ Lounge as
                                    well as an outlet for complete school campus.</p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-2');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/adminstrator-boared.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5> Administrative Block</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                        <div class="slider1 div-description" id="dir-3" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-3');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Art & Craft</h3>
                                 <p>
                                    Art and craft education is an integral part of student’s learning. It stimulates
                                    their imagination and stirs up a lot of artistic and inventive ideas. Acharyakulam
                                    focuses on sparkling students’ creativity by exploring 2-dimensional, 3-Dimensional
                                    art, madhubani painting, silhouette painting, mosaic painting etc. Students are

                                    encouraged to participate, and practice paper made card, paper folding, Diya
                                    decoration, toran & rangoli making and best out of waste etc to enhance individual’s
                                    craftsmanship.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-3');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/art-craft.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5> Art & Craft</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>



                        <div class="slider1 div-description" id="dir-4" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-4');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Assembly Area</h3>
                                 <p>The school has two big assembly areas to let students enhance their public speaking
                                    skills and eliminate their stage fright. One is in Green court and the other on the
                                    fourth-floor hall. We conduct assemblies in English/Hindi and Sanskrit. Special days
                                    are also celebrated in assembly.</p>
                              </div>
                           </div>
                        </div>



                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-4');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/assembly-area.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Assembly Area</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </div>
                  </div>


                  <div class="dir-sec">
                     <div class="row">
                        <div class="slider1 div-description" id="dir-5" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-5');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Computer Lab</h3>
                                 <p>Technology plays a vital role in modern education, which is fulfilled by fully
                                    equipped computer-lab with 50 computers, having access to Wi-Fi enabling a class to
                                    sit comfortably and practice lab assignments. Our computer labs provide structured,
                                    inclusive learning environments, grooming students for future dominated by
                                    technology</p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-5');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/computer-lab.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Computer Lab</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>



                        <div class="slider1 div-description" id="dir-6" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-6');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">Dance</h3>
                                 <p></p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-6');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/dance.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Dance</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>



                        <!-- <div class="slider1 div-description" id="dir-7" style="display: none;">
                     <div class="row">
                        <div class="close-btn" onclick="manage_close('dir-7');">
                           <img src="assets/img/close-btn.png" class="img-fluid">
                        </div>
                        <div class="col-lg-12 text-center">
                           <h3 class="sec-title-1 white-text">Games</h3>
                           <p></p>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-3 col-sm-3 col-6 npm">
                     <a href="javascript:;">
                        <div class="director-img" onclick="manage_display_of_description_div('dir-7');">
                           <div class="facilities-item">
                              <div class="post-image1">
                              <img src="assets/img/facility/games.webp"  class="w-100">
                                 <div class="mask"></div>
                              </div>
                              <div class="post-content1">
                                 <h5>Games</h5>
                              </div>
                           </div>
                        </div>
                     </a>
                  </div>
-->

                        <div class="slider1 div-description" id="dir-8" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-8');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Hobby Centre</h3>
                                 <p>Aakaar - translates to Form and Anant- meaning a manifestation of all possibilities
                                    which are 'Infinite' in experience is the venue for learning which is expressive and
                                    intuitive. The school has Art and Craft Studios, The Dramatics Wing, Vocal and
                                    Instrumental Music, Dance Studios etc. The school has big Music room with all
                                    instruments where students learn and practice both vocal and instrumental and a
                                    Dance room where all students learn both classical and western dance. </p>
                              </div>
                           </div>
                        </div>



                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-8');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/hobby-center.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Hobby Centre</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>


                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="outdoor-games.php">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-9');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/indoor-games.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Sports Facility</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>


                     </div>
                  </div>
                  <div class="dir-sec">
                     <div class="row">

                        <div class="slider1 div-description" id="dir-10" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-10');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Learning Lab</h3>
                                 <p>"If I can’t learn the way you teach, will you teach me the way I learn" The School
                                    believes that Learning should be a joyful experience for all and to this end we now
                                    have a Special Needs Department called 'The Learning Lab' to support the students
                                    who are differently able.</p>
                              </div>
                           </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-10');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/learning-lab.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Learning Lab</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>





                        <div class="slider1 div-description" id="dir-11" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-11');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">Library</h3>
                                 <p>The digital age cannot lessen the importance of school libraries. In the context of
                                    schools, libraries play a significant role in providing information to students in
                                    the
                                    academic field. The books stored on the shelves of libraries are the source of
                                    wisdom
                                    and knowledge. The school has well equipped library for both Senior and Primary
                                    wing. The books on various topics, story books, novels, motivational books, poems,
                                    cartoon books etc. are arranged sequentially thereby catering the needs of
                                    individuals.
                                 <p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-11');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/library.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Library</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>


                        <div class="slider1 div-description" id="dir-12" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-12');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">Musical Activities and Dance</h3>
                                 <p>Children of all ages love activities combining music and movement, and they’re also
                                    important for brain development and physical, social and emotional growth. Even
                                    newborns can respond when nursery rhymes are sung to them, and dancing to
                                    music is a great way for children to release energy. Our children are taught playing
                                    instruments in a band or singing a choir, tapping their feet to numerous musical
                                    beats under the able guidance of dedicated Music and Dance teacher. Many dance
                                    numbers are choreographed, and cultural events are being organized from time to
                                    time. The school has big Music room with all instruments where students learn and
                                    practice
                                    both vocal and instrumental and a Dance room where all students learn both classical
                                    and
                                    western dance. </p>
                              </div>
                           </div>
                        </div>



                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-12');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/music-activity.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Musical Activities and Dance</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>

                        <div class="slider1 div-description" id="dir-14" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-14');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">Picnic tours / Educational tours</h3>
                                 <p>Educational tours are a crucial component of the academic program because they
                                    give students the chance to learn outside the classroom and get useful practical
                                    experience. There is a proverb that goes,<strong> “I hear and I forget, I see and I
                                       remember, I do and I comprehend,”</strong> and it refers to the idea that seeing
                                    something
                                    being done in a certain location helps people remember it better. In the view of the
                                    same the school organizes picnic tours / educational tours to nearby / far off
                                    places. A visit to science city, Biodiversity park, Amul dairy, Birsa Munda Museum,
                                    visit to Raj Bhawan etc. is being organized from time to time</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-14');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/picnic-tour.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Picnic tours / Educational tours</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>


                     </div>
                  </div>
                  <div class="dir-sec">
                     <div class="row">



                        <div class="slider1 div-description" id="dir-15" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-15');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text">Smart Class</h3>
                                 <p>A smart classroom is a digital classroom which is an advanced form of a school that
                                    follows different ways of teaching to improve efficiency. They work towards
                                    providing a better environment for learning and prioritize a healthy classroom
                                    where the students are interested in learning. Our class rooms are digitized.Instead
                                    of reading out facts from a textbook, a teacher gets the freedom to share exciting
                                    data from the internet in the form of videos, audios, statistics, etc. The teachers
                                    also
                                    have a massive platform to teach effectively and solve any conceptual doubts
                                    reasonably and practically.</p>
                              </div>
                           </div>
                        </div>


                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-15');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/smart-class.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5>Smart Class</h5>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </div>






                        <div class="slider1 div-description" id="dir-17" style="display: none;">
                           <div class="row">
                              <div class="close-btn" onclick="manage_close('dir-17');">
                                 <img src="assets/img/close-btn.png" class="img-fluid">
                              </div>
                              <div class="col-lg-12 text-center">
                                 <h3 class="sec-title-1 white-text"> Transport</h3>
                                 <p>The Acharyakulam operates a fleet of buses that ply on pre-determined routes
                                    throughout Ranchi. Naturally, we insist that you or someone you trust be there in
                                    person to drop off and pick up your child from the bus stop. Our buses are regularly
                                    inspected by Quality Controllers and each bus carries a staff member with an on-
                                    board Phone, and each buses have tracking system provided to parents.</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-6 npm">
                           <a href="javascript:;">
                              <div class="director-img" onclick="manage_display_of_description_div('dir-17');">
                                 <div class="facilities-item">
                                    <div class="post-image1">
                                       <img src="assets/img/facility/transport.webp" class="w-100">
                                       <div class="mask"></div>
                                    </div>
                                    <div class="post-content1">
                                       <h5> Transport</h5>
                                    </div>
                                 </div>
                           </a>
                        </div>
                     </div>

                     <div class="slider1 div-description" id="dir-18" style="display: none;">
                        <div class="row">
                           <div class="close-btn" onclick="manage_close('dir-18');">
                              <img src="assets/img/close-btn.png" class="img-fluid">
                           </div>
                           <div class="col-lg-12 text-center">
                              <h3 class="sec-title-1 white-text">Playground</h3>
                              <p>The school has two big playgrounds with much equipment to enhance the motor skill of
                                 students. All outdoor games such as cricket, volleyball, hockey, badminton etc. is
                                 practiced. In playground we also have swings, slides, climbers, spring riders,
                                 spinners, and
                                 seesaw for kids.
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 col-sm-3 col-6 npm">
                        <a href="javascript:;">
                           <div class="director-img" onclick="manage_display_of_description_div('dir-18');">
                              <div class="facilities-item">
                                 <div class="post-image1">
                                    <img src="assets/img/facility/palyground-img.webp" class="w-100">
                                    <div class="mask"></div>
                                 </div>
                                 <div class="post-content1">
                                    <h5>Playground</h5>
                                 </div>
                              </div>
                        </a>
                     </div>
                  </div>


                  <div class="slider1 div-description" id="dir-19" style="display: none;">
                     <div class="row">
                        <div class="close-btn" onclick="manage_close('dir-19');">
                           <img src="assets/img/close-btn.png" class="img-fluid">
                        </div>
                        <div class="col-lg-12 text-center">
                           <h3 class="sec-title-1 white-text">Green Acharyakulam</h3>
                           <p>The school has lush-green campus with varieties of decorative plants and medicinal
                              herbs. The orchids, meadows with variety of flowers are a visual treat and the fresh air
                              of the campus with scenic beauty provides tranquility and peace. For small kids there is
                              mini zoo containing ducks, fishes etc. The ‘greenness’ of a school finds expression in
                              various aspects of environment. There is a cow shed with number of cows as it is
                              considered sacred and students are taught about its piousness and cultural importance.
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-6 npm">
                     <a href="javascript:;">
                        <div class="director-img" onclick="manage_display_of_description_div('dir-19');">
                           <div class="facilities-item">
                              <div class="post-image1">
                                 <img src="assets/img/facility/green-achrykulam-img.webp" class="w-100">
                                 <div class="mask"></div>
                              </div>
                              <div class="post-content1">
                                 <h5>Green Acharyakulam</h5>
                              </div>
                           </div>
                     </a>
                  </div>
               </div>

               <div class="slider1 div-description" id="dir-20" style="display: none;">
                  <div class="row">
                     <div class="close-btn" onclick="manage_close('dir-20');">
                        <img src="assets/img/close-btn.png" class="img-fluid">
                     </div>
                     <div class="col-lg-12 text-center">
                        <h3 class="sec-title-1 white-text">Health & Care</h3>
                        <p>At The Acharyakulam, students undergo a thorough medical examination at the start of
                           each academic session and records are maintained and constantly updated. Parents are
                           informed if their children need treatment. Counseling for parents and children as well as
                           regular instruction on fitness, nutrition and first-aid is also provided. Medical camps are
                           organized, and check-ups done for oral, dental, Ophthalmology and general health of
                           children on an ongoing basis. The school has 2 sick rooms separately for boys and girls
                           with all medical facilities.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-6 npm">
                  <a href="javascript:;">
                     <div class="director-img" onclick="manage_display_of_description_div('dir-20');">
                        <div class="facilities-item">
                           <div class="post-image1">
                              <img src="assets/img/facility/health-care-img.webp" class="w-100">
                              <div class="mask"></div>
                           </div>
                           <div class="post-content1">
                              <h5>Health & Care</h5>
                           </div>
                        </div>
                  </a>
               </div>
            </div>
            <div class="slider1 div-description" id="dir-21" style="display: none;">
               <div class="row">
                  <div class="close-btn" onclick="manage_close('dir-21');">
                     <img src="assets/img/close-btn.png" class="img-fluid">
                  </div>
                  <div class="col-lg-12 text-center">
                     <h3 class="sec-title-1 white-text">Yagya & Hawan</h3>
                     <p>Keeping in with the VEDIC tradition students participate in Yagya and Havan done every
                        morning to enable them to be deeply rooted to their culture. It is a ritual worship
                        making offerings to the devas through the sacred fire (Agni). The students recite
                        mantras and follow the procedure of havan.
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 col-6 npm">
               <a href="javascript:;">
                  <div class="director-img" onclick="manage_display_of_description_div('dir-21');">
                     <div class="facilities-item">
                        <div class="post-image1">
                           <img src="assets/img/facility/yagye-hawan-img.webp" class="w-100">
                           <div class="mask"></div>
                        </div>
                        <div class="post-content1">
                           <h5>Yagya & Hawan</h5>
                        </div>
                     </div>
               </a>
            </div>
         </div>


         <div class="slider1 div-description" id="dir-22" style="display: none;">
            <div class="row">
               <div class="close-btn" onclick="manage_close('dir-22');">
                  <img src="assets/img/close-btn.png" class="img-fluid">
               </div>
               <div class="col-lg-12 text-center">
                  <h3 class="sec-title-1 white-text">House Activities</h3>
                  <p>To foster a sense of team spirit, group loyalty and healthy competition, the whole school is
                     divided into four houses named after the important components of human life.

                  </p>
                  <div class="row house-activity">

                     <div class="col-lg-3">
                        <img src="assets/img/facility/APAS.webp" class="w-100">
                        <p>APAS:The water element, truly said ‘water is life’. The blue colour symbolizes trust, wisdom,
                           faith and confidence.</p>
                     </div>
                     <div class="col-lg-3">
                        <img src="assets/img/facility/prithvi.webp" class="w-100">
                        <p>PRITHVI: Represented by green colour which stands for growth and prosperity.</p>
                     </div>
                     <div class="col-lg-3">
                        <img src="assets/img/facility/tejas.webp" class="w-100">
                        <p>TEJAS: The fire element represented by orange colour. The flag symbolizes energy, passion and
                           desire.</p>
                     </div>
                     <div class="col-lg-3">
                        <img src="assets/img/facility/vayu.webp" class="w-100">
                        <p>VAYU: Representing wind. The house flag being yellow stands for happiness, hope and
                           spontaneity.</p>
                     </div>
                  </div>
                  <p>The school organizes various Inter-House competitions to a build a healthy spirit of
                     competition & team spirit amongst students, Debates, Quizzes and sporting events
                     are organized all year round.</p>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-3 col-6 npm">
            <a href="javascript:;">
               <div class="director-img" onclick="manage_display_of_description_div('dir-22');">
                  <div class="facilities-item">
                     <div class="post-image1">
                        <img src="assets/img/facility/yagye-hawan-img.webp" class="w-100">
                        <div class="mask"></div>
                     </div>
                     <div class="post-content1">
                        <h5>House Activities</h5>
                     </div>
                  </div>
            </a>
         </div>
         </div>

         <div class="slider1 div-description" id="dir-23" style="display: none;">
            <div class="row">
               <div class="close-btn" onclick="manage_close('dir-23');">
                  <img src="assets/img/close-btn.png" class="img-fluid">
               </div>
               <div class="col-lg-12 text-center">
                  <h3 class="sec-title-1 white-text">Horse Riding</h3>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-3 col-6 npm">
            <a href="javascript:;">
               <div class="director-img" onclick="manage_display_of_description_div('dir-23');">
                  <div class="facilities-item">
                     <div class="post-image1">
                        <img src="assets/img/facility/horse-riding.webp" class="w-100">
                        <div class="mask"></div>
                     </div>
                     <div class="post-content1">
                        <h5>Horse Riding</h5>
                     </div>
                  </div>
            </a>
         </div>

         </div>
         </div>
         </div>
      </section>


      <script type="text/javascript" src="assets/js/facility.js"></script>


      <?php include_once("footer.php"); ?>



</body>

</html>