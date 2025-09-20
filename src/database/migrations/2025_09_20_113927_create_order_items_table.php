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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete()->comment('注文ID');
            $table->foreignId('product_id')->constrained()->comment('商品ID');
            $table->string('product_name')->comment('商品名');
            $table->unsignedInteger('price')->comment('単価');
            $table->unsignedInteger('quantity')->comment('数量');
            $table->unsignedInteger('subtotal')->comment('小計');
            $table->json('stripe_product_data')->nullable()->comment('Stripeの商品情報(JSON)');
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
        Schema::dropIfExists('order_items');
    }
};
