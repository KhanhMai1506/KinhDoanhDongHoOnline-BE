<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class KhachHang extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "khach_hangs";

    protected $fillable = [
        'hinh_anh',
        'email',
        'so_dien_thoai',
        'ho_va_ten',
        'password',
        'hash_active',
        'is_active',
        'is_block',
        'google_id'
    ];
}
