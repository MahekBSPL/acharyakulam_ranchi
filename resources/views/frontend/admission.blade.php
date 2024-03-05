<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php"); ?>

<body>

  <main id="main">
    <div class="banner">
      <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Admission-Procedure</h1>
        <h5>
          <a href="index.php">Home</a> / <span>Torch Bearers</span>
        </h5>
      </div>
    </div>

    <section id="msg-swamiji" class="msg">
      <div class="container align-items-center justify-content-between" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-5 align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/admission.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7  d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Acharya Balkrishna Ji</h2>
              <ul>
                <li>
                  <b>Acharya Balkrishna,</b> a great scholar of Ayurveda, sanskrit language and grammar, and the Vedas,
                  was
                  born to Smt. Sumitra Devi and Shri Jay Vallabh.
                </li>

                <li class="mt-2">During his journey and austere penance in the Himalayas he was able to explore four
                  rare and
                  extinct aṣṭavarga plants used as ingredients in the preparation of cyavanaprāśa, an āyurvedic tonic.
                  He is also credited with discovering the sañjīvanī būtī of legendary fame. As the head of all the
                  medical institutions and chikitsalayas (Hospitals and clinics) functioning under the aegis of
                  Patañjali Yogpeeth he is mainly focused on the research and development of Āyurveda to make it
                  complete successfully with the modern medical science. He has been able to cure lacs of patients at
                  his Brahmakalpa Chikitsalaya of a number of stubborn, chronic and incurable diseases like diabetes,
                  rheumatism, osteo-arthritis, gout (rheumatism and arthritis), migraine, cervical spondylitis,
                  respiratory disorders, asthma, cancer, nervous disorder, heart disease, brain diseases, etc. Yoga
                  and Āyurveda have combined wonderfully in the treatment of these diseases at a very nominal/
                  affordable price.These successful treatments have been documented by Ācāryaji in his renowned book:
                  Yoga In Synergy With Medicial Science. Another very popular book written by him is Aushadh Darshan,
                  a handy pharmacopeia of ayurvedic and home remedies.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-12 align-items-center">
          <div id="hidden-content">
            <ul>
              <li>Acharya Balkrishna, a great scholar of Ayurveda, sanskrit language and grammar, and the Vedas, was
                born to Smt. Sumitra Devi and Shri Jay Vallabh.</li>
              <li>At the Department of Medical Science In Yoga & Āyurveda at Patañjali Yogpeeth, Hardwar, he has got a
                team of 70 physicians to assist him. Besides, more than a thousand vaidyas (āyurvedic physicians) in
                India and abroad are treating patients under his guidance. With a view to ensuring the efficacy of
                āyurvedic treatment it was necessary to make pure and high quality medicines available to patients at an
                affordable price.</li>
              <li>Acharyaji took up the challenge and founded Divya Pharmacy where Āyurvedic medicines with national and
                international certifications are manufactured with modern packaging. To ensure that only genuine
                ingredients are used in the Divya Pharmacy medicines, Patañjali Herbal Park grows 450 medicinal plants
                (some of them very rare) under the overall supervision of Ācāryaji. As a part of swamiji’s Bharat
                Svabhiman Movement’s emphasis on using swadeshi goods, things of daily use like tooth powder, tooth
                paste, hair oil, soap, shampoo, beauty creams etc. are produced in Divya Pharmacy & Patañjali Ayurved
                Ltd. with Āyurvedic ingredients and Āyurvedic formulas.</li>
              <li>Another aspect of his multi-faceted genius and personality is his knowledge and experience in the
                managerial, administrative and engineering fields, which has been admired by one and all in India and
                abroad. The awesomely impressive look and layout of Patañjali Yogpeeth buildings is a living testimony
                to his grand futuristic concepts.</li>
              <li>His editorial skills can be seen in Yog Sandesh where as Chief Editor he is propagating yoga and
                āyurveda for the mental, physical and spiritual health of people. All his activities are inspired by
                this dictum of Bhagavad Geeta:</li>
              <li><b>“kāmaye duḥkhataptānāṁ prāṇināmārtināśanam”.</b></li>
              <li>Besides, he has edited/ collaborated/ authored books like Āyurved :<b>Its Principles & Philosophies,
                  Secrets Of Indian Herbs, Vitality Strengthening Astavarga Plants, Vaidika Nityakarma Vidhi,
                  Yogadars´ana, Sant Darshan and Bhakti Gitanjali.</b></li>
              <li>By devoting himself to the service of humanity in many ways, round the clock, he has become a true
                <b>karmayogi</b>
              </li>
            </ul>
          </div>

          <div class="center-container">
            <button id="load-more-btn" onclick="loadMore()"><i id="icon" class="fas fa-angle-down"
                style="font-size:30px;color:#AE152D;"></i>
            </button>
          </div>
        </div>

      </div>

      </div>
    </section>

      <?php include_once("footer.php"); ?>


    <script>
      // Check if the state is stored in localStorage
      var isContentVisible = localStorage.getItem('isContentVisible') === 'true';
      var iconClass = isContentVisible ? 'fa fa-angle-up' : 'fa fa-angle-down';

      // Set initial icon class
      document.getElementById('icon').className = iconClass;

      // Set initial content visibility
      document.getElementById('hidden-content').style.display = isContentVisible ? 'block' : 'none';

      // JavaScript function to handle "Load More" button click
      function loadMore() {
        var hiddenContent = document.getElementById('hidden-content');
        var icon = document.getElementById('icon');

        // Toggle the display of the hidden content
        if (hiddenContent.style.display === 'none') {
          hiddenContent.style.display = 'block';
          icon.className = 'fa fa-angle-up'; // Change to the "up" arrow icon
          localStorage.setItem('isContentVisible', 'true'); // Store the state
        } else {
          hiddenContent.style.display = 'none';
          icon.className = 'fa fa-angle-down'; // Change back to the "down" arrow icon
          localStorage.setItem('isContentVisible', 'false'); // Store the state
        }
      }
    </script>
</body>

</html>