<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhachHangSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('khach_hangs')->delete();
        // DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'hinh_anh'      =>   'https://i.pinimg.com/736x/fa/7e/a6/fa7ea6ce4e90b794eef88dde93522dd6.jpg',
                'ho_va_ten'     =>  'Nguyễn Đức Mạnh',
                'email'         =>  'dm@gmail.com',
                'so_dien_thoai' =>  '0453699217',
                'password'      =>  bcrypt('123456'),
                'is_active'     =>  1,
            ],
            [
                'hinh_anh'     =>   'https://i.pinimg.com/736x/fa/7e/a6/fa7ea6ce4e90b794eef88dde93522dd6.jpg',
                'ho_va_ten'     =>  'Doãn Khánh Mai',
                'email'         =>  'km@gmail.com',
                'so_dien_thoai' =>  '0920211217',
                'password'      =>  bcrypt('123456'),
                'is_active'     =>  1,
            ],
        ]);
    }
}
