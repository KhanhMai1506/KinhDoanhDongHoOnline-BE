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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('password');
            $table->string('ho_va_ten');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->integer('tinh_trang');
            $table->integer('is_master')->default(0);
            $table->integer('id_quyen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
