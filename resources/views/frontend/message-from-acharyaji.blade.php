

@extends('frontend.layouts.main')

@section('container')
<body>

  <main id="main">
    <div class="banner">
      <img src="{{ url('frontend/assets/img/Mask Group 108.jpg') }}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>A Message from Acharya Ji</h1>
        <h5>
          <a href="{{ url('frontend/index') }}">Home</a> / <span>About Us</span>
        </h5>
      </div>
    </div>

    <section class="msg-swamiji">
      <div class="container" data-aos="fade-up">
        <div class="approach">
          <div class="row align-items-center">
            <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{ url('frontend/assets/img/acharyaji.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7  d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h2>A Message from Acharya Ji</h2>
                <ul>
                  <li>
                    Children are the future of any nation. They are at the centre of the dreams and aspirations of
                    the parents. Parents wish to see their children achieve great heights. They aspire to give their
                    children the best of education and the best of values. The ancient Vaidic Education system of
                    India was the best divine combination of instruction and values. 'Acharyakulam' is the confluence
                    of former Vaidic learning and the best of present-day education. We wish to groom up leaders with
                    high moral values along with the best of current knowledge through Acharyakulam.
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul>
              <li>In earlier times, the leaders of our nation used to be nurtured in the Gurukuls. The pupils used to
                study the Veda-Vedangas along with the art of defence, economics & virtues. They thereby used to gain
                the ability of critical thinking of right and wrong. Honest, austere and self-disciplined people held
                the supreme place amongst individuals, family, society and the Nation. Unfortunately, today's leaders
                are being groomed in Convent Schools and foreign institutions like Oxford, Cambridge, Harvard and
                Massachusetts. Unfortunately, in today's experts, leaders & intelligentsia, feelings and values of
                spirituality, Bhartiyata (Indianness) and self-esteem are withering on the vine. We have to prepare
                social, cultural, spiritual, economic, industrial, political, scientific & intellectual leadership
                through Acharyakulam and other erudite programmes. We will groom up such leadership tinged with
                spirituality, Bharatiyata and self-esteem who will be the amalgamation of modernization and Bharatiya.
              </li>
              <li>Acharyakulam shall play a pivotal role in nurturing superior and fully awakened citizens.</li>

              <li> heartily wish all the Children, Parents and Guardians a successful, prosperous and pious life ahead.
              </li>
            </ul>
          </div>
          <div class="text" style="float:right;">
            <h6>– Acharya Balkrishnaji</h6>
          </div>

        </div>
      </div>
    </section>

    <script src="{{ url('frontend/assets/js/main.js') }}"></script>
</body>
@endsection
