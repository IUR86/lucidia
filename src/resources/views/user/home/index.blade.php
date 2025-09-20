<x-user.common>
    <main class="user-main">
        <div class="home-head">
            <div class="home-head-content">
                <h1>革新的なビジネスソリューション</h1>
                <p>店舗、シフト、従業員管理を一元化</p>
            </div>
        </div>
        <div class="home-main">
            <section class="home-main-content">
                <div class="home-main-content-wrap">
                    <h2>機能</h2>
                    <ul class="home-main-content-product-list">
                        @foreach ($product_function as $product)
                            <li class="home-main-content-product-item">
                                <form class="api-action" action="{{ route('user.api.cart_item.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <img alt="画像" src="https://img2.lancers.jp/portfolio/598448/1770412/895176994898f838de3b1e69b7f6c0c6a77eacb6a1f955e3d77667558a97d7ee/32420704_400_0.jpg" />
                                    <p class="name">{{ $product->name }}</p>
                                    <p class="price">{{ $product->price }}円</p>
                                    <button type="submit">+ カートに追加</button>
                                </form>
                        @endforeach
                    </ul>
                    <a href="" class="more-link">もっと見る ＞</a>
                </div>
            </section>
            <section class="home-main-content">
                <div class="home-main-content-wrap">
                    <h2>サービス</h2>
                    <ul class="home-main-content-product-list">
                        @foreach ($product_service as $product)
                            <li class="home-main-content-product-item">
                                <img alt="画像" src="https://img2.lancers.jp/portfolio/598448/1770412/895176994898f838de3b1e69b7f6c0c6a77eacb6a1f955e3d77667558a97d7ee/32420704_400_0.jpg" />
                                <p class="name">{{ $product->name }}</p>
                                <p class="price">{{ $product->price }}円</p>
                                <button>+ カートに追加</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    </main>
</x-user.common>
