@extends('frontend.layouts.main')
@section('container')

<?php 

//   include 'db.php';

// include 'header.php';

//   //include('smtp/PHPMailerAutoload.php');

//    use PHPMailer\PHPMailer\PHPMailer;



// require_once 'phpmailer/Exception.php';

// require_once 'phpmailer/PHPMailer.php';

// require_once 'phpmailer/SMTP.php';





  

//   $alert = '';

//    if(isset($_POST["send"])){

//    $mail = new PHPMailer(true);

//     $name=mysqli_real_escape_string($conn,$_POST['name']); 

//      $postion=mysqli_real_escape_string($conn,$_POST['postion']); 

//      $experience =mysqli_real_escape_string($conn,$_POST['experience']); 

//     $msg=mysqli_real_escape_string($conn,$_POST['msg']); 

//      $experience =mysqli_real_escape_string($conn,$_POST['experience']); 

//       $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);

//     $width = $fileinfo[0];

//     $height = $fileinfo[1];

    

//     $allowed_image_extension = array(

//         "pdf"

        

//     );

    

//     // Get image file extension

//     $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

    

//     // Validate file input to check if is not empty

//     if (! file_exists($_FILES["image"]["tmp_name"])) {

//         $response = array(

//             "type" => "error",

//             "message" => "Choose image file to upload."

//         );

//     }    // Validate file input to check if is with valid extension

//     else if (! in_array($file_extension, $allowed_image_extension)) {

//         $response = array(

//             "type" => "error",

//             "message" => "Upload valiid images. Only PNG and JPEG are allowed."

//         );

//         echo $result;

//     }    // Validate image file size

//     else if (($_FILES["image"]["size"] > 1000000)) {

//         $response = array(

//             "type" => "error",

//             "message" => "Pdf size exceeds 1MB"

//         );

//     }    // Validate image file dimension

//     else {

//         $target = "cv/" . basename($_FILES["image"]["name"]);

//         move_uploaded_file($_FILES["image"]["tmp_name"], $target);

//       $mysql=mysqli_query($conn,"INSERT INTO `tbl_career`(`name`, `postion`, `experience`, `msg`, `file`) VALUES ('$name','$postion','$experience','$msg','".$target."')");

      

//    //   echo "INSERT INTO `tbl_career`(`name`, `postion`, `experience`, `msg`, `file`) VALUES ('$name','$postion','$experience','$msg','".$target."')";

//     }

//      if($mysql){

//      // $mail->SMTPDebug = 3;

   

//      $mail->isSMTP();

     

//   //   $mail->SMTPDebug = 3;

//     $mail->Host = "localhost";

//    // $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted

//     $mail->Port = 25;  

// //	$mail->SMTPAutoTLS = false;

// 	$mail->SMTPAuth = false;

// $mail->SMTPAutoTLS = false;

//   $mail->Username = 'helpdesk@acharyakulamranchi.com'; // Gmail address which you want to use as SMTP server

//    $mail->Password = 'adminranchi01'; // Gmail address Password

//       $mail->setFrom('helpdesk@acharyakulamranchi.com','HelpDesk'); // Gmail address which you used as SMTP server

//       $mail->addAddress('helpdesk@acharyakulamranchi.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

  

//       $mail->isHTML(true);

//       $mail->Subject = 'Message Received (Careers Page)';

//       $mail->Body = "<h3>Name : $name <br>Position: $postion <br>Experience : $experience <br>Message : $msg</h3>";

//         $attachment = $target;

//         $mail->AddAttachment($attachment , 'Resume.pdf');

//       $mail->SMTPOptions=array('ssl'=>array(

// 		'verify_peer'=>false,

// 		'verify_peer_name'=>false,

// 		'allow_self_signed'=>false

// 	));

//       $mail->send();

//       echo'<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

    

//           echo '<script language="javascript">';

    

//     echo 'swal({

    

//       title: "THANKS!",

    

//       text: "Successfully Submitted!",

    

//       icon: "success",

    

//       button: "ok!",

    

//     });';

    

//     echo '</script>';

    

//           }else{

//   echo'<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

//         echo '<script language="javascript">';

//           echo 'swal({

  

//     title: "Wrong!",

  

//     text: "Something Wrong!",

  

//     icon: "error",

  

//     button: "ok!",

  

//   });';

  

//   echo '</script>';

  

//         }

//    }

  ?>

<style>
ol li {

    list-style: decimal;
}
ol {
    padding-left:20px;
}
    
</style>
  <main id="main">
    <div class="banner">
    <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Apply for Jobs</h1>
        <h5>
        <a href="{{url('/')}}">Home</a> / <span>Careers</span>
       
        </h5>
      </div>
    </div>
<section>

            <div class="container">
        <div class="appl-job-form apply-jobs-slide col-md-8">

          <h2>**VACANCIES*</h2>
          <p>Applications are invited from the candidates, who are dynamic, committed to their profession, and proficient in their field, on the following posts.</p>
          <ol>
              <li>Hindi</li>
<li>Maths</li>
<li>Science</li>
<li> Computer</li>
<li>Mother Teacher</li>
<li> Lab Assistant (1)</li>
<li>Art & Craft</li>
          </ol>
          <br/>
          <ol><h5><strong>Note :-</strong></h5>
<li>Fluency in English with good communication skill is must.   
<li>For post 1-4 Masters degree in the relevant subject with B.Ed is mandatory.</li>
<li>Only shortlisted candidates will be called for interview telephonically, intimating the date/time of interview.</li>
</ol>
<p>Candidates can send their CV through e-mail at <a href="mailto:acharyakulamranchi@gmail.com">acharyakulamranchi@gmail.com</a> OR can WhatsApp at 6287842460, 6287842467</p>

        <form action="" method="post" enctype="multipart/form-data" class="apply-form" style="display:none;">      

            <h4 class="apply-form-job">Apply for Job</h4>

            <div class="row">

              <div class="col-xs-12 col-md-6">

                <div class="form-group">

                  <label class="control-label">Full Name</label>

                  <input type="text" name="name" class="form-control" placeholder="Enter the Full Name">

                </div>

              </div>

              <div class="col-xs-12 col-md-6">

                <div class="form-group">

                  <label class="control-label">Position</label>

                  <select class="form-control" name="postion">

                    <option>Receptionist</option>

                    <option>COMPUTER OPERATOR</option>

                    <option>LIBRARIAN </option>

                  </select>

                </div>

              </div>

              <div class="col-xs-12 col-md-6">

                <div class="form-group">

                  <label class="control-label">Experience</label>

                  <select class="form-control" name="experience">

                    <option>1 Years</option>

                    <option>2 Years</option>

                    <option>3 Years</option>

                    <option>4 Years</option>

                    <option>5+ Years</option>

                  </select>

                </div>

              </div>

  <div class="col-xs-12 col-md-6">

                <div class="form-group">

                  <label class="control-label">Upload Your Resume</label>

                 

                  <input type="file" name="image" class="form-control"  required />

                </div>

              </div>

              <div class="col-xs-12 col-md-12">

                <div class="form-group">

                  <label class="control-label">Message</label>

                  <textarea class="form-control Message-form" name="msg" placeholder="Message"></textarea>

                </div>

              </div>

             

              <div class="col-xs-12 col-md-6">

                <button type="submit" name="send" class="btn btn-submit">Submit</button>

              </div>



            </div>

          </form>

        </div>

      </div>
      </div>

    </section>


    <!-- Search model end -->

    <!-- Js Plugins -->

  </body>
@endsection

