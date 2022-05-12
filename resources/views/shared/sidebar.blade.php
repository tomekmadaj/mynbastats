<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Main Page
</a>

<div class="sb-sidenav-menu-heading">My Nba</div>
<a class="nav-link" href="{{ route('nbaStats.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fa fa-star"></i></div>
    My Nba Stats
</a>

@auth
    <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
        Settings
    </a>
@endauth


<div class="sb-sidenav-menu-heading">Profile</div>
<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    My profile
</a>

@can('admin-level')
    <div class="sb-sidenav-menu-heading">Admin panel</div>
    <a class="nav-link" href="{{ route('get.users') }}">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
        Użytkownicy
    </a>
@endcan
