<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
    <button class="btn btn-danger" id="menu-toggle" onclick='$("#app").toggleClass("toggled");'><i class="fa fa-arrows-h" aria-hidden="true"></i></button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <div class="text-center">
                        <img src="{{asset('storage/user_dp/'.Auth::user()->email.'.png')}}" alt="" srcset="" style="height:75px" class="rounded-circle">
                        <h6 class="heading pt-2 mb-0">{{Auth::user()->name}}</h6>
                        <span class="">{{Auth::user()->roles()->first()->name}}</span>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center" href="/lms/account/">Account</a>
                    <a class="dropdown-item text-center" href="/lms/profile/">Profile</a>
                    <a class="dropdown-item text-center"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>