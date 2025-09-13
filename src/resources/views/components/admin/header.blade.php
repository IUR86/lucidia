@if ($admin_user)
    <header>
        <div class="logo">
            <button id="sidebarToggle" class="icon-btn">☰</button>
            <p id="sidebarToggle">管理画面</p>
        </div>
        <div class="header-right">
            <div class="username">{{ $admin_user->name }}</div>
        </div>
    </header>
    <div class="sidebar" id="sidebar">
        <ul>
            <li class="{{ request()->routeIs('admin.home.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.home.index') }}">ダッシュボード</a>
            </li>
            <li class="{{ request()->routeIs('admin.counterparty.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.counterparty.index') }}">契約管理</a>
            </li>
            <li class="{{ request()->routeIs('admin.salon.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.salon.index') }}">店舗管理</a>
            </li>
            <li class="{{ request()->routeIs('admin.news.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.news.index') }}">お知らせ管理</a>
            </li>
            <li class="{{ request()->routeIs('admin.role.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.role.index') }}">権限管理</a>
            </li>
            <li class="{{ request()->routeIs('admin.product.index') ? 'selected' : '' }}">
                <a href="{{ route('admin.product.index') }}">商品管理</a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" id="form">
                    @csrf
                    <button type="submit" style="all: unset; cursor: pointer;">ログアウト</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="overlay" id="overlay"></div>
@endif
