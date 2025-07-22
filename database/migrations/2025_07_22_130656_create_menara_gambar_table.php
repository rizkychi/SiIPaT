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
        Schema::create('menara_gambar', function (Blueprint $table) {
            $table->id();
            $table->uuid('menara_id')->nullable();
            $table->uuid('perizinan_id')->nullable();
            $table->string('gambar_url')->nullable(); // URL gambar yang disimpan di Cloudinary
            $table->string('gambar_public_id')->nullable(); // Untuk keperluan delete di Cloudinary
            $table->timestamps();

            $table->foreign('menara_id')->references('id')->on('menara')->nullOnDelete();
            $table->foreign('perizinan_id')->references('id')->on('menara_perizinan')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menara_gambar');
    }
};
