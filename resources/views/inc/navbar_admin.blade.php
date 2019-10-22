<nav class="navbar navbar-expand-md navbar-light bg-danger shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto" style="color:white">
                    <li class="nav-item">
                            <a class="nav-link" href="home" style="color:white">Home</a>
                          </li>
                          
                          <li class="nav-item">
                            <a class="nav-link" href="/Posts" style="color:white">View Missing Items</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" href="/Found" style="color:white">View Found Items</a>
                          </li>
                          <li class="nav-item">

                          <li class="nav-item">
                                <a class="nav-link" href="/ClaimF" style="color:white">View Claim Items</a>
                              </li>
                            <a class="nav-link" href="/about" style="color:white">About Us</a>
                          </li>
                        
                          <li class="nav-item">
                            <a class="nav-link" href="/Posts" style="color:white">Contact Us</a>
                          </li>  
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="color:white">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color:white">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>