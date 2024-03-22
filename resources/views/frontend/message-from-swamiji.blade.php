@extends('frontend.layouts.main')
@section('container')
<body>

  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>A Message from Swami Ji</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>About Us</span>
        </h5>
      </div>
    </div>

    <section class="msg-swamiji">
      <div class="container" data-aos="fade-up">
        <div class="approach">
          <div class="row align-items-center">
            <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{url('frontend/assets/img/swamiji.png')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7  d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h2>A Message from Swami Ji</h2>
                <ul>
                  <li>
                    <b>India has been one of the leading countries in the world in knowledge, wisdom, literature, music,
                      art and culture from the very beginning.</b> Philosophers and travellers from every corner of the
                    globe visited India from time to time to gain knowledge of its religion, philosophy, literature,
                    medicine, astronomy, astrology, and mathematics from the sacred books. They accepted India as a
                    Spiritual Guru and a Torchbearer.
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul>
              <li>Till the 18th century, India had been at the pinnacle in educational, economic, social and spiritual
                fields. Our contribution to the world market was 37% during the 18th century, and our income was 27% of
                the total world income. The literacy rate in the country was 97%. According to the famous German scholar
                Max Muller, English scholar G.W. Leitner and the then British Government, the number of primary and
                secondary Gurukuls was 7 lakh 32 thousand. There were 14 thousand centres of higher education that
                taught at least 18 subjects ranging from Mathematics, Astronomy, Astrophysics, Physics, Chemistry,
                Geology, Metallurgy, to Philosophy, Surgery and Medical Science, Technology and Management. The British
                rulers, having the hidden agenda of keeping us enslaved for centuries, tried to ruin our rich and
                prestigious tradition of wisdom by destroying our whole educational system.</li>
              <li>Today, there are about 750 universities, 37 thousand colleges and about 15 lakh schools in the
                country. Many institutes of science, management and technology exist in the country, but we are not able
                to inculcate our tradition and culture amongst the students. We want to make our culture, sanskaras,
                history, yoga, meditation and good values a part of today's education system. We wish to Indianise the
                current education system. By awakening the hidden great self and by developing the holistic personality
                of the student we want to groom him/her to become the most successful, greatest, fully awakened, an
                able, industrious and ideal human being.</li>

              <li>Through the University of Patanjali and Acharyakulam, we want to set an example by developing such a
                tradition of Vaidic Rishi Sanskriti and Gurukuliya Parampara that after Deekshant, Graduates of our
                institute will not be roaming in search of a job at the mercy of others. They will be the job creators,
                self-dependent and provider of good health to others.</li>

              <li>We want to build up such a foundation of sanskaras in the children of Acharyakulam that, be it the
                University of Patanjali or any other institute in the world, wherever they go they will not be
                influenced by the sensual materialism of the West. We want to prepare such enlightened and conscious
                scholars who will be able to change the course of flow of the current times.</li>
            </ul>
          </div>
          <div class="text" style="float:right;">
            <h6>– Swami Ramdevji</h6>
          </div>

        </div>
      </div>
    </section>

    <script src="{{url('frontend/assets/js/main.js')}}"></script>

</body>
@endsection