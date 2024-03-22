<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php"); ?>



<body>
    <main id="main">
        <div class="banner">
            <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
            <div class="banner-inr breadcrumbs">
                <h1>Republic Day</h1>
                <h5>
                    <a href="index.php">Home</a> / <span>Gallery</span>
                </h5>
            </div>
        </div>

        <div class="sport">
            <section class="craft">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <?php for ($i = 0; $i <= 68; $i++) { ?>
                            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                                <div class="portfolio-wrap">
                                    <img src="assets/img/gallery/2023-2024/republic-day/<?= $i ?>.jpg"
                                        class="img-fluid" alt="<?= $i ?>">
                                    <div class="portfolio-info">
                                        <div class="portfolio-links">
                                            <a href="assets/img/gallery/2023-2024/republic-day/<?= $i ?>.jpg"
                                                data-gallery="portfolioGallery" class="portfokio-lightbox" title=""><i
                                                    class="bi bi-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                </div>
            </section>
        </div>

    </main>

    <?php include_once("footer.php"); ?>

</body>

</html>