@extends('frontend.layouts.main')
@section('container')
<body>

  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Message From chief Cordinator</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>About</span>
        </h5>
      </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{url('public/frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{url('public/frontend/assets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

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
@endsection