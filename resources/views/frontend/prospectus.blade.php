@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>ACHARYAKULAM PROSPECTUS</h1>
        <h5>
          <a href="index.php">Home</a> / <span>Admission</span>
        </h5>
      </div>
    </div>

    <section class="prospectus">
      <div class="container" data-aos="fade-up">
        <div class="col-md-12 text-center">
          <h4>Prospectus(2024-2025)</h4>
          <div class="prospectus-img">
            <img src="assets/img/prospects-img.jpg">
          </div>

          <div class="toper-pdf">
            <div class="eye">
              <a href="assets/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf"><img src="assets/img/eye.png"
                  alt=""></a>
              <a href="assets/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf" download="" target="blank"><img
                  src="assets/img/pdf.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

</body>
@endsection