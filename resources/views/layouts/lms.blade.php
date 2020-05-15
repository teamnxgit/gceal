<!DOCTYPE html>
<html lang="en">
    <head>
    @include('includes.lms.head')
    </head>
    <body>
        <div class="d-flex" id="app">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show position-absolute" role="alert" style="z-index:1000;right:10px;top:10px;left:10px;">
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show position-absolute" role="alert" style="z-index:1000;right:10px;top:10px;left:10px;">
            <p>{{ Session::get('error') }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show position-absolute" role="alert" style="z-index:1000;right:10px;top:10px;left:10px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @include('includes.lms.sidebar')
        
        @yield('content')
        </div>
    </body>
</html>

