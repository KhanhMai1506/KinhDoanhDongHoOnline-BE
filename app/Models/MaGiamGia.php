<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;

    protected $table = "ma_giam_gias";
    
    protected $fillable = [
        'code',
        'tinh_trang',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'loai_giam_gia',
        'so_giam_gia',
        'so_tien_toi_da',
        'don_hang_toi_thieu',
    ];
}
