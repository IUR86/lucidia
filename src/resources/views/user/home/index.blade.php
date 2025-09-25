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
                            <div class="card w-50">
                                <form class="api-action" action="{{ route('user.api.cart_item.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->price }}円</p>
                                        <button type="submit" class="btn btn-primary">+ カートに追加</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </ul>
                    <a href="" class="more-link">もっと見る ></a>
                </div>
            </section>
            {{-- <section class="home-main-content">
                <div class="home-main-content-wrap">
                    <h2>サービス</h2>
                    <ul class="home-main-content-product-list">
                        @foreach ($product_service as $product)
                            <div class="card w-50">
                                <form class="api-action" action="{{ route('user.api.cart_item.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ $product->price }}円</p>
                                        <button type="submit" class="btn btn-primary">+ カートに追加</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </section> --}}
        </div>
    </main>
</x-user.common>
