<!DOCTYPE html>
<html lang="en">
    <head>
    @include('includes.lms_head')
    </head>
    <body>
        <div class="d-flex" id="wrapper">
        @include('includes.lms_sidebar')
        
        @yield('content')
 
        </div>
    </body>
    <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</html>

