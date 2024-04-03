@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Admission-Procedure</h1>
        <h5>
          <a href="{{url('frontend/index')}}">Home</a> / <span>Admission</span>
        </h5>
      </div>
    </div>

    <section class="procedure">
      <div class="container" data-aos="fade-up">
        <div class="col-md-12">
          <h2>Admission Criteria</h2>
          <p>Admission at Acharyakulam is based on the availability of seats and the interest and aptitude of the child
            towards Special Vaidic and Sanskrit Education that would be imparted along with full fledged modern
            CBSE/NCERT pattern. The students who show Interest, Inclination and Ability to study Special Vaidic and
            Sanskrit Education would preferably be invited to apply for admission at Acharyakulam</p>
        </div>
      </div>
    </section>

    <section class="rules">
      <div class="container" data-aos="fade-up">
        <div class="row mt-5 ">
          <div class="col-lg-7  d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Admission Rules</h2>
              <h5><b>Admission Class</b></h5>
              <p>Admission is taken in class Nursery to VIII.</p>
            </div>

            <div class="content mt-2">
              <h5><b>Eligibility Criteria</b></h5>
              <p>Passed or studying in the Class in the year preceding the admission year</p>
            </div>

            <div class="content mt-2">
              <h5><b>Age</b></h5>
              <p>Criteria</p>
            </div>
          </div>
          <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/Mask Group 37.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section>

    <div class="col-md-12 mt-5">
      <table class="age-crieria">
        <tbody>
          @foreach($procedures as $procedure)
          <tr>
            <td>{{$procedure->class}}</td>
            <td>{{$procedure->title}}</td>
            <td>{{strip_tags(html_entity_decode($procedure->description))}}</td>
          </tr>
          @endforeach

          <!-- <tr>
            <td>NURSERY</td>
            <td>3 years to 4 years</td>
            <td>(Born between 01-04-2020 &amp; 31-03-2021) </td>
          </tr>

          <tr>
            <td>L.K.G</td>
            <td>4 years to 5 years </td>
            <td>(Born between 01-04-2019 &amp; 31-03-2020) </td>
          </tr>
          <tr>
            <td>U.K.G</td>
            <td>5 years to 6 years </td>
            <td>(Born between 01-04-2018 &amp; 31-03-2019)</td>
          </tr>
          <tr>
            <td>I </td>
            <td>6 years to 7 years</td>
            <td>(Born between 01-04-2017 &amp; 31-03-2018) </td>
          </tr>
          <tr>
            <td>II </td>
            <td>7 years to 8 years</td>
            <td>(Born between 01-04-2016 &amp; 31-03-2017)</td>
          </tr>

          <tr>
            <td>III </td>
            <td>8 years to 9 years</td>
            <td>(Born between 01-04-2015 &amp; 31-03-2016)</td>
          </tr>
          <tr>
            <td>IV </td>
            <td>9 years to 10 years</td>
            <td>(Born between 01-04-2014 &amp; 31-03-2015)</td>
          </tr>
          <tr>
            <td>V </td>
            <td>10 years to 11 years</td>
            <td>(Born between 01-04-2013 &amp; 31-03-2014)</td>
          </tr>
          <tr>
            <td>VI </td>
            <td>11 years to 12 years </td>
            <td>(Born between 01-04-2012 &amp; 31-03-2013)</td>
          </tr>
          <tr>
            <td>VII</td>
            <td>12 years to 13 years </td>
            <td>(Born between 01-04-2011 &amp; 31-03-2012)</td>
          </tr>
          <tr>
            <td>VIII</td>
            <td>13 years to 14 years</td>
            <td>(Born between 01-04-2010 &amp; 31-03-2011)</td>
          </tr> -->
        </tbody>
      </table>
    </div>

    <section class="list">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2>List of Documents to be brought at the time of Admission:–</h2>
            <ul>
            @foreach($procedureDescriptions as $procedureDescription)
              <li>{{strip_tags(html_entity_decode($procedureDescription->description))}}</li>

              <!-- <li>Birth Certificate issued by Municipal Corporation of the State Government.</li>
              <li>Only following Proof of Residence (in the name of the child’s Father or Mother) accepted as
                Address proof of the Child (No other address proof will be accepted) -Unique Identification Card
                (Aadhar Card) / Voter ID Card / Post-paid Mobile Bill / Electricity Bill /Passport / Gas connection /
                Ration Card (having mother and father name along with name of child).</li>
              <li>If the sibling(s) are studying in the same school, photo copy of the ID card issued by the school
                office for the Academic Session 2023/24. Only real brother/ sister studying in the school will be
                considered as sibling.</li>
              <li>Medical fitness certificate and blood group report certified by medical practitioner of the student
                is
                mandatory.</li>
              <li>In case of applicants with Special Needs, a copy of certificate of Disability from a Medical Officer
                of
                Govt. Hospital should be submitted along with the registration form.</li>
              <li>Appropriate documentation in case of Single Parent (presently running divorce case in the court
                will not be considered, either widow/widower or divorced would be considered). Appropriate
                documentation in case of change in the name of mother/ father after marriage, divorce, adoption
                etc.
              </li>
              <li>ID proof of Father, Mother, Guardian and Emergency contact person is mandatory.</li>
              <li> Transfer Certificate (Original) of the previous school.</li>
              <li>Report Card of the previous school.</li>
              <li>Two passport size photographs of the child and one photograph of each parents (father, mother
                and guardian)</li> -->
                @endforeach
            </ul>
          </div>

          @foreach($procedureFees as $procedureFee)
          <div class="fees col-md-4">
             <h4>{{$procedureFee->title}}</h4> 
            <p>{{strip_tags(html_entity_decode($procedureFee->description))}}</p>
          </div>
          @endforeach

          <!-- <div class="fees col-md-4">
            <h4>Registration Fees Rs. 800/-</h4>
            <p>Any deviation would be considered NOT ELIGIBLE for admission even though a candidate may have been
              invited to apply for Admission. In such cases, Acharyakulam would use its discretion on case-to-case
              basis
              to choose ELIGIBLE STUDENTS outside AGE and Standard bracket and its decision would be final & binding
              on
              all and NO reason thereof for not choosing would be provided</p>
          </div> -->

          <div class="col-md-12">
            <p><b style="color:#FF9800;">Note :-</b> Parents Are Required To Submit Xerox Copy Of The Following
              Documents Along With The
              Admission
              Form Duly Filled Properly. (Overwriting And Cutting Form Will Not Be Acceptable).</p>
          </div>
        </div>
      </div>

    </section>

</body>
@endsection