<!DOCTYPE html>
<html lang="en">

<head>
  @include("../admin.themes.includes.head")
</head>

<body>
  <main id="main" class="internal-slide">
    <!-- ======= About Section ======= -->
    <!-- <section class="internal-banner">
            <img src="{{ URL::asset('/public/themes/assets/img/internal-banner-img.webp')}}" class="img-fluid" alt="">
    </section> -->

    <section class="about-us">
      @yield('content')
    </section>
  </main>
</body>
</html>