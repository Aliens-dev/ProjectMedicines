<div class="admin-sidebar">
    <div class="sidebar-back"></div>
    <div class="sidebar-header">
        <div class="image">
            <img src="/assets/img/man.svg" alt="Vaccine-App" />
        </div>
        <span class="title">Vaccine-App</span>
    </div>
    <div class="divider"></div>
    <div class="sidebar-body">
        <div class="sidebar-items">
            <a href="{{ route('dashboard') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/dashboard.svg" width="20" height="20" alt="">
                </div>
                <div class="text">Dashboard</div>
            </a>
            <a  href="{{ route('patients.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/group.svg" width="20" height="20" alt="">
                </div>
                <div class="text">Patients</div>
            </a>
            <a  href="{{ route('deseases.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/tag.svg" width="20" height="20" alt="">
                </div>
                <div class="text">Les Maladies</div>
            </a>
            <a  href="{{ route('users.index') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/group.svg" width="20" height="20" alt="">
                </div>
                <div class="text">Les utilisateurs</div>
            </a>
            <a  href="{{ route('settings') }}" class="sidebar-item ripple">
                <div class="icon">
                    <img src="/assets/img/user.svg" width="20" height="20" alt="">
                </div>
                <div class="text">Mon Compte</div>
            </a>
        </div>
    </div>
</div>
