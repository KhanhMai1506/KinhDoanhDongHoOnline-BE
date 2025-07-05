<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_hangs';

    protected $fillable = [
        'id_san_pham',
        'id_khach_hang',
        'id_dai_ly',
        'id_don_hang',
        'is_gio_hang',
        'don_gia',
        'so_luong',
        'thanh_tien',
        'ten_san_pham',
        'ghi_chu',
        'tinh_trang'
    ];

    CONST DA_DAT_HANG       = 0;
    CONST DANG_XU_LY        = 1;
    CONST DANG_VAN_CHUYEN   = 2;
    CONST DA_GIAO           = 3;
    CONST DA_HUY            = 4;
}
