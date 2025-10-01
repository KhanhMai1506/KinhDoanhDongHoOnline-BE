<?php

namespace App\Http\Controllers;


use App\Mail\MasterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ChiTietDonHang;
use App\Models\DiaChi;
use App\Models\SanPham;
use App\Models\DonHang;

class DonHangController extends Controller
{
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $khachHang  = Auth::guard('sanctum')->user();
        $diaChi  = DiaChi::where('id', $request->id_dia_chi_khach_hang)
            ->where('id_khach_hang', $khachHang->id)
            ->first();
        if (!$diaChi) {
            return response()->json([
                'status' => false,
                'message' => "Địa chỉ chưa được chọn"
            ]);
        } else if (count($request->ds_mua_sp) < 1) {
            return response()->json([
                'status' => false,
                'message' => "Giỏ hàng chưa có sản phẩm"
            ]);
        } else if (!$request->filled('phuong_thuc')) {
            return response()->json([
                'status' => false,
                'message' => "Phương Thức Thanh Toán Chưa Được Chọn"
            ]);
        } else {
            $DonHang = DonHang::create([
                'ma_don_hang'           =>  '',
                'id_khach_hang'         =>  $khachHang->id,
                'id_dia_chi'            =>  $request->id_dia_chi,
                'tong_tien'             =>  $request->tong_tien,
                'ma_code_giam'          =>  $request->ma_code_giam,
                'so_tien_giam'          =>  $request->so_tien_giam,
                'so_tien_thanh_toan'    =>  $request->so_tien_thanh_toan,
                'phuong_thuc'           =>  $request->phuong_thuc,
            ]);
        }
        $DonHang->ma_don_hang    = 'DH' . $DonHang->id;
        $DonHang->save();

        $tienThanhToan    = 0;

        foreach ($request->list_san_pham_can_mua as $key => $value) {
            $chiTiet    = ChiTietDonHang::where('id', $value)
                ->where('id_khach_hang', $khachHang->id)
                ->where('is_gio_hang', 1)
                ->first();
            if ($chiTiet) {
                $sanPham = SanPham::where('id', $chiTiet->id_san_pham)->first();
                $sanPham->so_luong = $sanPham->so_luong - $chiTiet->so_luong;
                $sanPham->save();
                $chiTiet->is_gio_hang   = 0;
                $chiTiet->id_don_hang   = $DonHang->id;
                $chiTiet->save();
            }
        }
        if ($DonHang->phuong_thuc == 0) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Mua hàng thành công!'
            ]);
        } else {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Mua hàng thành công!'
            ]);
        }
    }

    public function huyDonHang($id)
    {
        $khachHang = Auth::guard('sanctum')->user();
        $chiTiet = ChiTietDonHang::where('id', $id)
            ->where('id_khach_hang', $khachHang->id)
            ->first();

        if (!$chiTiet) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy đơn hàng!',
            ], 404);
        }

        if ($chiTiet->tinh_trang == 4) {
            return response()->json([
                'status' => false,
                'message' => 'Đơn hàng đã hủy trước đó!',
            ], 400);
        }

        if ($chiTiet->tinh_trang >= 2) { // ví dụ: nếu đã vận chuyển thì không cho hủy
            return response()->json([
                'status' => false,
                'message' => 'Đơn hàng đang vận chuyển hoặc đã giao, không thể hủy!',
            ], 400);
        }

        $chiTiet->tinh_trang = 4; // Hủy đơn
        $chiTiet->save();

        return response()->json([
            'status' => true,
            'message' => 'Hủy đơn hàng thành công!',
            'data' => $chiTiet
        ]);
    }

    public function getDataLS()
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $data = ChiTietDonHang::where('chi_tiet_don_hangs.id_khach_hang', $khachHang->id)
            ->join('don_hangs', 'chi_tiet_don_hangs.id_don_hang', 'don_hangs.id')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('khach_hangs', 'chi_tiet_don_hangs.id_khach_hang', 'khach_hangs.id')
            ->join('dia_chis', 'don_hangs.id_dia_chi', 'dia_chis.id')
            ->select('don_hangs.ma_don_hang', 'don_hangs.is_thanh_toan', 'don_hangs.phuong_thuc', 'san_phams.ten_san_pham', ("san_phams.id as id_san_pham"), 'dia_chis.ten_nguoi_nhan', 'dia_chis.dia_chi', 'dia_chis.so_dien_thoai', 'chi_tiet_don_hangs.*')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function getDataLSAD()
    {
        $data = ChiTietDonHang::join('don_hangs', 'chi_tiet_don_hangs.id_don_hang', 'don_hangs.id')
            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
            ->join('khach_hangs', 'chi_tiet_don_hangs.id_khach_hang', 'khach_hangs.id')
            ->join('dia_chis', 'don_hangs.id_dia_chi', 'dia_chis.id')
            ->select('don_hangs.ma_don_hang', 'don_hangs.is_thanh_toan', 'don_hangs.phuong_thuc', 'dia_chis.ten_nguoi_nhan', 'dia_chis.dia_chi', 'dia_chis.so_dien_thoai', 'chi_tiet_don_hangs.*')
            ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function capNhatTinhTrang(Request $request, $id)
    {
        $chiTiet = ChiTietDonHang::find($id);

        if (!$chiTiet) {
            return response()->json([
                'status' => false,
                'message' => 'Chi tiết đơn hàng không tồn tại!'
            ], 404);
        }

        $request->validate([
            'tinh_trang' => 'required|integer|min:0|max:4',
        ]);

        // Cập nhật tình trạng cho chi tiết
        $chiTiet->tinh_trang = $request->tinh_trang;
        $chiTiet->save();

        // Nếu tình trạng = 3 thì cập nhật is_thanh_toan trong đơn hàng
        if ($request->tinh_trang == 3) {
            $donHang = $chiTiet->donHang;
            if ($donHang) {
                // 👉 Nếu muốn chỉ cần 1 chi tiết giao là cả đơn thanh toán
                $donHang->is_thanh_toan = 1;
                $donHang->save();

                // 👉 Nếu muốn tất cả chi tiết phải giao mới đánh dấu:
                /*
            $allChiTiet = $donHang->chiTietDonHangs; // hasMany trong DonHang
            $allDone = $allChiTiet->every(fn($ct) => $ct->tinh_trang == 3);
            if ($allDone) {
                $donHang->is_thanh_toan = 1;
                $donHang->save();
            }
            */
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật tình trạng thành công!',
            'data' => $chiTiet
        ]);
    }
}
