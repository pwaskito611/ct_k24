<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
         
            @if (\URL::current() == url('/'))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                </li>    
            @else
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
                </li>  
            @endif
         
            @guest
                <li class="nav-item">
                    <a href="{{url('/login')}}" class="nav-link">Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/register')}}" class="nav-link">Register</a>
                </li>
            @endguest

            @auth
                @if (\URL::current() == url('/dashboard'))
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/dashboard')}}">Dashboard</a>
                    </li>    
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/dashboard')}}">Dashboard</a>
                    </li>  
                @endif
            
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{url('account')}}">Account setting</a></li>
                      <li><a class="dropdown-item" href="{{url('account/change-password')}}">Change Password</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <center>
                            <form action="{{url('/logout')}}" method="POST">
                                @csrf
                                <button class="btn btn-white" type="submit">Logout</button>
                            </form>
                          </center>
                      </li>
                    </ul>
                  </li>
            @endauth
        </ul>
      </div>
    </div>
</nav>