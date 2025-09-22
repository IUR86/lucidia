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
        Schema::table('users', function (Blueprint $table) {
            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->string('address1')->nullable()->comment('住所1');
            $table->string('address2')->nullable()->comment('住所2');
            $table->string('state')->nullable()->comment('州');
            $table->unsignedTinyInteger('prefecture_id')->comment('都道府県ID');
            $table->string('country')->nullable()->comment('国');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'postal_code',
                'address1',
                'address2',
                'state',
                'prefecture_id',
                'country',
            ]);
        });
    }
};
