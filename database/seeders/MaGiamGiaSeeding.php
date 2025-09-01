<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaGiamGiaSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ma_giam_gias')->truncate();

        DB::table('ma_giam_gias')->insert([
            [
                'code' => 'DISCOUNT01',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-01',
                'ngay_ket_thuc' => '2025-10-30',
                'loai_giam_gia' => 1, // giảm tiền cố định
                'so_giam_gia' => 10000, // giảm 10k
                'so_tien_toi_da' => 0,
                'don_hang_toi_thieu' => 50000,
            ],
            [
                'code' => 'DISCOUNT02',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-15',
                'ngay_ket_thuc' => '2025-12-15',
                'loai_giam_gia' => 0, // giảm %
                'so_giam_gia' => 20, // 20%
                'so_tien_toi_da' => 20000, // tối đa 20k
                'don_hang_toi_thieu' => 100000,
            ],
            [
                'code' => 'DISCOUNT03',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-20',
                'ngay_ket_thuc' => '2025-12-20',
                'loai_giam_gia' => 1,
                'so_giam_gia' => 15000,
                'so_tien_toi_da' => 0,
                'don_hang_toi_thieu' => 75000,
            ],
            [
                'code' => 'DISCOUNT04',
                'tinh_trang' => 0,
                'ngay_bat_dau' => '2025-08-05',
                'ngay_ket_thuc' => '2025-12-25',
                'loai_giam_gia' => 0,
                'so_giam_gia' => 30, // 30%
                'so_tien_toi_da' => 30000,
                'don_hang_toi_thieu' => 150000,
            ],
            [
                'code' => 'DISCOUNT05',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-12',
                'ngay_ket_thuc' => '2025-12-18',
                'loai_giam_gia' => 1,
                'so_giam_gia' => 25000,
                'so_tien_toi_da' => 0,
                'don_hang_toi_thieu' => 125000,
            ],
            [
                'code' => 'DISCOUNT06',
                'tinh_trang' => 0,
                'ngay_bat_dau' => '2025-08-12',
                'ngay_ket_thuc' => '2025-12-20',
                'loai_giam_gia' => 0,
                'so_giam_gia' => 15,
                'so_tien_toi_da' => 50000,
                'don_hang_toi_thieu' => 175000,
            ],
            [
                'code' => 'DISCOUNT07',
                'tinh_trang' => 0,
                'ngay_bat_dau' => '2025-08-12',
                'ngay_ket_thuc' => '2025-12-21',
                'loai_giam_gia' => 1,
                'so_giam_gia' => 35000,
                'so_tien_toi_da' => 0,
                'don_hang_toi_thieu' => 175000,
            ],
            [
                'code' => 'DISCOUNT08',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-12',
                'ngay_ket_thuc' => '2025-12-22',
                'loai_giam_gia' => 0,
                'so_giam_gia' => 40,
                'so_tien_toi_da' => 40000,
                'don_hang_toi_thieu' => 200000,
            ],
            [
                'code' => 'DISCOUNT09',
                'tinh_trang' => 0,
                'ngay_bat_dau' => '2025-08-03',
                'ngay_ket_thuc' => '2025-12-30',
                'loai_giam_gia' => 1,
                'so_giam_gia' => 45000,
                'so_tien_toi_da' => 0,
                'don_hang_toi_thieu' => 225000,
            ],
            [
                'code' => 'DISCOUNT10',
                'tinh_trang' => 1,
                'ngay_bat_dau' => '2025-08-14',
                'ngay_ket_thuc' => '2025-12-30',
                'loai_giam_gia' => 0,
                'so_giam_gia' => 25,
                'so_tien_toi_da' => 55000,
                'don_hang_toi_thieu' => 275000,
            ],
        ]);
    }
}
