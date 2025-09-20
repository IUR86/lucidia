<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->comment('コード');
            $table->string('stripe_product_id')->comment('stripe商品ID');
            $table->string('stripe_price_id')->comment('stripe料金ID');
            $table->string('name')->comment('商品名');
            $table->unsignedInteger('price')->comment('料金');
            $table->unsignedTinyInteger('type')->comment('タイプ');
            $table->boolean('active')->default(true)->comment('有効フラグ');
            $table->text('description')->nullable()->comment('商品説明');
            $table->json('metadata')->nullable()->comment('メタデータ');
            $table->json('images')->nullable()->comment('画像');
            $table->string('currency')->nullable()->comment('通貨');
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
        Schema::dropIfExists('product');
    }
};
