<header class="header-top" header-theme="light">
    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
        $segment3 = request()->segment(3);
    @endphp
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <div class="btn mr-2" >
                    <a href="{{ route('home') }}">
                        <i class="ik ik-bar-chart-2"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </div>
                <div class="btn mr-2" id="btnResi">
                    <i class="ik ik-shopping-cart"></i>
                    <span >Daftar Resi</span>
                </div>
                <a href="{{ route('pengiriman-barang.create') }}" class="btn">
                    <i class="ik ik-send"></i>
                    <span >Tambah Resi</span>
                </a>
                <div class="btn mr-2" id="btnManivest">
                    <i class="ik ik ik-truck"></i>
                    <span>Daftar Manivest</span>
                </div>
                <a href="{{ route('surat-jalan.create') }}" class="btn">
                    <i class="ik ik-chevrons-right"></i>
                    <span>Tambah Manivest</span>
                </a>

            </div>
            @auth

                <div class="top-menu d-flex align-items-center">
                    {{-- Notification --}}
                    <div class="dropdown">

                    </div>
                    <div class="dropdown">
                        <b>{{ Ucwords(str_replace([':', '_', '-', '*'], ' ', $title)) }}</b>
                        || {{ tanggal_indonesia(Date::now()) }} || <span>User Login : {{ ucfirst(Auth::user()->name) }}</span>
                    </div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ik ik-user"></i>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('user.ubah') }}"><i
                                        class="ik ik-user dropdown-icon"></i>
                                    {{ __('Profile') }}</a>
                                {{-- <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i>
                            {{ __('Message') }}</a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ik ik-power dropdown-icon"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                    </div>

                </div>
            @endauth
        </div>
    </div>
</header>
