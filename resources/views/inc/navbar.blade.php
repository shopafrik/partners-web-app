<nav class="navbar navbar-expand-md navbar-static-top nav-bar-color">
    <a class="navbar-brand active" href="/">
        <img src="/images/logo_transp.png" alt="" style="max-width:70px;"/>
        <span class="sr-only">(current)</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse navbar-links" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link site-main-color" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link site-main-color" href="#">Contact</a></li>
        </ul>
         <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            @if(session()->has('loggeduser'))  
                <li class="nav-item"><a class="nav-link" href="/dashboard">{{ __('Dashboard') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="/logout">{{ __('Logout') }}</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login">{{ __('Login') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="/apply">{{ __('Apply to Join') }}</a></li>
            @endif
                
        </ul>
    </div>
  
</nav>




