<?php

namespace Database\Seeders;

use App\Enum\ProductType;
use App\Models\Product;
use App\Services\StripeService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stripe_service = new StripeService();

        $product_create_data_list = [];
        $product_create_data_list[] = [
            'name' => 'CSVエクスポート',
            'price' => 300,
            'type' => ProductType::FUNCTION,
            'active' => true,
            'description' => '商品説明',
            'metadata' => [
                'type' => ProductType::FUNCTION->value
            ],
            'images' => [],
            'currency' => 'jpy',
        ];
        $product_create_data_list[] = [
            'name' => 'CSVインポート',
            'price' => 300,
            'type' => ProductType::FUNCTION,
            'active' => true,
            'description' => '商品説明',
            'metadata' => [
                'type' => ProductType::FUNCTION->value
            ],
            'images' => [],
            'currency' => 'jpy',
        ];
        $product_create_data_list[] = [
            'name' => 'お問い合わせ優先対応',
            'price' => 300,
            'type' => ProductType::SERVICE,
            'active' => true,
            'description' => '商品説明',
            'metadata' => [
                'type' => ProductType::SERVICE->value
            ],
            'images' => [],
            'currency' => 'jpy',
        ];

        foreach ($product_create_data_list as $product_create_data) {
            $stripe_product         = $stripe_service->createProduct($product_create_data);
            $stripe_product_price   = $stripe_service->createProductPrice($stripe_product->id, $product_create_data);

            $product = new Product();
            $product->fill($product_create_data);
            $product->code              = Str::uuid();
            $product->stripe_product_id = $stripe_product->id;
            $product->stripe_price_id   = $stripe_product_price->id;
            $product->metadata          = json_encode($product_create_data['metadata']);
            $product->images            = json_encode($product_create_data['images']);
            $product->save();
        }
    }
}
