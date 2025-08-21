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
        'id_don_hang',
        'is_gio_hang',
        'don_gia',
        'so_luong',
        'thanh_tien',
        'ghi_chu',
        'tinh_trang'
    ];
}
