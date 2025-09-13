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
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('counterparty_id')->comment('契約相手ID');
            $table->string('name', 100)->comment('名称');
            $table->text('description')->comment('説明');
            $table->unsignedTinyInteger('prefecture')->comment('都道府県');
            $table->string('postal_code', 10)->comment('郵便番号');
            $table->string('address1', 100)->comment('市区町村');
            $table->string('address2', 100)->nullable()->comment('番地・建物名など');
            $table->string('latitude')->nullable()->comment('緯度');
            $table->string('longitude')->nullable()->comment('経度');
            $table->string('tel', 15)->comment('電話番号');
            $table->string('email')->comment('メールアドレス');
            $table->time('opening_time')->comment('営業開始時間');
            $table->time('closing_time')->comment('営業終了時間');
            $table->string('regular_holiday')->nullable()->comment('定休日');
            $table->string('website_url')->nullable()->comment('店舗の公式URL');
            $table->unsignedTinyInteger('capacity')->comment('予約数');
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
        Schema::dropIfExists('salons');
    }
};
