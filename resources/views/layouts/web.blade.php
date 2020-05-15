<!DOCTYPE html>
<html lang="en">
    <head>
    @include('includes.web.head')
    </head>
    <body>
        <div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">
            <header class="col-lg-12 bg-light row m-0 p-0" style="box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.1);z-index: 100;">
                @include('includes.web.header')
            </header>

            <div id="main" class="row m-0">
                    @yield('content')
            </div>

            <footer class="row m-0">
                @include('includes.web.footer')
            </footer>
        </div>
    </body>
</html>

