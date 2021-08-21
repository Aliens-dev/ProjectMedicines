<div class="admin-nav">
    <div class="navbar-brand">
        <span class="side-toggle">
            <img src="/assets/img/3bars.svg" alt="menu" />
        </span>
        <span class="nav-toggle"><img src="/assets/img/3bars.svg" alt="menu" /></span>
    </div>
    <div class="navbar-items">
        <div class="navbar-block">
            <div class="navbar-item">
                <a class="navbar-link ripple" href="">Home</a>
            </div>
        </div>
        <div class="navbar-block">
            <livewire:notification-component />
            <div class="navbar-item dropleft">
                <div class="dropdown-toggle"
                     type="button"
                     id="dropdownMenuButton"
                     data-toggle="dropdown"
                     aria-haspopup="true"
                     aria-expanded="false"
                >
                    <span>{{ auth()->user()->first_name }}</span>
                </div>
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
</div>
