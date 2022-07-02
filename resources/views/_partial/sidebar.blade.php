<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard')}}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
                    class="logo-name">{{ env("APP_NAME") }}</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown @if (Route::is('dashboard')) active @endif">
                <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class=""><a class="nav-link" href="{{route('dolil-create')}}"><i data-feather="layout"></i>Dolil Store</a></li>
            <li class=""><a class="nav-link" href="{{route('dolil-list')}}"><i data-feather="layout"></i>Dolil List</a></li>
            {{-- THIS IS FOR DUMMY ONLY, CHANGE IT AS YOU NEED --}}
            <li class="dropdown @if (Route::is('home.*')) active @endif" style="visibility: hidden;">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-capsules"></i>
                    <span>Home</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
