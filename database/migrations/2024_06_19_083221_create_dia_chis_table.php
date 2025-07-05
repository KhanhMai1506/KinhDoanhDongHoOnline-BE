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
        Schema::create('dia_chis', function (Blueprint $table) {
            $table->id();
            $table->string('dia_chi');
            $table->integer('id_khach_hang');
            $table->string('ten_nguoi_nhan');
            $table->string('so_dien_thoai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_chis');
    }
};
