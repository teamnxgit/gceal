<!DOCTYPE html>
<html lang="en">
    <head>
    @include('includes.head')
    </head>
    <body>
        <div class="container col-lg-12 p-0">
            
            <header class="col-lg-12 p-0 m-0 bg-light row">
                @include('includes.header')
            </header>

            <div id="main" class="row">
                    @yield('content')
            </div>

            <footer class="row">
                @include('includes.footer')
            </footer>
        </div>
    </body>
</html>

