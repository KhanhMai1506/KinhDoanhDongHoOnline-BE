<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'gio_hangs';

    protected $fillable = [
        'id_san_pham',
        'id_khach_hang',
        'ten_khach_hang',
        'ten_khach_hang',
        'so_luong',
        'ten_san_pham',
        'don_gia',
        'thanh_tien',
        'ghi_chu',
        'tinh_trang',
    ];
}
