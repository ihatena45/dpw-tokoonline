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
        Schema::create('sellerqris', function (Blueprint $table) {
            $table->id();

            $table->foreignId('seller_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('qris_image');

            $table->string('bank_name');

            $table->string('account_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellerqris');
    }
};
