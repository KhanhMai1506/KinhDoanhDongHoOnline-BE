<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiaChiSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dia_chis')->delete();

        // DB::table('dia_chis')->truncate();

        DB::table('dia_chis')->insert([
            [
                'dia_chi'           =>  '202 Hà Huy Tập, Đà Nẵng',
                'ten_nguoi_nhan'    =>  'Đức Mạnh',
                'so_dien_thoai'     =>  '0857415456',
                'id_khach_hang'     =>  1,
            ],
            [
                'dia_chi'           =>  '32 Hùng Vương, Đà Nẵng',
                'ten_nguoi_nhan'    =>  'Đức Mạnh',
                'so_dien_thoai'     =>  '0857415456',
                'id_khach_hang'     =>  1,
            ],
        ]);
    }
}
