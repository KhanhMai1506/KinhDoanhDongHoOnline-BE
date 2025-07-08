<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_mucs')->delete();
        DB::table('danh_mucs')->truncate();
        DB::table('danh_mucs')->insert([
            [
                'ten_danh_muc'    => 'Đồng Hồ Nam',
                'icon_danh_muc'   => '<i class="fa-solid fa-person"></i>',
                'slug_danh_muc'   => 'dong-ho-nam',
                'tinh_trang'      => 1,
            ],
            [
                'ten_danh_muc'    => 'Đồng Hồ Nữ',
                'icon_danh_muc'   => '<i class="fa-solid fa-person-dress"></i>',
                'slug_danh_muc'   => 'dong-ho-nu',
                'tinh_trang'      => 1,
            ],
            [
                'ten_danh_muc'    => 'Đồng Hồ Trẻ Em',
                'icon_danh_muc'   => '<i class="fa-solid fa-baby"></i>',
                'slug_danh_muc'   => 'dong-ho-tre-em',
                'tinh_trang'      => 1,
            ],
            [
                'ten_danh_muc'    => 'Đồng Hồ Thông Minh',
                'icon_danh_muc'   => '<i class="fa-solid fa-clock"></i>',
                'slug_danh_muc'   => 'dong-ho-thong-minh',
                'tinh_trang'      => 1,
            ],
        ]);
    }
}
