@extends('frontend.layouts.main')
@section('container')

<body>
  <main id="main">
    <div class="banner">
      <img src="{{url('public/frontend/assets/img/Mask Group 108.jpg')}}" class="img-fluid" alt="banner">
      <div class="banner-inr breadcrumbs">
        <h1>House Activities</h1>
        <h5>
          <a href="{{url('/')}}">Home</a> / <span>facilities</span>
        </h5>
      </div>
    </div>

    <section>
      <div class="container" data-aos="fade-up">
        <h2>House Activities</h2>
        <p>To foster a sense of team spirit, group loyalty and healthy competition, the whole school is divided into
          four houses named after the important components of human life.</p>
      </div>
    </section>

    <section id="house-activity">
      <div class="container">
        <div class="row">
          <div class="close-btn" onclick="manage_close('dir-22');">
            <img src="{{url('public/frontend/assets/img/close-btn.png')}}" class="img-fluid">
          </div>
          <div class="col-lg-12">
            <div class="row house-activity">

              @foreach($activitys as $activity)
              <div class="col-lg-3">
                <img src="{{url('/public/admin/upload/houseactivity/' .$activity->image)}}" class="w-100">
                <p><strong>{{$activity->name}}: </strong>{{strip_tags(html_entity_decode($activity->description))}}</p>
              </div>
              @endforeach
            </div>
            <p>The school organizes various Inter-House competitions to a build a healthy spirit of
              competition &amp; team spirit amongst students, Debates, Quizzes and sporting events
              are organized all year round.</p>
          </div>
        </div>
      </div>
    </section>
</body>
@endsection