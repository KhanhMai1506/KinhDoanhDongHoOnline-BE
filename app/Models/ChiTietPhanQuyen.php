<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhanQuyen extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_phan_quyens';

    protected $fillable = [
        'id_quyen', 
        'id_chuc_nang'
    ];

}
