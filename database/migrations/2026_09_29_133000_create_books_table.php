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
    Schema::create('books', function (Blueprint $table) {
        $table->id(); // Ini akan menjadi ID
        $table->string('title'); // Untuk judul
        $table->string('author'); // Untuk penulis
        $table->year('year'); // Untuk tahun terbit
        $table->integer('stock'); // Untuk stok
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
