@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>Admission-Procedure</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>Admission</span>
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
                @endforeach
            </ul>
          </div>

          @foreach($procedureFees as $procedureFee)
          <div class="fees col-md-4">
             <h4>{{$procedureFee->title}}</h4> 
            <p>{{strip_tags(html_entity_decode($procedureFee->description))}}</p>
          </div>
          @endforeach
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