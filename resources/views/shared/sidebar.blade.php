<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    NBA Home
</a>
<a class="nav-link" href="{{ route('home.standings') }}">
    <div class="sb-nav-link-icon"><i class="fa fa-list-ol"></i></div>
    NBA Standings
</a>
<a class="nav-link" href="{{ route('home.news') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
    NBA News
</a>
<a class="nav-link" href="{{ route('home.highlights') }}">
    <div class="sb-nav-link-icon"><i class="fa fa-film"></i></div>
    Game Highlights
</a>

<div class="sb-sidenav-menu-heading">My Nba</div>
@guest
    <a class="nav-link" href="{{ route('login') }}">
        <div class="sb-nav-link-icon"><i class="fa fa-star"></i></div>
        My Nba Stats
    </a>
@endguest
@auth
    <a class="nav-link" href="{{ route('nbaStats.teamDashboard') }}">
        <div class="sb-nav-link-icon"><i class="fa fa-star"></i></div>
        My Team Stats
    </a>
    <a class="nav-link" href="{{ route('nbaStats.teamNews') }}">
        <div class="sb-nav-link-icon"><i class="fa fa-newspaper"></i></div>
        My Team News
    </a>
    <a class="nav-link" href="{{ route('nbaStats.highlights') }}">
        <div class="sb-nav-link-icon"><i class="fa fa-film"></i></div>
        My Team Highlights
    </a>
    <a class="nav-link" href="{{ route('nbaStats.playerDashboard') }}">
        <div class="sb-nav-link-icon"><i class="fa fa-street-view"></i></div>
        My Player Stats
    </a>
    {{-- <a class="nav-link" href="#">
        <div class="sb-nav-link-icon"><i class="fa fa-wrench"></i></div>
        Settings
    </a> --}}
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
