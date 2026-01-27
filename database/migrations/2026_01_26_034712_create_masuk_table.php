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
        Schema::create('masuk', function (Blueprint $table) {
            $table->id();

            // foreign key ke tabel anggotas
            $table->foreignId('anggota_id')->constrained('anggotas')->onDelete('cascade');

            // foreign key ke tabel barangs
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');

            $table->integer('jumlah_masuk')->default(1);
            $table->date('tanggal_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuk');
    }
};
