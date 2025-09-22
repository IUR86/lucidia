<header>
    <div class="header-container">
        <div class="header__item-title" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <a href="#">
                lucida
            </a>
        </div>
        <div class="header__item-right">
            <div class="header__item-auth">
                @if ($auth_user)
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $auth_user->name }}
                        </a>
                        <ul class="dropdown-menu">
                            {{-- <li><a class="dropdown-item" href="">プロフィール編集</a></li> --}}
                            {{-- <li><a class="dropdown-item" href="">パスワード再発行</a></li> --}}
                            <li><a class="dropdown-item" href="{{ route('user.logout.logout') }}">ログアウト</a></li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('user.login.index') }}">ログイン</a>
                @endif
            </div>
            <div class="header__item-cart">
                <a href="{{ route('user.cart.index') }}">
                    <img src="{{ asset('/img/icon/cart.png') }}" alt="カートアイコン">
                </a>
            </div>
        </div>
    </div>
</header>
<x-user.sidebar />