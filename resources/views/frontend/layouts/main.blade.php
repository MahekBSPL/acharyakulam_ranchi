<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Acharyakulam Ranchi</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('frontend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{url('frontend/assets/css/style.css?v=1')}}" rel="stylesheet">
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

        <a href="{{url('frontend/index')}}" class="logo d-flex align-items-center">
            <img src="{{url('frontend/assets/img/logo.png')}}" alt="">
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @foreach(getMenuData() as $menuparent)
                @if($menuparent->subMenu && $menuparent->subMenu->count() > 0)
                <li class="dropdown">
                    <a href="#">
                        <span>{{ $menuparent->title }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>

                    <ul>
                        @foreach($menuparent->subMenu as $subMenu)
                        <li>
                            @if($subMenu->menutype == 1)
                            @php
                            $staticPageUrl = getStaticPageUrl($subMenu->title);
                            @endphp
                            <a href="{{url('/frontend/'. $staticPageUrl) }}">{{ $subMenu->title }}</a>
                            @elseif($subMenu->menutype==2)
                            <a href="{{url('/admin/upload/menu/' . $subMenu->fileupload)}}" target="_blank">{{ $subMenu->title }}</a>
                            @elseif($subMenu->menutype==3)
                            <a href="{{url('/frontend/' .$subMenu->url)}}">{{ $subMenu->title }}</a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <li>
                    @if($menuparent->menutype == 1)
                    @php
                    $staticPageUrl = getStaticPageUrl($menuparent->title);
                    @endphp
                    <a href="{{ $staticPageUrl }}">{{ $menuparent->title }}</a>
                    @elseif($menuparent->menutype==2)
                    <a href="{{url('/admin/upload/menu/' . $menuparent->fileupload)}}" target="_blank">{{ $menuparent->title }}</a>
                    @elseif($menuparent->menutype==3)
                    <a href="{{url('/frontend/'. $menuparent->url)}}">{{ $menuparent->title }}</a>
                    @endif

                    <!-- <a href="{{url('frontend/assets/pdf/Oasis.pdf')}}" target="_blank">{{ $menuparent->title }}</a> -->
                </li>
                @endif
                @endforeach

                <!-- <li class="dropdown"><a href="#"><span>About Us</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>

                        <li><a href="{{url('frontend/introduction')}}">Why Acharyakulam</a></li>
                        <li><a href="{{url('frontend/mission-vision')}}">Mission & Vision</a></li>
                        <li><a href="{{url('frontend/staff')}}">Teacher's &amp; Office Staff</a></li>
                        <li><a href="{{url('frontend/message-from-swamiji')}}">A Message From Swami Ji</a></li>
                        <li><a href="{{url('frontend/message-from-acharyaji')}}">A Message From Acharya Ji</a></li>
                        <li><a href="{{url('frontend/message-from-the-principal')}}">Message From The Principal’s Desk</a></li>
                        <li><a href="{{url('frontend/message-from-chief')}}">Message From The Chief Coordinator's Desk</a></li>
                    </ul>
                </li> -->

                <!-- <li class="dropdown"><a href="#"><span>Torch Bearers</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{url('frontend/yogrishi-swami-ramdev-ji')}}">Yogrishi Swami Ramdev Ji</a></li>
                        <li><a href="{{url('frontend/acharya-balkrishna-ji')}}">Acharya Balkrishna Ji</a></li>
                    </ul>
                </li> -->

                <!-- <li class="dropdown"><a href="#"><span>Public Disclosure</span><i class="bi bi-chevron-down"></i></a> -->

                <!-- <li><a href="{{url('frontend/assets/pdf/Oasis.pdf')}}" target="_blank">Mandatory Disclosure</a></li> -->
                <!-- <li><a href="assets/pdf/2023/Oasis.pdf" target="_blank">Oasis</a></li> -->

                <!-- </li> -->

                <!-- <li class="dropdown"><a href="#"><span>Admission</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{url('frontend/procedure')}}">Admission Procedure</a></li>
                        <li><a href="{{url('frontend/assets/img/Admission-Pamphlet-2024-2025.jpeg')}}">Admission Pamphlet
                                2024-2025</a></li>
                        <li><a href="{{url('frontend/rules')}}">Rules &amp; Regulation</a></li>
                        <li><a href="{{url('frontend/prospectus')}}">Prospectus</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Academics</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{url('frontend/council')}}">Student Council</a></li>
                        <li><a href="{{url('frontend/topper-student')}}">Topper Student</a></li>
                        <li><a href="{{url('frontend/academics')}}">Academic Session</a></li>
                        <li><a href="{{url('frontend/competitive-exam')}}">Participation in Competitive Exams</a> </li>
                        <li><a href="{{url('frontend/yoga')}}">Participation In Yoga</a></li>


                    </ul>

                </li>

                <li class="dropdown"><a href="#"><span>Gallery</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{url('frontend/gallery')}}">Gallery Photos</a></li>
                        <li><a href="{{url('frontend/media')}}">Media Print</a></li>
                    </ul>
                </li>
                <li><a href="{{url('frontend/facility')}}">Facilities</a></li>


                <li class="dropdown"><a href="#"><span>Download</span> <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="{{url('frontend/assets/pdf/Prospectus-Acharyakulam-Ranchi-2024-2025.pdf')}}" target="_blank">Acharyakulam
                                Prospectus 2024-2025</a></li>
                        <li><a href="{{url('frontend/assets/pdf/School-Planner-2023-24.pdf')}}" target="_blank">School Planner 2023-24</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="{{url('frontend/circular')}}">Circular</a></li> -->
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
                    <!-- <li><a href="{{url('frontend/introduction')}}">Why Acharyakulam</a></li>
                    <li><a href="{{url('frontend/mission')}}">Our Mission</a></li>
                    <li><a href="{{url('frontend/rules')}}">Rules & Regulation </a></li>
                    <li><a href="{{url('frontend/media')}}">Media Print</a></li>
                    <li><a href="{{url('frontend/contact-us')}}">Contact Us</a></li>
                    <li><a href="{{url('frontend/Careers')}}">Careers</a></li> -->
                    @foreach(getFooterMenu() as $menuparent)
                    <li>
                        @if($menuparent->menutype == 2)
                        <a href="{{ url('/admin/upload/menu/' . $menuparent->fileupload) }}" target="_blank">{{ $menuparent->title }}</a>
                        @elseif($menuparent->menutype == 3)
                        <a href="{{ url('/frontend/' . $menuparent->url) }}">{{ $menuparent->title }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
                </li>
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
<script src="{{url('frontend/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{url('frontend/assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<!-- <script src="{{url('frontend/assets/vendor/php-email-form/validate.js')}}"></script> -->

<!-- Template Main JS File -->
<script src="{{url('frontend/assets/js/main.js')}}"></script>

</html>