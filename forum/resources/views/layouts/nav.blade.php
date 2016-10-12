<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li>
                    <notifications></notifications></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li><a href="/profile/edit">Settings</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical"></span></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#contains">Commission</a></li>
                      <li><a href="#its_equal">Brokerage</a></li>
                      <li><a href="#greather_than">Contact Us</a></li>
                      <hr></hr>
                      <li><a href="#less_than">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{-- 
<ul class="sidebar-nav">
<li class="sidebar-brand"><a href="#">Categories</a></li>
<li><a href="#">Dashboard</a></li>
<li><a href="#">Shortcuts</a></li>
<li><a href="#">Overview</a></li>
<li><a href="#">Events</a></li>
<li><a href="#">About</a></li>
<li><a href="#">Services</a></li>
<li><a href="#">Contact</a></li>
</ul>

<nav class = "navbar navbar-default" role = "navigation">
    <a class = "navbar-brand" href = "#">TutorialsPoint</a>
    <ul class="nav navbar-nav navbar-left">
        <li>
            <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i> Search</button>
            <button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> New Topic</button>
        </li>
        <li>
            <button type = "button" class = "navbar-toggle" 
             data-toggle = "collapse" data-target = "#menu-toggle" id="menu-toggle">
             <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
        </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-option-vertical"></span></button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#contains">Commission</a></li>
              <li><a href="#its_equal">Brokerage</a></li>
              <li><a href="#greather_than">Contact Us</a></li>
              <hr></hr>
              <li><a href="#less_than">Logout</a></li>
            </ul>
        </li>
        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li>
        <li><a href="#"><i class="fa fa-bell" aria-hidden="true"></i> Notificons</a></li>
        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>

    </ul>
</nav>
 --}}