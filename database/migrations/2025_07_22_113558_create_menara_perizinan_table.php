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
        Schema::create('menara_perizinan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('menara_id')->nullable();
            $table->foreignId('ksf_id')->nullable()->constrained('ksf')->nullOnDelete();
            $table->foreignId('kategori_id')->nullable()->constrained('menara_kategori')->nullOnDelete();
            $table->foreignId('kel_id')->nullable()->constrained('wil_kel')->nullOnDelete();
            $table->foreignId('kec_id')->nullable()->constrained('wil_kec')->nullOnDelete();
            $table->string('no_daftar')->nullable()->index();
            $table->date('tgl_permohonan')->nullable()->index();
            $table->date('tgl_berita_acara')->nullable()->index();
            $table->string('no_berita_acara')->nullable()->index();
            $table->date('tgl_rekom')->nullable()->index();
            $table->string('no_daftar_simbg')->nullable()->index();
            $table->string('no_sk_pbg_slf')->nullable()->index();
            $table->string('no_rekom')->nullable()->index();
            $table->string('site_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('alamat')->nullable()->index();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat_berita_acara')->nullable();
            $table->string('lng_berita_acara')->nullable();
            $table->double('tinggi_dari_tumpuan', 5, 2)->nullable();
            $table->double('tinggi_dari_tanah', 5, 2)->nullable();

            $table->enum('tahap_perizinan', [
                'VERIFIKASI',
                'SURVEY',
                'RILIS_REKOM',
            ])->default('VERIFIKASI');

            $table->string('no_pemohon')->nullable();
            $table->string('nama_pemohon')->nullable();
            $table->string('no_imb')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('menara_id')->references('id')->on('menara')->nullOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menara_perizinan');
    }
};
