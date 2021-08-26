{{-- <div class="admin-sidebar">
    <div class="sidebar-header">
        <div class="image">
            <img src="/assets/img/man.svg" alt="Vaccine-App" />
        </div>
        <span class="title">Vaccine-App</span>
    </div>
    
    <div class="sidebar-body">
        <div class="sidebar-items">
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
</div> --}}



<div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" content="height=device-height">
        <div class="p-4 pt-5">
          <a href="#" class="img logo rounded-circle mb-5" style="background-image: url({{ asset('assets/img/nemsLogo.jpg') }});"></a>
    <ul class="list-unstyled components mb-5">
      <li>
        <a href="{{ route('patients.index') }}">Patients</a>
      </li>
      <li>
          <a href="{{ route('deseases.index') }}">Maladies</a>
      </li>
      <li>
      <a href="{{ route('users.index') }}">Utilisateurs</a>
      </li>
      <li>
      <a href="{{ route('settings') }}">Mon compte</a>
      </li>
      <li>
      <a href="#">Déconnecter</a>
      </li>
    </ul>

    <div class="footer">
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This web site is made  <i class="icon-heart" aria-hidden="true"></i> by <a href="https://dz.linkedin.com/in/sofiane-ouchene-150b1816b/en?trk=people-guest_people_search-card" target="_blank">OUCHENE Sofiane</a> & <a href="https://dz.linkedin.com/in/nabil-merazga/en?trk=people-guest_people_search-card" target="_blank">MERAZGA Nabil</a> 
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>

  </div>
</nav>

<!-- Page Content  -->


