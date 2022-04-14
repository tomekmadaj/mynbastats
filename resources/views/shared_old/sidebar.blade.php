<a class="nav-link" href="{{ route('home.mainPage') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
    Panel
</a>
<div class="sb-sidenav-menu-heading">Profil</div>
<a class="nav-link" href="{{ route('me.profile') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Mój profil
</a>
<a class="nav-link" href="{{ route('me.games.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Gry
</a>

<div class="sb-sidenav-menu-heading">Użytkownicy Faker</div>
<a class="nav-link" href="{{ route('faker.get.users') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
    Użytkownicy faker
</a>

<div class="sb-sidenav-menu-heading">Gry</div>
<a class="nav-link" href="{{ route('games.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Lista
</a>

<div class="sb-sidenav-menu-heading">Gry Builder</div>
<a class="nav-link" href="{{ route('games.b.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.b.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Lista
</a>

<div class="sb-sidenav-menu-heading">Gry Eloquent</div>
<a class="nav-link" href="{{ route('games.e.dashboard') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Dashboard
</a>
<a class="nav-link" href="{{ route('games.e.list') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-gamepad"></i></div>
    Lista
</a>
@can('admin-level')
<div class="sb-sidenav-menu-heading">Admin panel</div>
<a class="nav-link" href="{{ route('get.users') }}">
    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
    Użytkownicy
</a>
@endcan
