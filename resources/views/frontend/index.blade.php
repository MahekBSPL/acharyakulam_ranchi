@extends('frontend.layouts.main')
@section('container')

<body>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Greetings to All: </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?=$popup_data->description?>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero align-items-center">
    <div class="swiper heroSwiper">
      <div class="text">
        <!-- <img src="assets/img/banner-img.png" alt=""> -->
        <!-- <h1>आचार्यकुलम्<br>रांची</h1> -->
      </div>
      <div class="swiper-wrapper align-items-center">
        @foreach ($sliders as $slider)
        @if(!empty($slider->url))
        <div class="swiper-slide"><a href="{{$slider->url}}" img src="{{ URL::asset('admin/upload/slider/' . $slider->image)}}" class="img-fluid" alt=""></a></div>
        <!-- <div class="swiper-slide"><img src="{{url('frontend/assets/img/Group 1594.jpg')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{url('frontend/assets/img/banner.jpg')}}" class="img-fluid" alt=""></div>
        <div class="swiper-slide"><img src="{{url('frontend/assets/img/banner-2.jpg')}}" class="img-fluid" alt=""></div> -->
        @else
        <div class="swiper-slide"><img src="{{ URL::asset('admin/upload/slider/' . $slider->image)}}" class="img-fluid" alt=""></div>
        @endif
        @endforeach
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

    <div class="important-notice">
      <h5>Important Notice</h5>
      <div class="news-update">
        @foreach ($notifications as $notification)
        @if ($notification->notificationtype == 1)
        @if ($notification->menutype == 1)
        <h6><img src="{{url('frontend/assets/img/new.gif')}}">
          <a href="{{url('/admin/upload/notification/' . $notification->image) }}" target="_blank">
            {{ $notification->title }}</a>
        </h6>
        @elseif ($notification->menutype == 2)
        <h6><img src="{{url('frontend/assets/img/new.gif')}}">
          <a href="{{url('/admin/upload/notification/' . $notification->fileupload) }}">
            {{ $notification->title }}</a>
        </h6>
        @elseif ($notification->menutype == 3)
        <h6><img src="{{url('frontend/assets/img/new.gif')}}">
          <a href="{{url('/frontend/' . $notification->url)}}">
            {{ $notification->title }} </a>
        </h6>
        @endif
        @endif
        @endforeach
        <!-- <h6><img src="{{url('frontend/assets/img/new.gif')}}">
          <a href="{{url('frontend/assets/pdf/Admission-procedure-2024-2025.pdf')}}" target="_blank">
            Admission Open for Class Nursery to VIII Session 2024-2025</a>
        </h6>
        <h6><img src="{{url('frontend/assets/img/new.gif')}}">
          <a href="{{url('frontend/Careers')}}">
            Vacancies</a>
        </h6> -->
      </div>
  </section>
  <!-- End Hero -->
  <div class="latest-news">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="news-info">
        <div class="label">Latest News</div>
        <marquee>
          <ul class="headlines">
            @foreach ($notifications as $notification)
            @if ($notification->notificationtype == 2)
            @if ($notification->menutype == 1)
            <li><a href="{{url('/admin/upload/notification/' . $notification->image) }}">
                {{$notification->title }}</a></li> 
            @elseif ($notification->menutype == 2)
            <li><a href="{{url('/admin/upload/notification/' . $notification->fileupload) }}">
                {{$notification->title }}</a></li> 
            @elseif ($notification->menutype == 3)
            <li><a href="{{url('/frontend/' . $notification->url) }}">
                {{$notification->title }}</a></li> 
            @endif
            @endif
            @endforeach

            <!-- <li><a href="{{url('frontend/assets/pdf/Admission-procedure-2024-2025.pdf')}}" target="_blank"> Admission Open for Class Nursery
                to VIII Session 2024-2025</a></li>
            <li><a href="{{url('frontend/Careers')}}">
                Vacancies</a></li> -->

          </ul>
        </marquee>
      </div>
    </div>
  </div>

  <main id="main">
    <!-- ======= About Section ======= -->
    <section class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Why Acharyakulam</h2>
              <p>
                Under the spiritual and divine guidance of Param Pujya Yogrishii Swami Ramdev Ji and Param Shraddhey
                acharya Balkrishna ji, Acharyakulam nurtures its students in the divine and spiritual vicinity along
                with ultra-modern education. We, at Acharyakulam aim at preparing fully awakened and conscious
                scholars,
                who will be prepared through the confluence of wisdom and ultra-modern scientific knowledge.
              </p>
              <div class="text-center text-lg-start">
                <a href="{{url('frontend/introduction')}}" class="btn-read-more d-inline-flex align-items-center justify-content-center">
                  <span>READ MORE</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="about-image col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <!-- <img src="assets/img/acharyaji.jpg" class="img-fluid" alt=""> -->
            <!-- <div id="mask1"> -->
            <img src="{{url('frontend/assets/img/acharya-ji.webp')}}" class="img-fluid" alt="">
            <!-- </div> -->
          </div>

        </div>
      </div>
    </section><!-- End About Section -->

    <!-- Goal Section -->
    <section class="goal">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="goal-img col-lg-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{url('frontend/assets/img/baba.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7 goal-content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Our Goal</h2>
              <p>
                The importance of being a parent, we want to build up such a foundation of sanskaras in the children of
                Acharyakulam that, be it the University of Patanjali or any other institute in the world, wherever they
                go,
                they will not be influenced by the sensual materialism of the West. Rather, we want to prepare such
                fully
                awakened and conscious scholars who will be able to change the course of the flow of the current times.
              </p>
              <div class="text-center text-lg-start">
                <a href="{{url('frontend/introduction')}}" class="btn-read-more d-inline-flex align-items-center justify-content-center">
                  <span>READ MORE</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="message">
      <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-lg-6 swamiji">
                  <img src="{{url('frontend/assets/img/msg-from-swami-ji.webp')}}" class="d-block w-100" alt="...">
                </div>

                <div class="msg-swamiji col-lg-6">
                  <h2>Message from Swami Ji</h2>
                  <p><b>India has been one of the leading countries in the world in knowledge, wisdom, literature,
                      music, art and culture from the very beginning.</b> Philosophers and travellers from every corner
                    of the globe visited India from time to time to gain knowledge of its religion, philosophy,
                    literature, medicine, astronomy, astrology, and mathematics from the sacred books. They accepted
                    India as a Spiritual Guru and a Torchbearer.</p>
                  <p>Till the 18th century, India had been at the pinnacle in educational, economic, social and
                    spiritual fields. Our contribution to the world market was 37% during the 18th century, and our
                    income was 27% of the total world income. The literacy rate in the country was 97%. According to the
                    famous German scholar Max Muller, English scholar G.W. Leitner and the then British Government,</p>

                  <div class="text-center text-lg-start">
                    <a href="{{url('frontend/message-from-swamiji')}}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>READ MORE</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-lg-6">
                  <img src="{{url('frontend/assets/img/msg-from-acharyaji.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="msg-swamiji col-lg-6">
                  <h2>Message from Acharyaji Ji</h2>
                  <p>Children are the future of any nation. They are at the centre of the dreams and aspirations of the
                    parents. Parents wish to see their children achieve great heights. They aspire to give their
                    children the best of education and the best of values. The ancient Vaidic Education system of India
                    was the best divine combination of instruction and values. 'Acharyakulam' is the confluence of
                    former Vaidic learning and the best of present-day education. We wish to groom up leaders with high
                    moral values along with the best of current knowledge through Acharyakulam.</p>
                  <p>In earlier times, the leaders of our nation used to be nurtured in the Gurukuls. The pupils used to
                    study the Veda-Vedangas along with the art of defence, economics & virtues. They thereby used to
                    gain the ability of critical thinking of right and wrong.
                  </p>
                  <div class="text-center text-lg-start">
                    <a href="{{url('frontend/message-from-acharyaji')}}" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>READ MORE</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <section class="gallery">
      <div class="container-fluid">
        <div class="gallery-wrap">

         
        <?php
foreach($home_gallery as $h_gallery)
{
?>
          <div class="tile-wrapper">
            <div class="image-container">
              <div class="event">
                <img src="{{URL::asset('admin/upload/homegallery/'.$h_gallery->image)}}" class="img-fluid" alt="">
              </div>
              <div class="overlay">
                <div class="img-btn">
                  <h5 style="padding-left:2.2rem"><?=$h_gallery->title?></h5>
                  <p><a href="<?=$h_gallery->url?>">CLICK HERE</a></p>
                </div>
              </div>
            </div>
          </div>
<?php }?>
        </div>
      </div>
    </section>

    <script>
      // Show the modal when the page is loaded
      window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
          keyboard: false
        });
        myModal.show();
      };
    </script>

</body>
@endsection