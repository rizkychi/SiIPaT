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
        Schema::create('menara', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('ksf_id')->nullable()->index()->constrained('ksf')->nullOnDelete();
            $table->foreignId('kategori_id')->nullable()->index()->constrained('menara_kategori')->nullOnDelete();
            $table->foreignId('kel_id')->nullable()->constrained('wil_kel')->nullOnDelete();
            $table->foreignId('kec_id')->nullable()->constrained('wil_kec')->nullOnDelete();
            $table->string('site_id')->unique()->nullable();
            $table->string('site_id_kominfo')->unique()->nullable();
            $table->string('site_name')->nullable();
            $table->string('alamat')->nullable()->index();
            $table->string('provider')->nullable()->index();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->double('tinggi_dari_tumpuan', 5, 2)->nullable();
            $table->double('tinggi_dari_tanah', 5, 2)->nullable();
            $table->string('status_tanah')->nullable();
            $table->string('no_imb')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menara');
    }
};
