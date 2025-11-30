<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danh_mucs';

    protected $fillable = [
        'ten_danh_muc',
        'slug_danh_muc',
        'icon_danh_muc',
        'id_cha',
        'tinh_trang'
    ];

    public function children()
    {
        return $this->hasMany(DanhMuc::class, 'id_cha');
    }

    // 🔁 Hàm đệ quy lấy tất cả ID con cháu
    public static function getAllChildIds($id)
    {
        $ids = collect([$id]);
        $children = self::where('id_cha', $id)->get();

        foreach ($children as $child) {
            $ids = $ids->merge(self::getAllChildIds($child->id));
        }

        return $ids;
    }
}
