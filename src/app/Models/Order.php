<?php

namespace App\Models;

use App\Models\Traits\Booted\OrderAt;
use App\Models\Traits\Booted\UserId;
use App\Models\Traits\Booted\UuidCode;
use Illuminate\Database\Eloquent\Model;
use Stripe\Checkout\Session;
use Stripe\PaymentMethod;

/**
 * @property int $id
 * @property string $code 注文コード
 * @property int $user_id ユーザID
 * @property string|null $customer_name 顧客名
 * @property string|null $customer_email 顧客メール
 * @property string|null $customer_phone 顧客電話番号
 * @property string $currency 通貨
 * @property int $amount_subtotal 税・送料を除いた商品合計
 * @property int $amount_total 総合計（税・送料込み）
 * @property string|null $payment_method 支払い方法（card等）
 * @property string|null $payment_card_brand カードブランド
 * @property string|null $payment_card_last4 カード番号下4桁
 * @property string $payment_status 決済状態
 * @property string|null $stripe_checkout_session_id Stripe CheckoutセッションID
 * @property string|null $stripe_payment_intent_id Stripe PaymentIntent ID
 * @property array<array-key, mixed>|null $stripe_response Stripeレスポンス
 * @property string $order_at 注文日時
 * @property \Illuminate\Support\Carbon $created_at 作成日時
 * @property \Illuminate\Support\Carbon $updated_at 更新日時
 * @property string|null $deleted_at 削除日時
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAmountSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAmountTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCustomerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentCardBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentCardLast4($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStripeCheckoutSessionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStripePaymentIntentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStripeResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 * @mixin \Eloquent
 */
final class Order extends Model
{
    use UuidCode, UserId, OrderAt;

    /**
     * 複数代入可能な属性
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'currency',
        'amount_subtotal',
        'amount_total',
        'payment_method',
        'payment_card_brand',
        'payment_card_last4',
        'payment_status',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'stripe_response',
        'order_at',
    ];

    /**
     * キャストする属性の取得
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'stripe_response' => 'array',
        ];
    }

    /**
     * 注文完了の情報を更新
     *
     * @param Session $session
     * @param PaymentMethod $payment_method
     * @return void
     */
    public function updateOrderComplete(Session $session, PaymentMethod $payment_method): void
    {
        $this->order->customer_name = $session->customer_details->name;
        $this->order->customer_email = $session->customer_details->email;
        $this->order->customer_phone = $session->customer_details->phone;
        $this->order->payment_method = $payment_method->type;
        $this->order->payment_card_brand = $payment_method->card->brand;
        $this->order->payment_card_last4 = $payment_method->card->last4;
        $this->order->payment_status = $session->payment_status;
        $this->order->stripe_response = $session->toArray();
        $this->order->stripe_payment_intent_id  = $session->payment_intent;
        $this->order->save();
    }
}
