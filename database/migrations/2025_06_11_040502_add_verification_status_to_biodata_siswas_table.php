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
        Schema::table('biodata_siswas', function (Blueprint $table) {
            // Kolom untuk status verifikasi
            $table->enum('verification_status', ['pending', 'verified', 'rejected'])->default('pending')->after('foto_formal');
            // Kolom untuk catatan verifikasi (misal: "ijazah tidak jelas")
            $table->text('verification_notes')->nullable()->after('verification_status');
            // Opsional: Siapa yang memverifikasi
            $table->foreignId('verified_by_user_id')->nullable()->constrained('users')->onDelete('set null')->after('verification_notes');
            // Opsional: Kapan diverifikasi
            $table->timestamp('verified_at')->nullable()->after('verified_by_user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_siswas', function (Blueprint $table) {
            $table->dropColumn([
                'verification_status',
                'verification_notes',
                'verified_by_user_id',
                'verified_at',
            ]);
        });
    }
};