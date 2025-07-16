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
        DB::table('khach_hangs')->truncate();
        DB::table('khach_hangs')->insert([
            [
                'hinh_anh'     =>   '',
                'ho_va_ten'     =>  'Nguyễn Đức Mạnh',
                'email'         =>  'dm@gmail.com',
                'so_dien_thoai' =>  '0453699217',
                'password' => Hash::make('123456'),
                'is_active'     =>  1,
            ],
        ]);
    }
}
