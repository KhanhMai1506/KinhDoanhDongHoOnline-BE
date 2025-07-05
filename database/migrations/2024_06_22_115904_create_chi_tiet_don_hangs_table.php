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
            $table->integer('id_san_pham');
            $table->integer('id_khach_hang');
            $table->integer('id_dai_ly');
            $table->integer('id_don_hang')->nullable();
            $table->integer('is_gio_hang')->default(1);
            $table->double('don_gia');
            $table->double('so_luong');
            $table->double('thanh_tien');
            $table->string('ten_san_pham');
            $table->integer('tinh_trang');
            $table->timestamps();
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
