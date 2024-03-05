@extends('frontend.layouts.main')
@extends('container')
<body>
    <main id="main">
        <div class="banner">
            <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Gallery</h1>
                <h5>
                    <a href="index.php">Home</a> / <span>Gallery</span>
                </h5>
            </div>
        </div>

        <section class="craft">
            <div class="container mx-auto">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <a href="image-gallery-2022-2023.php">
                            <div class="gallery">
                                <img src="assets/img/gallery/10.jpg" class="img-fluid" alt="">
                                <h5>2022-2023</h5>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <a href="image-gallery-2023-2024.php">
                            <div class="gallery">
                                <img src="assets/img/gallery/4.webp" class="img-fluid" alt=""
                                    data-pagespeed-url-hash="1641828229"
                                    onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                <h5>2023-2024</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>


    </main>
</body>
@endsection