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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();

            // Khóa ngoại
            $table->unsignedBigInteger('id_san_pham');
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_don_hang')->nullable();

            // Thông tin
            $table->boolean('is_gio_hang')->default(1); // 1 = trong giỏ, 0 = đã đặt
            $table->decimal('don_gia', 15, 2)->default(0);
            $table->unsignedInteger('so_luong')->default(1);
            $table->decimal('thanh_tien', 15, 2)->default(0);
            $table->string('ghi_chu')->nullable();
            $table->integer('tinh_trang')->default(0)->comment('0: Chờ xác nhận, 1: Đang giao, 2: Hoàn tất, 3: Hủy');

            $table->timestamps();

            // Foreign keys
            $table->foreign('id_san_pham')->references('id')->on('san_phams')->onDelete('cascade');
            $table->foreign('id_khach_hang')->references('id')->on('khach_hangs')->onDelete('cascade');
            $table->foreign('id_don_hang')->references('id')->on('don_hangs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};
