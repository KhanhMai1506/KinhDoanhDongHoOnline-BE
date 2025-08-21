<?php

namespace App\Http\Controllers;

use App\Models\GioHang;
use App\Models\SanPham;
use App\Models\ChiTietDonHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GioHangController extends Controller
{
    public function store(Request $request)
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $sanPham    = SanPham::find($request->id);
        // Có đầy đủ thông tin của sản phẩm cần thêm vào giỏ hàng
        $chiTiet    = GioHang::where('id_san_pham', $sanPham->id)
            ->where('id_khach_hang', $khachHang->id)
            ->first();
        if ($chiTiet) {
            $chiTiet->so_luong      =   $chiTiet->so_luong + $request->so_luong_mua;
            $chiTiet->thanh_tien    =   $chiTiet->so_luong * $chiTiet->don_gia;
            $chiTiet->save();
        } else {
            $chiTiet = GioHang::create([
                'id_san_pham'       =>  $sanPham->id,
                'id_khach_hang'     =>  $khachHang->id,
                'ten_khach_hang'    =>  $khachHang->ho_va_ten,
                'ten_san_pham'      =>  $sanPham->ten_san_pham,
                'so_luong'          =>  $request->so_luong_mua,
                'don_gia'           =>  $sanPham->gia_ban,
                'thanh_tien'        =>  $sanPham->gia_ban * $request->so_luong_mua,
                'tinh_trang'        =>  0,
            ]);
        }

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã thêm vào giỏ hàng thành công',
            'chi_tiet'  => $chiTiet
        ]);
    }

    public function getGioHang()
    {
        $khachHang = Auth::guard('sanctum')->user();

        $data = ChiTietDonHang::where('id_khach_hang', $khachHang->id)
            ->where('is_gio_hang', 1) // chỉ lấy những sp đang ở giỏ
            ->join('san_phams', 'san_phams.id', 'chi_tiet_don_hangs.id_san_pham')
            ->select(
                'chi_tiet_don_hangs.*',
                'san_phams.hinh_anh',
                'san_phams.ten_san_pham',
                'san_phams.gia_ban as don_gia'
            )
            ->get();

        return response()->json([
            'status'  => true,
            'data'    => $data,
        ]);
    }

    public function deleteGioHang(Request $request)
    {
        $khachHang = Auth::guard('sanctum')->user();

        GioHang::where('id', $request->id)
            ->where('id_khach_hang', $khachHang->id)
            ->delete();

        return response()->json([
            'status'    =>  true,
            'message'   =>  'Đã xoá sản phẩm trong giỏ hàng thành công'
        ]);
    }
}
