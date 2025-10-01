<?php

namespace App\Http\Controllers;

use App\Models\MaGiamGia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaGiamGiaController extends Controller
{
    public function getDataOpen()
    {
        $data = MaGiamGia::where('tinh_trang', 1)
            ->whereDate('ngay_bat_dau', "<=", Carbon::today())
            ->whereDate('ngay_ket_thuc', ">=", Carbon::today())
            ->get();

        return response()->json([
            'data'      => $data
        ]);
    }

    public function kiemTraMaGiamGia(Request $request)
    {
        $maGiamGia = MaGiamGia::where('code', $request->code)
            ->whereDate('ngay_bat_dau', "<=", Carbon::today())
            ->whereDate('ngay_ket_thuc', ">=", Carbon::today())
            ->where('tinh_trang', 1)
            ->first();
        if ($maGiamGia) {
            return response()->json([
                'status' => true,
                'coupon' => $maGiamGia,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Mã giảm giá đã hết hạn.",
            ]);
        }
    }

    public function getData()
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $data = MaGiamGia::get();

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function store(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            MaGiamGia::create($request->all());
            return response()->json([
                'status' => true,
                'message' => "Đã tạo mới mã giảm giá " . $request->code . " thành công.",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function update(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            MaGiamGia::where('id', $request->id)->update([
                'code'                  => $request->code,
                'tinh_trang'            => $request->tinh_trang,
                'ngay_bat_dau'          => $request->ngay_bat_dau,
                'ngay_ket_thuc'         => $request->ngay_ket_thuc,
                'loai_giam_gia'         => $request->loai_giam_gia,
                'so_giam_gia'           => $request->so_giam_gia,
                'so_tien_toi_da'        => $request->so_tien_toi_da,
                'don_hang_toi_thieu'    => $request->don_hang_toi_thieu,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật mã giảm giá " . $request->ma_code . " thành công.",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function destroy(Request $request)
    {
        $login = Auth::guard('sanctum')->user();

        if ($login) {
            MaGiamGia::where('id', $request->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Đã xóa mã giảm giá " . $request->ma_code . " thành công.",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function doiTrangThai(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $maGiamGia = MaGiamGia::where('id', $request->id)->first();

            if ($maGiamGia) {
                if ($maGiamGia->tinh_trang == 0) {
                    $maGiamGia->tinh_trang = 1;
                } else {
                    $maGiamGia->tinh_trang = 0;
                }
                $maGiamGia->save();

                return response()->json([
                    'status'    => true,
                    'message'   => "Đã đổi trạng thái mã giảm giá thành công!"
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => "Mã giảm giá không tồn tại!"
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }
}
