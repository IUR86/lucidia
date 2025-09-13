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
        Schema::create('counterparty', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('契約相手');
            $table->string('email', 255)->comment('メールアドレス');
            $table->string('password')->comment('パスワード');
            $table->string('subdomain', 6)->unique()->comment('サブドメイン');
            $table->integer('price')->comment('料金');
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
        Schema::dropIfExists('counterparty');
    }
};
