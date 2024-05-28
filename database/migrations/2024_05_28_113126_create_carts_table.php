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
        Schema::create('carts', function (Blueprint $table) {
            $table->id('id_cart');
            $table->unsignedBigInteger('id_cake');
            $table->unsignedBigInteger('id_user');
            $table->integer('quantity');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cake')->references('id_cake')->on('cakes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
