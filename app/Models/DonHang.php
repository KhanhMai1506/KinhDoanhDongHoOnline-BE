<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hangs';

    protected $fillable = [
        'ma_don_hang',
        'id_khach_hang',
        'id_dia_chi',
        'tong_tien',
        'ma_code_giam',
        'so_tien_giam',
        'so_tien_thanh_toan',
        'is_thanh_toan',
        'phuong_thuc',
    ];
}
