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
        Schema::create('cakes', function (Blueprint $table) {
            $table->id('id_cake');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_cake');
            $table->string('deskripsi_cake');
            $table->bigInteger('harga_cake');
            $table->string('gambar_cake');
            $table->tinyInteger('status')->default(1);
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cakes');
    }
};
