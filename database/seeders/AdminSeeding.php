<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->delete();
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            [
                'email'             =>  'dt@gmail.com',
                'password'          =>  bcrypt('123456'),
                'hinh_anh'          =>  'https://i.pinimg.com/736x/fa/7e/a6/fa7ea6ce4e90b794eef88dde93522dd6.jpg',
                'ho_va_ten'         =>  'Nguyễn Đức Trí',
                'so_dien_thoai'     =>  '0905784791',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
                'id_quyen'          =>  1,
            ],
        ]);
    }
}
