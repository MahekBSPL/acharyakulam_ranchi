<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a target="_blank" href="{{ url('/admin/dashboard')}}">Acharya Kulam Ranchi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a target="_blank" href="{{ url('/')}}">A K</a>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ url('/admin/dashboard')}}" class="nav-link"><i class="bi bi-display" aria-hidden="true"></i><span>Dashboard</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/menu')}}" class="nav-link"><i class="bi bi-menu-up" aria-hidden="true"></i><span>Menu</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/notification')}}" class="nav-link"><i class="bi bi-newspaper" aria-hidden="true"></i><span>Notifications</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/slider')}}" class="nav-link"><i class="bi bi-sliders" aria-hidden="true"></i><span>Slider</span></a>
            </li>
            <li>
                <a href="{{ url('/admin/homegallery')}}" class="nav-link"><i class="bi bi-images" aria-hidden="true"></i><span>Home Gallery</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/event')}}" class="nav-link"><i class="bi bi-sliders" aria-hidden="true"></i><span>Event</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/winner')}}" class="nav-link"><i class="bi bi-trophy-fill" aria-hidden="true"></i><span>Achiever/Winner Student</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/procedure')}}" class="nav-link"><i class="bi bi-journal-text" aria-hidden="true"></i><span>Admission Procedure Criteria</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/procedurefee')}}" class="nav-link"><i class="bi bi-images" aria-hidden="true"></i><span>Procedure Fee</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/proceduredescription')}}" class="nav-link"><i class="bi bi-list-task" aria-hidden="true"></i><span>Document list for admission</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/rule')}}" class="nav-link"><i class="bi bi-file-earmark-text" aria-hidden="true"></i><span>Rule</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/prospectus')}}" class="nav-link"><i class="bi bi-journal-text" aria-hidden="true"></i><span>Prospectus</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/class')}}" class="nav-link"><i class="bi bi-book-fill" aria-hidden="true"></i><span>Class</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/section')}}" class="nav-link"><i class="bi bi-layout-text-sidebar" aria-hidden="true"></i><span>Section</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/council')}}" class="nav-link"><i class="bi bi-file-person-fill" aria-hidden="true"></i><span>Student Council</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/topperstudent')}}" class="nav-link"><i class="bi-award-fill" aria-hidden="true"></i><span>Topper Student</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/academic')}}" class="nav-link"><i class="bi-book-fill" aria-hidden="true"></i><span>Academic Session</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/participation')}}" class="nav-link"><i class="bi-pencil-fill" aria-hidden="true"></i><span>Participation Exam</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/competitive_exam')}}" class="nav-link"><i class="bi-pencil-fill" aria-hidden="true"></i><span>Competitive Exam</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/yoga')}}" class="nav-link"><i class="bi bi-person" aria-hidden="true"></i><span>Yoga</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/photoGallery')}}" class="nav-link"><i class="bi bi-images" aria-hidden="true"></i><span>Photo Gallery</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/facilityslider')}}" class="nav-link"><i class="bi bi-sliders" aria-hidden="true"></i><span>Facility Slider</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/facilitydescription')}}" class="nav-link"><i class="bi bi-card-text" aria-hidden="true"></i><span>Facility Description</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/facility')}}" class="nav-link"><i class="bi bi-card-text" aria-hidden="true"></i><span>Facility Gallery</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/house_activity')}}" class="nav-link"><i class="bi bi-house-door" aria-hidden="true"></i><span>House Activity</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/circular')}}" class="nav-link"><i class="bi bi-file-text" aria-hidden="true"></i><span>Circular</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/popup')}}" class="nav-link"><i class="bi bi-window" aria-hidden="true"></i><span>Home Modal</span></a>
            </li>
        </ul>

    </aside>
</div>

<!-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url('/admin/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active"></div>
            </div>
        </div>
        <div class="section-body"> -->

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url('/admin/dashboard')}}">Dashboard</a></div>
                <div class="breadcrumb-item active">{{$title}}</div>
            </div>
        </div>
        <div class="section-body">