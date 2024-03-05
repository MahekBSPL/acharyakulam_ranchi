<!--]'.<!DOCTYPE html>-->
<!DOCTYPE html>
<html lang="en">
   @include("../admin/themes.includes.head")
  
  <body>
    
        @include("../admin/themes.includes.header")
        
           @yield('content')
      
        @include("../admin/themes.includes.footer")
  </body>
</html>