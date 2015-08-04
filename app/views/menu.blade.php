<div class="container">
    <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-bar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Photic</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav-bar">
            <ul class="nav navbar-nav pull-right">
                @if(Auth::check())
                <li>
                    <a href="{{ route('upload') }}">Upload</a>
                </li>
                <li>
                    <a href="{{ route('profile') }}">Profile</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
                @else
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li>
                    <a href="{{ route('signup') }}">Register</a>
                </li>
                @endif
                <li><a href="{{ route('about') }}">About</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</div>