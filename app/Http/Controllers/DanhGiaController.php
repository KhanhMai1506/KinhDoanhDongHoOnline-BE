<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    public function layDanhGia($id_san_pham)
    {
        $data = DanhGia::where('id_san_pham', $id_san_pham)
            ->with('khachHang:id,ho_va_ten,hinh_anh')
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($item) {
                $item->ngay_danh_gia = Carbon::parse($item->created_at)->format('d-m-Y H:i');
                return $item;
            });

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function kiemTraQuyen($id_san_pham)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Chưa đăng nhập']);
        }

        $daMua = \App\Models\ChiTietDonHang::where('id_san_pham', $id_san_pham)
            ->where('id_khach_hang', $user->id)
            ->where('is_gio_hang', 0)
            ->where('tinh_trang', 1) // chỉ cần tình trạng đã xác nhận
            ->exists();

        return response()->json(['status' => $daMua]);
    }

    public function taoDanhGia(Request $request)
    {
        $request->validate([
            'id_san_pham' => 'required|exists:san_phams,id',
            'so_sao'      => 'required|integer|min:1|max:5',
            'noi_dung'    => 'required|string'
        ]);

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn cần đăng nhập để đánh giá.'
            ]);
        }

        // 🔍 Kiểm tra khách hàng đã mua sản phẩm này chưa
        $daMua = \App\Models\ChiTietDonHang::where('id_san_pham', $request->id_san_pham)
            ->where('id_khach_hang', $user->id)
            ->where('is_gio_hang', 0)
            ->where('tinh_trang', 1) // chỉ cần tình trạng đã xác nhận
            ->exists();

        if (!$daMua) {
            return response()->json([
                'status'  => false,
                'message' => 'Bạn chỉ có thể đánh giá khi đã mua sản phẩm này.'
            ]);
        }

        // ✅ Nếu đã mua → lưu đánh giá
        $danhGia = DanhGia::create([
            'id_san_pham'   => $request->id_san_pham,
            'id_khach_hang' => $user->id,
            'so_sao'        => $request->so_sao,
            'noi_dung'      => $request->noi_dung,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Đánh giá thành công!',
            'data'    => $danhGia
        ]);
    }

    public function thongKe($id_san_pham)
    {
        $danhGia = DanhGia::where('id_san_pham', $id_san_pham);

        $tong = $danhGia->count();
        $trung_binh = round($danhGia->avg('so_sao'), 1);

        $theo_sao = $danhGia->selectRaw('so_sao, COUNT(*) as so_luong')
            ->groupBy('so_sao')
            ->pluck('so_luong', 'so_sao');

        return response()->json([
            'status' => true,
            'tong' => $tong,
            'trung_binh' => $trung_binh,
            'theo_sao' => $theo_sao
        ]);
    }

    public function layDanhGiaAdmin()
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $data = DanhGia::with('khachHang:id,ho_va_ten,hinh_anh')
                ->orderBy('created_at', 'desc')
                ->get();

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

    public function phanHoi(Request $request, $id)
    {
        $request->validate([
            'phan_hoi' => 'required|string'
        ]);

        $login = Auth::guard('sanctum')->user();
        if (!$login) {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền phản hồi đánh giá.'
            ], 403);
        }

        $danhGia = DanhGia::find($id);
        if (!$danhGia) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy đánh giá.'
            ], 404);
        }

        $danhGia->phan_hoi = $request->phan_hoi;
        $danhGia->phan_hoi_at = Carbon::now();
        $danhGia->save();

        return response()->json([
            'status' => true,
            'message' => 'Phản hồi thành công!',
            'data' => $danhGia
        ]);
    }

    public function destroy(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $danh_gia = DanhGia::where('id', $request->id)->first();

            if ($danh_gia) {
                $danh_gia->delete();

                return response()->json([
                    'status' => true,
                    'message' => "Đã xóa đánh giá thành công!"
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Có lỗi xảy ra!"
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function timKiemDanhGia(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $keyword = $request->keyword;

            $data = DanhGia::whereHas('khachHang', function ($query) use ($keyword) {
                $query->where('ho_va_ten', 'like', '%' . $keyword . '%');
            })
                ->with('khachHang:id,ho_va_ten,hinh_anh')
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'status' => true,
                'data'   => $data
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }
}
