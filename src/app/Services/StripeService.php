<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\StripeClient;

final class StripeService
{
    /**
     * @var StripeClient
     */
    private StripeClient $stripe;

    /**
     * 初期化処理
     *
     */
    public function __construct()
    {
        $this->stripe = new StripeClient(config('cashier.secret'));
    }

    /**
     * 商品を作成
     *
     * @param array $options
     * @return \Stripe\Product
     */
    public function createProduct($options = []): \Stripe\Product
    {
        Log::info('stripに商品を作成します', $options);

        $product_data = [
            'name'          => $options['name'],
            'active'        => $options['active'],
            'description'   => $options['description'],
            'metadata'      => $options['metadata'],
            'images'        => $options['images'],
        ];

        return $this->stripe->products->create($product_data);
    }

    /**
     * 商品料金を作成
     *
     * @param string $stripe_product_id
     * @param array $options
     * @return \Stripe\Price
     */
    public function createProductPrice(string $stripe_product_id, $options = []): \Stripe\Price
    {
        Log::info("stripに商品{$stripe_product_id}の料金を作成します", $options);

        $product_price_data = [
            'product'       => $stripe_product_id,
            'unit_amount'   => $options['price'],
            'currency'      => $options['currency'],
        ];

        return $this->stripe->prices->create($product_price_data);
    }

    /**
     * チェックアウトを行います
     *
     * @param array $line_items
     * @return \Stripe\Checkout\Session
     */
    public function checkout(array $line_items): \Stripe\Checkout\Session
    {
        Log::info("チェックアウトを開始します", $line_items);

        $user = Auth::guard('user')->user();

        $checkout = $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'customer_email' => $user->email,
            'success_url' => route('user.shopping.complete'),
            'cancel_url'  => route('user.shopping.complete'),
        ]);

        return $checkout;
    }

    /**
     * カスタマーを作成します
     *
     * @param array $customer_data
     * @return \Stripe\Customer
     */
    public function createUser(array $customer_data): \Stripe\Customer
    {
        Log::info("カスタマーを作成します", $customer_data);

        $customer = $this->stripe->customers->create($customer_data);

        return $customer;
    }
}
