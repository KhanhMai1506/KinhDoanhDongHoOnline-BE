<?php

namespace App\Http\Controllers;

use App\Models\DiaChi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiaChiController extends Controller
{
    public function getData() 
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        $dia_chi = DiaChi::where('id_khach_hang', $tai_khoan_dang_dang_nhap->id)->get();
        return response()->json([
            'data'    =>  $dia_chi
        ]);
    }
    public function store(Request $request)
    {
        $tai_khoan_dang_dang_nhap = Auth::guard('sanctum')->user();
        DiaChi::create([
            'dia_chi'           => $request->dia_chi,
            'id_khach_hang'     => $tai_khoan_dang_dang_nhap->id,
            'ten_nguoi_nhan'    => $request->ten_nguoi_nhan,
            'so_dien_thoai'     => $request->so_dien_thoai,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => "Đã tạo mới địa chỉ ". $request->dia_chi . " thành công.",
        ]);
    }

    public function destroy(Request $request)
    {
        $tai_khoan_dang_dang_nhap = Auth::guard('sanctum')->user();
        $check = DiaChi::where('id', $request->id)->where('id_khach_hang', $tai_khoan_dang_dang_nhap->id)->delete();
        return response()->json([
            'status'    => $check,
            'message'   => 
                        $check == true ? "Đã xóa địa chỉ " . $request->dia_chi . " thành công." : "Xóa địa chỉ không thành công",
        ]);
    }
    public function update(Request $request)
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        $check = DiaChi::where('id', $request->id)->where('id_khach_hang', $tai_khoan_dang_dang_nhap->id)->update([
            'dia_chi'           => $request->dia_chi,
            'ten_nguoi_nhan'    => $request->ten_nguoi_nhan,
            'so_dien_thoai'     => $request->so_dien_thoai,
        ]);

        if($check) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Cập nhật địa chỉ thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Cập nhật thất bại'
            ]);
        }
    }
}
