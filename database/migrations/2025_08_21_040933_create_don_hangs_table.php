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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_don_hang');
            $table->integer('id_khach_hang');
            $table->integer('id_dia_chi');
            $table->integer('tong_tien');
            $table->string('ma_code_giam')->nullable();
            $table->integer('so_tien_giam')->default(0);
            $table->integer('so_tien_thanh_toan');
            $table->integer('is_thanh_toan')->default(0);
            $table->integer('phuong_thuc')->comment('0: thanh toán online, 1: thanh toán cod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
