<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('home') }}">
            <div class="logo-img">
                <img height="40" src="{{ asset('img/logomenu.png') }}" class="header-brand-img" title="SIP Sandi Cargo">
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
        $segment3 = request()->segment(3);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ $segment1 == '' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="ik ik-bar-chart-2"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </div>
                {{-- if auth --}}
                @auth
                    @canany(['view-user', 'view-roles'])
                        <div class="nav-lavel">{{ __('User') }} </div>
                        <div
                            class="nav-item {{ $segment1 == 'user' || $segment1 == 'role' || $segment1 == 'task' ? 'active open' : '' }} has-sub">
                            <a href="#"><i class="ik ik-user dropdown-icon"></i><span>{{ __('Pengguna') }}</span></a>
                            <div class="submenu-content">
                                @can('view-user')
                                    <a href="{{ route('user.index') }}"
                                        class="menu-item {{ $segment1 == 'user' ? 'active' : '' }}">
                                        Pengguna
                                    </a>
                                @endcan
                                @can('view-roles')
                                    <a href="{{ route('role.index') }}"
                                        class="menu-item {{ $segment1 == 'role' ? 'active' : '' }}">
                                        Hak Akses
                                    </a>
                                @endcan
                            </div>
                        </div>
                    @endcan
                @endauth
            </nav>
        </div>
    </div>
</div>
