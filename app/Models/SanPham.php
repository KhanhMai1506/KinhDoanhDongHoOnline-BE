<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable = [
        'ten_san_pham',
        'so_luong',
        'hinh_anh',
        'tinh_trang',
        'mo_ta_ngan',
        'gia_ban',
        'phan_tram',
        'gia_khuyen_mai',
        'id_danh_muc',
        'is_noi_bat',
        'is_flash_sale',
    ];
}
