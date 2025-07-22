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
        Schema::create('wil_kel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kec_id')->constrained('wil_kec')->onDelete('cascade');
            $table->string('kel_kode', 4)->unique();
            $table->string('kel_nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wil_kel');
    }
};
