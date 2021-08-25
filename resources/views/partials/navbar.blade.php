
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
  
      <button type="button" id="sidebarCollapse" class="btn btn-primary">
        <i class="fa fa-bars"></i>
        <span class="sr-only">Toggle Menu</span>
      </button>
      <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <div class="nav-item active dropleft">
              <a type="button" class="navbar-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="" class="dropdown-item">
                    My Account
                </a>
                <a href="" class="dropdown-item">
                    <form method="POST"  action="{{ route('logout') }}" >
                        @csrf
                        <button class="button">Logout</button>
                    </form>
                </a>
            </div>
            </div>
        </ul>
      </div>
    </div>
  </nav>
{{-- <div class="admin-nav">
    <div class="navbar-brand">
        <span class="side-toggle">
            <img src="/assets/img/3bars.svg" alt="menu" />
        </span>
        <span class="nav-toggle"><img src="/assets/img/3bars.svg" alt="menu" /></span>
    </div>
    <div class="navbar-items">
        <div class="navbar-block">
            <div class="navbar-item">
                <a class="navbar-link ripple" href="{{ route('dashboard') }}">Home</a>
            </div>
        </div>
        <div class="navbar-block">
            <div class="navbar-item dropleft">
                <a type="button" class="navbar-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->first_name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="" class="dropdown-item">
                        My Account
                    </a>
                    <a href="" class="dropdown-item">
                        <form method="POST"  action="{{ route('logout') }}" >
                            @csrf
                            <button class="button">Logout</button>
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
