<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            // 基本情報
            $table->id();
            $table->uuid('code')->unique()->comment('注文コード');
            $table->foreignId('user_id')->comment('ユーザID');
            // 顧客情報
            $table->string('customer_name')->nullable()->comment('顧客名');
            $table->string('customer_email')->nullable()->comment('顧客メール');
            $table->string('customer_phone')->nullable()->comment('顧客電話番号');
            // 支払い情報
            $table->string('currency', 3)->default('jpy')->comment('通貨');
            $table->unsignedInteger('amount_subtotal')->comment('税・送料を除いた商品合計');
            $table->unsignedInteger('amount_total')->comment('総合計（税・送料込み）');
            $table->string('payment_method')->nullable()->comment('支払い方法（card等）');
            $table->string('payment_card_brand')->nullable()->comment('カードブランド');
            $table->string('payment_card_last4')->nullable()->comment('カード番号下4桁');
            $table->string('payment_status')->default('pending')->comment('決済状態');
            // stripe情報
            $table->string('stripe_checkout_session_id')->nullable()->comment('Stripe CheckoutセッションID');
            $table->string('stripe_payment_intent_id')->nullable()->comment('Stripe PaymentIntent ID');
            $table->json('stripe_response')->nullable()->comment('Stripeレスポンス');
            // 日時
            $table->datetime('order_at')->comment('注文日時');
            $table->datetime('created_at')->comment('作成日時');
            $table->datetime('updated_at')->comment('更新日時');
            $table->datetime('deleted_at')->nullable()->comment('削除日時');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
