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
            $table->string('ma_don_hang')->unique();

            // Khách hàng & địa chỉ
            $table->unsignedBigInteger('id_khach_hang');
            $table->unsignedBigInteger('id_dia_chi')->nullable();

            // Tiền tệ
            $table->decimal('tong_tien', 15, 2)->default(0);
            $table->string('ma_code_giam')->nullable();
            $table->decimal('so_tien_giam', 15, 2)->default(0);
            $table->decimal('so_tien_thanh_toan', 15, 2)->default(0);

            // Thanh toán
            $table->boolean('is_thanh_toan')->default(0); // 0 = chưa thanh toán
            $table->string('phuong_thuc')->default('COD'); // COD, MOMO, v.v

            $table->timestamps();

            // Khóa ngoại
            $table->foreign('id_khach_hang')->references('id')->on('khach_hangs')->onDelete('cascade');
            $table->foreign('id_dia_chi')->references('id')->on('dia_chis')->onDelete('set null');
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
