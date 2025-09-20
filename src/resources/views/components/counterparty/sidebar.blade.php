<div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ route('counterparty.home.index', ['subdomain' => request()->route('subdomain')]) }}" class="simple-text">
                lucida
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item {{ request()->routeIs('counterparty.home.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('counterparty.home.index', ['subdomain' => request()->route('subdomain')]) }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>ダッシュボード</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('counterparty.profile.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('counterparty.profile.index', ['subdomain' => request()->route('subdomain')]) }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>契約情報</p>
                </a>
            </li>
        </ul>
    </div>
</div>