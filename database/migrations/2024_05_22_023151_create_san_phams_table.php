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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->integer('id_danh_muc')->nullable();
            $table->string('ten_san_pham');
            $table->integer('so_luong')->default(0);
            $table->text('hinh_anh');
            $table->integer('tinh_trang');
            $table->longText('mo_ta_ngan');
            $table->integer('gia_ban');
            $table->integer('is_noi_bat')->default(0);
            $table->integer('is_flash_sale')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
