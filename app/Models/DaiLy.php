<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DaiLy extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'dai_lys';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'so_dien_thoai',
        'ngay_sinh',
        'password',
        'ten_doanh_nghiep',
        'ma_so_thue',
        'dia_chi_kinh_doanh',
        'is_vip',
        'is_active',
        'is_block',
        'hash_active',
        'hash_reset',
    ];
}
