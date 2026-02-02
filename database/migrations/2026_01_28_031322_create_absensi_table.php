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
    Schema::create('absensi', function (Blueprint $table) {
        $table->id();
        $table->foreignId('anggota_rombel_id')->constrained('peserta_didik')->cascadeOnDelete();
        $table->date('tanggal');
        $table->time('jam_masuk')->nullable();
        $table->enum('metode',['qr','manual']);
        $table->enum('status',['hadir','sakit','izin','telat','alpha']);
        $table->string('keterangan')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
