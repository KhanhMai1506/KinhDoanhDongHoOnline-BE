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
        Schema::create('danh_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_danh_muc');
            $table->string('slug_danh_muc');
            $table->text('icon_danh_muc')->nullable();
            $table->unsignedBigInteger('id_cha')->nullable(); // Nếu là danh mục con
            $table->integer('tinh_trang');
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('id_cha')->references('id')->on('danh_mucs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_mucs');
    }
};
