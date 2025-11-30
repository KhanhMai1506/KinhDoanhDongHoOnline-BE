<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_danh_muc')->nullable(); // Liên kết danh mục
            $table->string('ten_san_pham');
            $table->integer('so_luong')->default(0);
            $table->text('hinh_anh');
            $table->integer('tinh_trang')->default(1); // 1: còn hàng
            $table->longText('mo_ta_ngan')->nullable();
            $table->integer('gia_ban');
            $table->integer('phan_tram')->nullable();
            $table->integer('gia_khuyen_mai')->nullable();
            $table->integer('is_noi_bat')->default(0);
            $table->integer('is_flash_sale')->default(0);
            $table->timestamps();

            $table->foreign('id_danh_muc')->references('id')->on('danh_mucs')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
