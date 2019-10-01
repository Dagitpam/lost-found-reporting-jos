<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="/ ">{{config('APP.NAME','rms')}}</a>
  
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Services</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="/Posts">Blog</a>
        </li> 
      </ul>
    </div> 
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="/Posts/create">Add values</a>
        </li>
      </ul>
  </nav>