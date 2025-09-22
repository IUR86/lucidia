<?php

namespace App\Services;

use App\Models\User;
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
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
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
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
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
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("チェックアウトを開始します", $line_items);

        $user = Auth::guard('user')->user();

        $checkout = $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'customer' => $user->stripe_id,
            'success_url' => route('user.shopping.complete') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('user.shopping.complete'),
        ]);

        return $checkout;
    }

    /**
     * 支払い情報を取得します
     *
     * @param string $payment_intent_id
     * @return \Stripe\PaymentIntent
     */
    public function findPaymentIntent(string $payment_intent_id): \Stripe\PaymentIntent
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("支払い情報:{$payment_intent_id}を取得");

        return $this->stripe->paymentIntents->retrieve($payment_intent_id);
    }

    /**
     * 支払い方法を取得します
     *
     * @param string $payment_method_id
     * @return \Stripe\PaymentMethod
     */
    public function findPaymentMethod(string $payment_method_id): \Stripe\PaymentMethod
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("支払い方法:{$payment_method_id}を取得");

        return $this->stripe->paymentMethods->retrieve($payment_method_id);
    }

    /**
     * カスタマーを作成します
     *
     * @param array $customer_data
     * @return \Stripe\Customer
     */
    public function createUser(array $customer_data): \Stripe\Customer
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("カスタマーを作成します", $customer_data);

        $customer = $this->stripe->customers->create($customer_data);

        return $customer;
    }

    /**
     * ユーザモデルからカスタマーを作成します
     *
     * @param User $user
     * @return void
     */
    public function createUserFromModel(User $user): void
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("ユーザモデル:{$user->id}からカスタマーを作成します", $user->toArray());

        $save_user_data = [];
        $save_user_data['name']     = $user->name;
        $save_user_data['email']    = $user->email;
        $save_user_data['metadata'] = $user->toArray();

        $stripe_user = $this->createUser($save_user_data);

        $user->stripe_id = $stripe_user->id;
        $user->save();
    }

    /**
     * 購入履歴の詳細データを取得
     *
     * @param string $session_id
     * @return \Stripe\Checkout\Session
     */
    public function findSession(string $session_id): \Stripe\Checkout\Session
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("購入履歴:{$session_id}を取得します");

        $session = $this->stripe->checkout->sessions->retrieve($session_id);

        return $session;
    }

    /**
     * 購入履歴を取得します
     *
     * @param string $stripe_customer_id
     * @return \Stripe\Collection<\Stripe\Checkout\Session>
     */
    public function getSessionsAll(string $stripe_customer_id): \Stripe\Collection
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("購入履歴を取得します");

        $sessions = $this->stripe->checkout->sessions->all([
            'customer' => $stripe_customer_id,
            'limit' => 100,
        ]);

        return $sessions;
    }

    /**
     * 購入商品履歴を取得します
     *
     * @param string $session_id
     * @param string $stripe_customer_id
     * @return \Stripe\Collection
     */
    public function getAllLineItems(string $session_id, string $stripe_customer_id): \Stripe\Collection
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        Log::info("購入商品履歴を取得します");

        $line_items = $this->stripe->checkout->sessions->allLineItems($session_id, [
            'limit' => 100,
        ]);

        return $line_items;
    }
}
