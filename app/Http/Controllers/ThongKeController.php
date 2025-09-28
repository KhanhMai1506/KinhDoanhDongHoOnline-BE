<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function thongKe1(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $data = DanhMuc::join('san_phams', 'danh_mucs.id', 'san_phams.id_danh_muc')
                ->whereDate('san_phams.created_at', ">=", $request->tu_ngay)
                ->whereDate('san_phams.created_at', "<=", $request->den_ngay)
                ->select('danh_mucs.ten_danh_muc', DB::raw("sum(san_phams.so_luong) as so_luong"))
                ->groupBy('danh_mucs.ten_danh_muc')
                ->get();
            $array_ten_danh_muc   = [];
            $array_tong_so_luong   = [];

            foreach ($data as $key => $value) {
                array_push($array_ten_danh_muc, $value->ten_danh_muc);
                array_push($array_tong_so_luong, $value->so_luong);
            }
            return response()->json([
                'data'                      =>  $data,
                'array_ten_danh_muc'        => $array_ten_danh_muc,
                'array_tong_so_luong'       => $array_tong_so_luong,
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }
    public function thongKeDaBan(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $data = DB::table('chi_tiet_don_hangs')
                ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', '=', 'san_phams.id')
                ->join('danh_mucs', 'san_phams.id_danh_muc', '=', 'danh_mucs.id')
                ->where('chi_tiet_don_hangs.is_gio_hang', 0)   // không phải giỏ hàng
                ->where('chi_tiet_don_hangs.tinh_trang', 3)    // đơn giao thành công
                ->whereDate('chi_tiet_don_hangs.created_at', '>=', $request->tu_ngay)
                ->whereDate('chi_tiet_don_hangs.created_at', '<=', $request->den_ngay)
                ->select(
                    'danh_mucs.ten_danh_muc',
                    DB::raw('SUM(chi_tiet_don_hangs.so_luong) as so_luong')
                )
                ->groupBy('danh_mucs.ten_danh_muc')
                ->get();

            $array_ten_danh_muc   = [];
            $array_so_luong = [];

            foreach ($data as $value) {
                $array_ten_danh_muc[]   = $value->ten_danh_muc;
                $array_so_luong[] = $value->so_luong;
            }

            return response()->json([
                'data'               => $data,
                'array_ten_danh_muc' => $array_ten_danh_muc,
                'array_so_luong_ban' => $array_so_luong,
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }
}
