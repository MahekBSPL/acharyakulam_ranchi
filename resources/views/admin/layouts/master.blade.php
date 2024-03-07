 <!DOCTYPE html>
 <html lang="en">

 <head>
    @include('../admin/includes.head')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
     <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
     <!-- <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script> -->
     <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
 </head>

 <body>
    <div id="app">
       <div class="main-wrapper main-wrapper-1">
          <div class="navbar-bg"></div>
          @include('../admin/includes.header')s
          <!-- Sidebar  -->
          @include('../admin/includes.sidebar')
          <!-- end topbar -->
          
          <!-- Main Content -->
             @yield('content')
   

          @include('../admin/includes.footer')
       </div>
    </div>
 </body>
 <!-- </html> -->