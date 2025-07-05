<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
    use HasFactory;

    protected $table = "nhap_khos";

    protected $fillable = [
        'id_dai_ly',
        'id_san_pham',
        'ten_san_pham',
        'so_luong',
        'don_gia',
        'thanh_tien',
        'is_nhap_kho',
    ];
}
