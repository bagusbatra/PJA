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
        Schema::create('produk', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama_produk');
            $table->string('tipe_produk');
            $table->decimal('price', 12)->nullable();
            $table->string('gambar')->nullable();
            $table->text('keterangan');
            $table->string('upload_pdf')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
