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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_siswa_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->unsignedInteger('price')->default(200000);
            $table->enum('status', ['belum_bayar', 'menunggu', 'berhasil', 'gagal'])->default('belum_bayar');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
