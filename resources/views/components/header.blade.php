<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="#">
        <img src="https://dummyimage.com/200x30/d4d4d4/ffffff" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('app.link.index') }}">History</a>
            </li>
        </ul>
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
                        Log
                        Out</a>
                </div>
            </div>
        </div>
    </div>
</nav>
