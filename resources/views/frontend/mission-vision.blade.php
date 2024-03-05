@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Mission & Vision</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>About</span>
        </h5>
      </div>
    </div>

    <section>
      <div class="container" data-aos="fade-up">
        <h2>Mission</h2>
        <p>To groom fully awakened and fully competent souls who will build an awakened, enlightened, developed, family
          who in re-turn will enhance the physical, mental, intellectual, spiritual, social, economical, political and
          scientific society that will enrich the nation and then the world.</p>
      </div>
    </section>

    <section class="mission">
      <div class="mission container pb-5" data-aos="fade-up">
        <div class="heading pb-4 ">
          <h2>Objectives Of Acharyakulam</h2>
        </div>
        <div class="row">
          <div class="groom-img col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{url('frontend/img/4.png')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="mask-content">
              <p>
                To groom up Vaidic scholars- To prepare proven scholars in Grammar, Philosophy, Upnishad, Veda, Vaidic
                literature, Vaidic Mathematics, Indian proven history and Raj Dharma etc. and to prepare graduates with
                the power to give socially, spiritually, economically, scientifically and politically ideal leadership.
              </p>
            </div>
          </div>

        </div>
        <div class="row pt-2 align-items-center">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="mask1-content">
              <p>
                To prepare leaders of modern Bharata- To prepare intellectuals and national leaders who can set new
                landmarks in different fields like. Technology, Management, Defence, Administrative Services, Police
                Services, Medicine, Engineering, Games and Sports, Fine Arts, Music, Drama, Agriculture, Industry,
                Research, etc.
              </p>
            </div>
          </div>
          <div class="leader col-lg-6" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{url('frontend/img/5.png')}}" class="img-fluid" alt="">
          </div>

        </div>
      </div>

      <div class="objective col-lg-12" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
          <div class="content">
            <p>
              We will be instilling in the young minds the glory, utility and attraction of both the expectations. Then
              a child will get prepared according to his/her Karmashaya, Sanskar and
              Swabhava. Param Pujya Swamiji believes that the possibility of reformation in a child decreases by one
              percent with every passing year of age. And generally from every aspect, a
              child becomes enlightened by one percent every year. But with the help of intellectual efforts we can
              develop this enlightenment physically, intelectually and spiritually by ane to
              ten percent.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="knowledge">
      <div class="container">
        <div class="row align-items-center">
          <div class="mission-img col-lg-6 col-md-6 col-sm-12" data-aos="zoom-out" data-aos-delay="200">
            <div class="mask">
              <img src="{{url('frontend/img/6.png')}}" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mission-content" data-aos="fade-up" data-aos-delay="200">
            <h2>knowledge Aspect</h2>
            <p>To enhance intellectual development of a child is our primary goal.</p>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="behaviour">
        <div class="container">
          <div class="row align-items-center">
            <h2>Behaviour Aspect</h2>
            <p>To ensure that a child remains 100% free from prominent behavioural vices. And
              being aware of the latent vices, he/she endeavours with full determination and
              honesty to get rid of the same so that we can take pride in saying, "We at
              Acharyakulam are following the path of our ancestors. All Acharyas and scholars are
              expected to have the attitude and values as expected from ideal angels, children of
              Rishi-Rishikas, Veer-Veeranganas and the greatest children of Bharatmata. We should
              have a strong morale against unethical conduct.
            <div class="col-lg-6 col-md-6 col-sm-12 mission-content" data-aos="fade-up" data-aos-delay="200">
              We should have the same hatred
              against the latent vices like desire, despair, insistence, impulse, reaction, etc. as we
              have against prominent vices like non-vegetarian diet, malpractices, depravity,
              violence, addiction, etc. We should not welcome any unethical conduct, though it is
              true that, our Sanskaras and Karmashaya instilled in our soul from previous lives and
              our attitude and nature of the present life will stand as the biggest challenges in front
              of us. However, with awakened conscience, firm determination and enthusiasm and
              with practice of yoga, devotion and such other methods we can overcome such
              difficulties and make our evil sanskaras ineffective.</p>
            </div>
            <div class="mission-img col-lg-6 col-md-6 col-sm-12" data-aos="zoom-out" data-aos-delay="200">
              <div class="mask-2">
                <img src="{{url('frontend/img/7.png')}}" class="img-fluid" alt="">
              </div>
            </div>

          </div>
        </div>
    </section>




    <section class="mission">
      <div class="mission container pb-5" data-aos="fade-up">
          <h2>Vision</h2>
        <div class="row">
       
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
             <ol>
                 <li>To prepare Vaidic scholars in Grammar, Veda, Philosophy and Dharma with power to lead socially, spiritually, politically and economically.</li>
 <li>To prepare leaders and intellectuals of modern India who can set new benchmarks in various fields.</li>
 <li>To instil in young minds the utility of both traditional and contemporary education and to prepare them according to their respective Karmashaya, Sanskar and Swabhav.</li>
 <li>To enlighten the child physically, intellectually and spiritually.  </li>
             </ol>
          </div>

        </div>
    
        </div>
      </div>

    </section>
</body>

@endsection