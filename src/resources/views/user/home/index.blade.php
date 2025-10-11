<x-user.common :meta_service="$meta_service">
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
                            <x-user.product.item :product="$product" />
                        @endforeach
                    </ul>
                    <a href="" class="more-link">もっと見る ></a>
                </div>
            </section>
        </div>
    </main>
</x-user.common>
