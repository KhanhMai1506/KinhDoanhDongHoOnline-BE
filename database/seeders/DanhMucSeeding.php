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
        DB::table('danh_mucs')->insert([
            ['ten_danh_muc' => 'Đồng Hồ Nam', 'slug_danh_muc' => 'dong-ho-nam', 'icon_danh_muc' => '<i class="fa-solid fa-person"></i>', 'id_cha' => null, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Đồng Hồ Nữ', 'slug_danh_muc' => 'dong-ho-nu', 'icon_danh_muc' => '<i class="fa-solid fa-person-dress"></i>', 'id_cha' => null, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Đồng Hồ Cặp Đôi', 'slug_danh_muc' => 'dong-ho-cap-doi', 'icon_danh_muc' => '<img src="https://icons.iconarchive.com/icons/icons8/windows-8/24/Time-Date-icon.png"
                                                                                                            width="24" height="24" style="filter: grayscale(100%); opacity: 0.7;">', 'id_cha' => null, 'tinh_trang'=> 1],

            ['ten_danh_muc' => 'Casio', 'slug_danh_muc' => 'casio-nam', 'icon_danh_muc' => null, 'id_cha' => 1,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Seiko', 'slug_danh_muc' => 'seiko-nam', 'icon_danh_muc' => null, 'id_cha' => 1,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Orient', 'slug_danh_muc' => 'orient-nam', 'icon_danh_muc' => null, 'id_cha' => 1,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Citizen', 'slug_danh_muc' => 'citizen-nam', 'icon_danh_muc' => null, 'id_cha' => 1,'tinh_trang'=> 1],

            ['ten_danh_muc' => 'Casio', 'slug_danh_muc' => 'casio-nu', 'icon_danh_muc' => null, 'id_cha' => 2, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Seiko', 'slug_danh_muc' => 'seiko-nu', 'icon_danh_muc' => null, 'id_cha' => 2, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Citizen', 'slug_danh_muc' => 'citizen-nu', 'icon_danh_muc' => null, 'id_cha' => 2, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Orient', 'slug_danh_muc' => 'orient-nu', 'icon_danh_muc' => null, 'id_cha' => 2, 'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Saga', 'slug_danh_muc' => 'saga-nu', 'icon_danh_muc' => null, 'id_cha' => 2, 'tinh_trang'=> 1],

            ['ten_danh_muc' => 'Casio', 'slug_danh_muc' => 'casio-cap-doi', 'icon_danh_muc' => null, 'id_cha' => 3,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Seiko', 'slug_danh_muc' => 'seiko-cap-doi', 'icon_danh_muc' => null, 'id_cha' => 3,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Citizen', 'slug_danh_muc' => 'citizen-cap-doi', 'icon_danh_muc' => null, 'id_cha' => 3,'tinh_trang'=> 1],
            ['ten_danh_muc' => 'Doxa', 'slug_danh_muc' => 'doxa-cap-doi', 'icon_danh_muc' => null, 'id_cha' => 3,'tinh_trang'=> 1],
        ]);
    }
}
