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
        Schema::create('nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dai_ly');
            $table->integer('id_san_pham');
            $table->string('ten_san_pham');
            $table->double('so_luong')->default(1);
            $table->integer('don_gia')->default(0);
            $table->double('thanh_tien')->default(0);
            $table->integer('is_nhap_kho')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhap_khos');
    }
};
