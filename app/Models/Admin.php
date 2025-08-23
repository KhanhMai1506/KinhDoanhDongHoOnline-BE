<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'admins';

    protected $fillable = [
        'email',
        'password',
        'ho_va_ten',
        'so_dien_thoai',
        'dia_chi',
        'tinh_trang',
        'is_master',
        'id_quyen',
    ];
}
