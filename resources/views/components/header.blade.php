<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm bg-body-tertiary rounded">
    <img src="{{asset('storage/image/Logo.png')}}" alt="Logo" width="200" height="100">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto d-flex" style="font-size: 24px">
            <li class="nav-item mr-5">
                @auth
                <a class="nav-link" href="{{ route('home') }}" style="font-weight: bold">Home</a>
                @endauth
            </li>
            <li class="nav-item mr-5">
                @auth
                <a class="nav-link" href="{{ route('app.link.index') }}" style="font-weight: bold">History</a>
                @endauth
            </li>
        </ul>
        @if (Auth::check())
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    
                    <span class="user-icon shadow-none">
                        <img src="{{ asset('assets/vendors/images/photo1.jpg') }}" alt="" />
                    </span>
                    <span class="user-name">{{ Auth::user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="dw dw-logout"></i>
                        LogOut</a>
                </div>
            </div>
        </div>
        @else
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    
                    <span class="user-icon shadow-none">
                        <img src="{{ asset('storage/image/user.png') }}" alt="" />
                    </span>
                    <span class="user-name">User</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item text-primary" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
                </div>
            </div>
        </div>
        @endif
        </div>
    </div>
</nav>