<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Acharyakulam Ranchi</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('frontend/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('frontend/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{url('frontend/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{url('frontend/css/style.css?v=1')}}" rel="stylesheet">
</head>

<div class="top-header">
    <div class="container">
        <div class="top-headleft"><b><i class="fa fa-envelope" aria-hidden="true"></i></a>
            </b><span><a href="mailto:officeacharyakulamranchi@gmail.com">officeacharyakulamranchi@gmail.com,</a>
                <a href="mailto:enquiryacharyakulamranchi@gmail.com">enquiryacharyakulamranchi@gmail.com</a></span></div>
        <div class="top-headrgt">
            <i class="fa fa-phone" aria-hidden="true"></i></a><span><a href="tel:+91-6287842467">+91-6287842467,</a>
                <a href="tel:+91-6287842461">+91-6287842461</a></span>
        </div>
    </div>
</div>
<!-- ======= Header ======= -->
<header id="header" class="header sticky-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center">
            <img src="{{url('frontend/img/logo.png')}}" alt="">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <li><a href="introduction.blade.php">Why Acharyakulam</a></li>
                        <li><a href="mission-vision.blade.php">Mission & Vision</a></li>
                        <li><a href="staff.blade.php">Teacher's &amp; Office Staff</a></li>
                        <li><a href="message-from-swamiji.blade.php">A Message From Swami Ji</a></li>
                        <li><a href="message-from-acharyaji.blade.php">A Message From Acharya Ji</a></li>
                        <li><a href="message-from-the-principal.blade.php">Message From The Principal’s Desk</a></li>
                        <li><a href="message-from-chief.blade.php">Message From The Chief Coordinator's Desk</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#"><span>Torch Bearers</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="yogrishi-swami-ramdev-ji.blade.php">Yogrishi Swami Ramdev Ji</a></li>
                        <li><a href="acharya-balkrishna-ji.blade.php">Acharya Balkrishna Ji</a></li>
                    </ul>
                </li>

                <!-- <li class="dropdown"><a href="#"><span>Public Disclosure</span><i class="bi bi-chevron-down"></i></a> -->

                <li><a href="{{url('frontend/pdf/Oasis.pdf')}}" target="_blank">Mandatory Disclosure</a></li>
                <!-- <li><a href="assets/pdf/2023/Oasis.pdf" target="_blank">Oasis</a></li> -->

                <!-- </li> -->

                <li class="dropdown"><a href="#"><span>Admission</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="procedure.blade.php">Admission Procedure</a></li>
                        <li><a href="{{url('frontend/img/Admission-Pamphlet-2024-2025.jpeg')}}">Admission Pamphlet
                                2024-2025</a></li>
                        <li><a href="rules.blade.php">Rules &amp; Regulation</a></li>
                        <li><a href="prospectus.blade.php">Prospectus</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Academics</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="council.blade.php">Student Council</a></li>
                        <li><a href="topper-student.blade.php">Topper Student</a></li>
                        <li><a href="academics.blade.php">Academic Session</a></li>
                        <li><a href="competitive-exam.blade.php">Participation in Competitive Exams</a> </li>
                        <li><a href="yoga.blade.php">Participation In Yoga</a></li>


                    </ul>

                </li>

                <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="gallery.blade.php">Gallery Photos</a></li>
                        <li><a href="media.blade.php">Media Print</a></li>
                    </ul>
                </li>
                <li><a href="facility.blade.php">Facilities</a></li>


                <li class="dropdown"><a href="#"><span>Download</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{url('frontend/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf')}}" target="_blank">Acharyakulam
                                Prospectus 2024-2025</a></li>
                        <li><a href="{{url('frontend/pdf/School-Planner-2023-24.pdf')}}" target="_blank">School Planner 2023-24</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="circular.blade.php">Circular</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

@yield('container')

<!-- ======= Footer ======= -->

<footer id="footer" class="footer">
    <div class="container">


        <div class="row">
            <div class="col-lg-4">
                <h4>Acharyakulam Ranchi</h4>
                <p>Acharyakulam is an Educational Institution which blends Vedic Wisdom with Modern Education.</p>
                <div class="credits">
                    <div class="footer-down">Follow Us
                        <a href="#" class="linkedin"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.facebook.com/acharyakulamrnc/" class="facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-content col-lg-4">
                <h4>About</h4>
                <ul>
                    <li><a href="introduction.blade.php">Why Acharyakulam</a></li>
                    <li><a href="mission.blade.php">Our Mission</a></li>
                    <li><a href="rules.blade.php">Rules & Regulation </a></li>
                    <li><a href="media.blade.php">Media Print</a></li>
                    <li><a href="contact-us.blade.php">Contact Us</a></li>
                    <li><a href="Careers.blade.php">Careers</a></li>
                </ul>
            </div>

            <div class="address col-lg-4">
                <h4 class="px-1">Address</h4>
                <ul>
                    <li><i class="fa fa-map-marker pt-2" aria-hidden="true"></i>Namkum, Near Police Station, <br />
                        Ranchi, India, Jharkhand</li>
                    </li>
                    <li> <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:officeacharyakulamranchi@gmail.com">officeacharyakulamranchi@gmail.com,</a><br />
                        <a href="mailto:enquiryacharyakulamranchi@gmail.com">enquiryacharyakulamranchi@gmail.com</a>
                    </li>
                    <li>

                        <i class="fa fa-phone" aria-hidden="true"></i><span><a href="tel:+91-6287842467">+91-6287842467,
                            </a>
                            <a href="tel:+91-6287842461">+91-6287842461</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <div class="copyright">
        Copyright &copy; 2024 Acharyakulam Ranchi
    </div>
</footer><!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{url('frontend/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{url('frontend/vendor/aos/aos.js"></script>
<script src="{{url('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('frontend/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('frontend/js/main.js')}}"></script>

</html>