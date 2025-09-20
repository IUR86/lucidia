<x-admin.common>
    <style>
        /* グラフ領域のダミー */
        .chart {
            margin-top: 30px;
            background-color: white;
            height: 300px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #aaa;
            font-size: 18px;
        }
    </style>
    <main>
        <div class="main-content">
            <div class="cards">
                <div class="card">
                    <h3>契約数</h3>
                    <p>{{ $counterparty_count }}</p>
                </div>
                <div class="card">
                    <h3>店舗数</h3>
                    <p>{{ $salon_count }}</p>
                </div>
                <div class="card">
                    <h3>ユーザ数</h3>
                    <p>567</p>
                </div>
                <div class="card">
                    <h3>商品数</h3>
                    <p>5</p>
                </div>
            </div>
        </div>
    </main>
</x-admin.common>