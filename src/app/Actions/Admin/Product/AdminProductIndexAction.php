<?php

namespace App\Actions\Admin\Product;

use App\Models\Product;

final class AdminProductIndexAction
{
    /**
     * 商品一覧を取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $product = new Product();
        $product_paginate = $product->query()->paginate();

        return [
            'product_paginate' => $product_paginate
        ];
    }
}
