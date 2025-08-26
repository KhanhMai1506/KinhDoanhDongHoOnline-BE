<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;

    protected $table = 'danh_gias';

    protected $fillable = [
        'id_san_pham',
        'id_khach_hang',
        'so_sao',
        'noi_dung',
        'phan_hoi',
        'phan_hoi_at'
    ];

    // Quan hệ tới bảng khach_hangs
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'id_khach_hang', 'id');
    }

    // Quan hệ tới bảng san_phams (nếu cần)
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham', 'id');
    }
}
