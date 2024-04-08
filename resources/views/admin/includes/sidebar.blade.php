
<style>
    .main-sidebar .sidebar-menu li.active a {
    color: #ffa426;
}
body:not(.sidebar-mini) .sidebar-style-2 .sidebar-menu > li.active > a:before {
    background-color: #ffa426;
}
.main-sidebar .sidebar-menu li a {
    color: #000000;
}
 #leftside-navigation ul {
    margin: 0;
    padding: 0;
    display: inline-block;
    width: 100%;
    padding-right: 10px;
}
 #leftside-navigation ul li {
  display: block;
  width: 100%;
  vertical-align: middle;
  list-style-type: none;
}
#leftside-navigation ul li.open > a > i {
  transform: rotate(90deg);
}
body.sidebar-mini .main-sidebar .sidebar-menu > li.active > a {
    box-shadow: 0 4px 8px #fff6e9;
    background-color: #ffa426;
    color: #fff;
}
    #leftside-navigation ul li a {
    position: relative;
    display: block;
    color: #000;
    text-decoration: none;
    width: 100%; 
    padding: 5px 5px 5px 11px;
    box-sizing: border-box;
    font-size: 14px;
    line-height: 22px;
    outline: 0;
    border-bottom: 1px dashed #dbcea7;
}
 #leftside-navigation ul li a:hover {
  color:#ffa426;
}
 #leftside-navigation ul li a span {
  display: inline-block;
}
#leftside-navigation ul li a .fa-angle-right {
    top: 0;
    right: 0;
    line-height: 34px;
    font-size: 12px;
    color: #ffa426;
    text-align: center;
    display: block;
    position: absolute;
    touch-action: manipulation;
}

 #leftside-navigation ul li a i .fa-angle-left,
#leftside-navigation ul li a i .fa-angle-right {
  padding-top: 3px;
}
#leftside-navigation ul ul {
  display: none;
  background-color: #fff8e566;
}
 #leftside-navigation ul ul li {
  border-bottom: none;
}
.btn-success{
    background-color: #191d21 !important;
    border-color: #495057;
}
.main-sidebar {
    height: 100vh;
    overflow-y: auto !important;
}
.main-sidebar .sidebar-menu li a {
    height: 38px;
    border-bottom: 1px dashed #f3e6be;
    padding: 0 10px;
}
.navbar-bg {
    height: 68px!important;
    background-color: #fffaec!important;
}
.main-content {
    padding-top: 23px;
}
.navbar {
    height: 40px;
}
.navbar {
    background-color: #ffa426;
}
.btn-primary{
    background-color: #ffa426 !important;
    border-color: #ffa426;
    box-shadow: 0 2px 6px #f7cd94;
}
.btn-primary:hover {
    box-shadow: 0 2px 6px #f7cd94;
    background-color: #444!important;
    border-color: #ffa426;
}
.parent .bi{
    float: left;
    margin-right: 10px;
    margin-top: -3px;
}
table thead th {
    background-color: #ffa426!important;
    color: #fff!important;
    padding: 5px!important;
    font-size:14px;
    vertical-align: middle !important;
}
table td{
    font-size:14px;
    padding: 5px!important;
    vertical-align: middle !important;
}
a {
    color: #ffa426;
}
.sidebar-menu img{
    width: 190px;
    margin:0 auto;
}
.sidebar-menu h3{
    font-size:14px;
    text-align:center;
}
.section-header h1{
    color: #fc544b !important;
}
.parent ul li a{
    font-size:13px!important;
}
.main-sidebar .sidebar-menu li a i {
    margin-right: 5px;
}
    </style>

<div class="main-sidebar sidebar-style-2">
    



    
        
        <ul class="sidebar-menu">
           <h3>   <a target="_blank" href="{{ url('/frontend/index')}}"><img src="https://acharyakulamranchi.com/assets/img/logo.png" alt=""></a></h3>
            <li class="active">
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
                <a href="{{ url('/admin/topperstudent')}}" class="nav-link"><i class="bi-award-fill" aria-hidden="true"></i><span>Topper Student</span></a>
            </li>
          
            <li class="">
                <a href="{{ url('/admin/photoGallery')}}" class="nav-link"><i class="bi bi-images" aria-hidden="true"></i><span>Photo Gallery</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/circular')}}" class="nav-link"><i class="bi bi-file-text" aria-hidden="true"></i><span>Circular</span></a>
            </li>
            <li class="">
                <a href="{{ url('/admin/popup')}}" class="nav-link"><i class="bi bi-window" aria-hidden="true"></i><span>Home Modal</span></a>
            </li>
        </ul>

    </aside>
    <aside id="sidebar-wrapper">
            <div id="leftside-navigation">
                <ul class="level-0">
                    <li class="parent">
                    
                    <a href="#"><i class="bi bi-journal-text" aria-hidden="true"></i> <span>Admission Procedure</span><i class="arrow fa fa-angle-right"></i></a>
                        <ul class="level-1">
                            <li class="">
                            <a href="{{ url('/admin/procedure')}}" class="nav-link"><i class="bi bi-newspaper" aria-hidden="true"></i> <span>Admission Procedure Criteria</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/procedurefee')}}" class="nav-link"><i class="bi bi-images" aria-hidden="true"></i><span>Procedure Fee</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/proceduredescription')}}" class="nav-link"><i class="bi bi-list-task" aria-hidden="true"></i><span>Document for admission</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="parent">
                   
                    <a href="#"> <i class="bi bi-people-fill"></i> <span>Facility</span><i class="arrow fa fa-angle-right"></i></a>
                        <ul class="level-1">
                            <li class="">
                            <a href="{{ url('/admin/facilityslider')}}" class="nav-link"><i class="bi bi-sliders" aria-hidden="true"></i> <span>Slider</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/facilitydescription')}}" class="nav-link"><i class="bi bi-card-text" aria-hidden="true"></i> <span>Description</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/facility')}}" class="nav-link"><i class="bi bi-card-text" aria-hidden="true"></i> <span>Gallery</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/house_activity')}}" class="nav-link"><i class="bi bi-house-door" aria-hidden="true"></i> <span>House Activity</span></a>
                            </li>
                        </ul>
                    </li>

                    
                    <li class="parent">
                    
                    <a href="#"><i class="bi bi-file-person-fill"></i> <span>Stuent Council</span><i class="arrow fa fa-angle-right"></i></a>
                        <ul class="level-1">
                            <li class="">
                            <a href="{{ url('/admin/class')}}" class="nav-link"><i class="bi bi-book-fill" aria-hidden="true"></i><span>Class</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/section')}}" class="nav-link"><i class="bi bi-layout-text-sidebar" aria-hidden="true"></i><span>Section</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/council')}}" class="nav-link"><i class="bi bi-file-person-fill" aria-hidden="true"></i><span>Council</span></a>
                            </li>
                        </ul>
                    </li>
 
                <li class="parent">

                    <a href="#"><i class="bi bi-trophy-fill"></i> <span>Admission</span><i class="arrow fa fa-angle-right"></i></a>
                        <ul class="level-1">
                                <li class="">
                                <a href="{{ url('/admin/rule')}}" class="nav-link"><i class="bi bi-file-earmark-text" aria-hidden="true"></i><span>Rulses & Regulation</span></a>
                                </li>
                                <li class="">
                                <a href="{{ url('/admin/prospectus')}}" class="nav-link"><i class="bi bi-journal-text" aria-hidden="true"></i><span>Prospectus</span></a>
                                </li>
                            
                        </ul>
                      </li>

                      <li class="parent">
                      
                    <a href="#"><i class="bi bi-menu-up" aria-hidden="true"></i> <span>Academics</span><i class="arrow fa fa-angle-right"></i></a>
                        <ul class="level-1">
                            <li class="">
                            <a href="{{ url('/admin/academic')}}" class="nav-link"><i class="bi-book-fill" aria-hidden="true"></i> <span>Academic Session</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/participation')}}" class="nav-link"><i class="bi-pencil-fill" aria-hidden="true"></i> <span>Participation Exam</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/competitive_exam')}}" class="nav-link"><i class="bi-pencil-fill" aria-hidden="true"></i> <span>Competitive Exam</span></a>
                            </li>
                            <li class="">
                            <a href="{{ url('/admin/yoga')}}" class="nav-link"><i class="bi bi-person" aria-hidden="true"></i> <span>Yoga</span></a>
                            </li> 
                        </ul>
                      </li>


                </ul>
	    </div> 
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

        <script>
            $("#leftside-navigation .parent > a > i").click(function(e) {
  e.preventDefault();
  var toClose = $("#leftside-navigation ul").not($(this).parents("ul"));
  toClose.slideUp();
  toClose.parent().removeClass("open");
  if(!$(this).parent().next().is(":visible")) {
    var toOpen = $(this).parent().next()
    toOpen.slideDown();
    toOpen.parent().not(".open").addClass("open");
  }  
  e.stopPropagation();
});
            </script>