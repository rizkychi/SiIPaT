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
        Schema::create('wil_kec', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kab_id')->constrained('wil_kab')->onDelete('cascade');
            $table->string('kec_kode', 4)->unique();
            $table->string('kec_nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wil_kec');
    }
};
