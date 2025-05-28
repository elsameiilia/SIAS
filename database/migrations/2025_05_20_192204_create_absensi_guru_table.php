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
        Schema::create('absensi_guru', function (Blueprint $table) {
            $table->id('absensi_guru_id');
            $table->foreignId('guru_id')->constrained('users', 'id'); // Asumsikan guru termasuk dalam tabel users
            $table->enum('status', ['hadir', 'sakit', 'izin', 'alpha']);
            $table->text('keterangan')->nullable();
            $table->string('bukti')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_guru');
    }
};
