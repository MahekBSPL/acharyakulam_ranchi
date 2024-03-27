@extends('frontend.layouts.main')
@section('container')

<body>

  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Message from Swami Ji</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Torch Bearers</span>
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
                <h2>Message from Swami Ji</h2>
                <ul>
                  <li>
                    <b>Yogarṣi Swami Ramdev ji</b> was born to Smt. Gulab Devi and Shri Ram Niwas in a village of
                    Haryana. He
                    had his early education in a village school. At the age of 14 he was admitted to the Gurukul at
                    Kalwa (near Jind, Haryana) where under the blessed tutelage of Acharya Shri Baldevji he studied
                    Sanskrit and Yoga, and earned a postgraduate (Acharya) degree with specialization in Sanskrit
                    Vyakaraṇa, Yoga, Darśana, Vedas and Upaniṣads, later he was very much inspired by the life and
                    writings of Maharṣi Dayanand and he thoroughly studied Satyartha Prakasa, Ṛgvedadibhaṣyabhumikā etc.
                    Along-side the magnetism of Maharṣi. Patanjali as an exponent of Yoga, Sanskrit Grammar and Ayurveda
                    continued to exert its influence on him.
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul>
              <li>Quite early in his life he had his goals cut out for him, so he chose the path of celibacy and
                asceticism. After doing a stint of teaching Yoga, Paṇini’s Aṣṭadhyayi and Patanjali’s Mahabhaṣya at
                Gurukuls, he set out on his journey to the Gangotri caves of lofty Himalayas, away from the distractions
                of mundane activities.</li>

              <h5>Through deep meditation and ascetic discipline and penance he was able to develop a clear vision of
                the work to be done by him:</h5>

              <li>Propagation of yoga and Ayurveda, and reforming the social, political and economic system of India.
                And then luckily he met with Acharya Balkrishna Ji, a kindred soul and a schoolmate, who was out there
                on a similar quest. They came together to launch upon this stupendous task from scratch.</li>
              <li>Swamiji took upon himself the onerous responsibility of demystifying and popularizing Patanjali’s
                Yoga, while Acharya ji devoted himself to the task of restoring people’s faith in the efficacy of
                ayurvedic system of medicine. Swamiji’s main focus is on making the people of India as well as of the
                whole world adopts yoga and Ayurveda as their lifestyle. His approach to treating ailments and disorders
                in pragmatic, undogmatic and non-sectarian. All persons whether Hindu, Muslim, Sikh or Christian, have
                the same anatomy and physiology. Therefore they can all benefit from yoga and auyrvedic therapy. He has
                explained in detail the benefits accruing from yoga in his two popular hindi books on the subject:</li>
              <p>1.Yoga Sadhana evam Yoga Chikitsa Rahasya</p>
              <p>2.Praṇayama Rahasya.</p>
              <li>In his yoga camps, attended by thousands of participants from all parts of the country, he emphasizes
                on doing eight Pranayamas<br>

                1.Bhastrika 2.Kapalabhati 3.Bahya / Agnisar 4.Ujjayi 5.Anulomaviloma 6.Bhramari 7.Udgitha 8.Praṇava

                Some ukṣma(light) vyayamas; and some specific asanas for various ailments, as also some simple home
                remedies and ayurvedic medicines. Within a short span of time the results of yoga and auyrvedic therapy
                have not only been encouraging but also astounding. People have taken to yoga in a big way; they are
                doing it under the guidance of yoga teachers trained and certified by Swamiji’s Patanjali Yogpeeth, and
                watching and following it on various Indian TV channels, like AASTHA, ZEETV, STAR, SAHARA etc. People
                are learning yoga from the CDs, DVDs, audio-video cassettes prepared by the yogpeeth, Swamiji has tried
                to explain the Yogasutras of Patanjali in simple Hindi in his book Yogadarsana.</li>
              <li>With a view to giving concrete shape to his dreams Swamiji, first of all, founded Divya Yog Mandir
                (Trust) in 1995 at Kankhal, Hardwar, Uttarakhand, India, which was followed by Meditation Centre at
                Gangotri in the Himalayas, Brahmakalpa Chikitsalaya, Divy Pharmacy, Divya Prakashan, Divya Yog Sadhana,
                Patanjali Yogpeeth (Trust) in Delhi in 2005, Patanjali Yogpeeth, Hardwar, Mahashaya Hiralal Arsh
                Gurukul, Kishangarh Ghaseda, Mahendragarh, Haryana, Yog Gram and recently Bharat Swabhiman (Trust) n
                Delhi.</li>
              <li>While yoga will take care of physical, mental and spiritual health, the downslide, in social,
                political and economic system of the country will be salvaged only through the patriotic zeal,
                fearlessness and strong character, of which he himself is a living example. Recently he has launched
                Bharat Swabhiman Movement which encompasses all the ground realities of the Indian social, political and
                economic scene. He has given a clarion call to the people to come forward and save the country and the
                democracy. He wants to see an addiction-free, vegetarian, corruption-free India, proud of its swadeshi
                products. His mind may be soaring in the ethereal spheres of spiritualism, but his feet are firmly
                planted on earth where he is very much alive to the mundane concerns such as treatment/ enrichment of
                soil, cow breeding/cow protection, cleaning the Ganga etc.</li>
            </ul>
          </div>

        </div>
      </div>
    </section>


    <script src="{{url('frontend/assets/js/main.js')}}"></script>

</body>
@endsection