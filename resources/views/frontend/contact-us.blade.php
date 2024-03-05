<!DOCTYPE html>
<html lang="en">
<?php include_once("header.php"); ?>

<!-- jqery validate cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>

<body>

    <div class="banner">
        <img src="assets/img/Mask Group 108.jpg" class="img-fluid" alt="banner">
        <div class="banner-inr breadcrumbs">
            <h1>Contact Us</h1>
            <h5>
                <a href="index.php">Home</a> / <span>Contact Us</span>
            </h5>
        </div>
    </div>

    <main id="main">
        <!-- ======= About Section ======= -->

        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>Namkum, Near Police Station,
                                        Ranchi, India, Jharkhand</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+91-6287842467</p>
                                    <p>+91-6287842461</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>officeacharyakulamranchi@gmail.com, enquiryacharyakulamranchi@gmail.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Open Hours</h3>
                                    <p>Monday - Saturday<br />9:00 AM - 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form id="contact-form" class="php-email-form" method="POST">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" id="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <button type="submit" id="submit-button" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include_once("footer.php"); ?>
    <!-- End Footer -->


    <!-- ========== json script ========== -->
    <script>
        $('#contact-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                },
                subject: "required",
                // message:"required"

            },
            messages: {
                name: {
                    required: "Please enter your name",
                },
                email: {
                    required: "Please enter email id",
                    email: "Please enter valid email id",
                },
                phone: {
                    required: "Please enter your phone",
                    number: "Please enter valid digit number"
                },
                subject: "Please enter your subject",
                // message:"Please enter your message",
            },


            submitHandler: function(form, e) {
                e.preventDefault();
                var nameAdd = $("#name").val();
                var emailAdd = $("#email").val();
                var phoneAdd = $("#phone").val();
                var subjectAdd = $("#subject").val();
                var messageAdd = $("#message").val();

                $.ajax({
                    url: '/form_handler/savedata.php',
                    type: 'POST',
                    data: {
                        namesend: nameAdd,
                        emailsend: emailAdd,
                        phonesend: phoneAdd,
                        subjectsend: subjectAdd,
                        messagesend: messageAdd,
                    },
                    success: function(res) {
                        alert(res);
                    }
                });
            }
        });
    </script>
</body>

</html>