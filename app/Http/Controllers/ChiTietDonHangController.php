<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChiTietDonHangController extends Controller
{
    public function store(Request $request)
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $sanPham    = SanPham::find($request->id);

        $chiTiet = ChiTietDonHang::where('id_san_pham', $sanPham->id)
            ->where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->first();

        if ($chiTiet) {
            $chiTiet->so_luong   += $request->so_luong_mua;
            $chiTiet->thanh_tien  = $chiTiet->so_luong * $chiTiet->don_gia;
            $chiTiet->save();
        } else {
            $chiTiet = ChiTietDonHang::create([
                'id_san_pham'    => $sanPham->id,
                'id_khach_hang'  => $khachHang->id,
                'so_luong'       => $request->so_luong_mua,
                'don_gia'        => $sanPham->gia_ban,
                'thanh_tien'     => $sanPham->gia_ban * $request->so_luong_mua,
                'is_gio_hang'    => 1,
                'tinh_trang'     => 0,
            ]);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Đã thêm vào giỏ hàng thành công',
            'data'    => $chiTiet
        ]);
    }

    public function getGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();

        $data = ChiTietDonHang::where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.hinh_anh',
                'san_phams.ten_san_pham',
                'san_phams.gia_ban as don_gia'
            )
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data,
        ]);
    }

    // xoá 1 sản phẩm khỏi giỏ
    public function deleteGioHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();

        ChiTietDonHang::where('id', $request->id)
            ->where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Đã xoá sản phẩm trong giỏ hàng thành công'
        ]);
    }

    // khi đặt hàng thành công → clear giỏ
    public function clearGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();

        ChiTietDonHang::where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->update(['is_gio_hang' => 0]); // gắn vào đơn hàng thật

        return response()->json([
            'status'  => true,
            'message' => 'Đặt hàng thành công, giỏ đã được làm trống'
        ]);
    }

    public function demSoLuongGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();
        $soLuong = DB::table('chi_tiet_don_hangs')
            ->where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1)
            ->sum('so_luong');

        return response()->json([
            'status' => true,
            'so_luong' => $soLuong
        ]);
    }
}
