<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link @if(Request::is('dashboard')) active @endif" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Administrator</div>

                @can('admin', \App\Models\User::class)
                    <a class="nav-link @if(Request::is('dashboard/outlets*')) active @endif" href="{{ route('outlets.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Outlet
                    </a>

                    <a class="nav-link @if(Request::is('dashboard/users*')) active @endif" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        User
                    </a>

                    <a class="nav-link @if(Request::is('dashboard/packages*')) active @endif" href="{{ route('packages.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Paket
                    </a>

                    <a class="nav-link @if(Request::is('dashboard/members*')) active @endif" href="{{ route('members.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Member
                    </a>

                    <a class="nav-link @if(Request::is('dashboard/transactions*')) active @endif" href="{{ route('transactions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Transaksi
                    </a>
                @elsecan('kasir', \App\Models\User::class)
                    <a class="nav-link @if(Request::is('dashboard/members*')) active @endif" href="{{ route('members.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Member
                    </a>
                    <a class="nav-link @if(Request::is('dashboard/transactions*')) active @endif" href="{{ route('transactions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Transaksi
                    </a>
                @else
                    <a class="nav-link @if(Request::is('dashboard/transactions*')) active @endif" href="{{ route('transactions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Transaksi
                    </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
