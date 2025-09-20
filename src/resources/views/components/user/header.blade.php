<header>
    <div class="header-container">
        <div class="header__item-title">
            <a href="{{ route('user.home.index') }}">
                lucida
            </a>
        </div>
        <div class="header__item-right">
            <div class="header__item-auth">
                @if ($auth_user)
                    <div>{{ $auth_user->name }}</div>
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