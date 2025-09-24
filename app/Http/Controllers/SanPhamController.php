<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    public function getDataNoiBat()
    {
        $data = SanPham::where('is_noi_bat', 1)->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function getDataFlashSale()
    {
        $data = SanPham::where('is_flash_sale', 1)->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    public function laySanPhamTuDanhMuc($id_danh_muc)
    {
        $data   = SanPham::where('id_danh_muc', $id_danh_muc)->where('tinh_trang', 1)->get();
        if (count($data) > 0) {
            return response()->json([
                'status'  => true,
                'data'    => $data
            ]);
        } else {
            return response()->json([
                'status'     => false,
                'message'    => "Danh mục không có bất kỳ sản phẩm nào"
            ]);
        }
    }

    public function layThongTinSanPham($id)
    {
        $data   = SanPham::where('id', $id)->where('tinh_trang', 1)->first();
        if ($data) {
            return response()->json([
                'status'  => true,
                'data'    => $data,
            ]);
        } else {
            return response()->json([
                'status'     => false,
                'message'    => "Sản phẩm không tồn tại trong hệ thống"
            ]);
        }
    }

    public function laySanPhamDeXuat($id_san_pham)
    {
        $data = SanPham::where('id', '!=', $id_san_pham)
            ->where('tinh_trang', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return response()->json([
            'status' => true,
            'data'   => $data
        ]);
    }

    public function searchProducts(Request $request)
    {
        $noi_dung_tim = '%' . $request->noi_dung_tim . '%';
        $data   =  SanPham::where('ten_san_pham', 'like', $noi_dung_tim)
            ->orWhere('mo_ta_ngan', 'like', $noi_dung_tim)
            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }

    public function getData()
    {
        $login = Auth::guard('sanctum')->user();

        if ($login) {
            $data = SanPham::get();
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
            SanPham::create([
                'ten_san_pham'      => $request->ten_san_pham,
                'so_luong'          => $request->so_luong,
                'hinh_anh'          => $request->hinh_anh,
                'tinh_trang'        => $request->tinh_trang,
                'mo_ta_ngan'        => $request->mo_ta_ngan,
                'gia_ban'           => $request->gia_ban,
                'id_danh_muc'       => $request->id_danh_muc,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Đã thêm mới sản phẩm " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }

    public function update(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            SanPham::find($request->id)->update([
                'ten_san_pham'      => $request->ten_san_pham,
                'so_luong'          => $request->so_luong,
                'hinh_anh'          => $request->hinh_anh,
                'tinh_trang'        => $request->tinh_trang,
                'mo_ta_ngan'        => $request->mo_ta_ngan,
                'gia_ban'           => $request->gia_ban,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Đã sửa đổi thông tin " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            SanPham::find($request->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Đã xóa sản phẩm " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }

    public function chuyenTrangThaiBan(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $tinh_trang = $request->tinh_trang == 1 ? 0 : 1;
            SanPham::find($request->id)->update([
                'tinh_trang'    =>  $tinh_trang
            ]);

            return response()->json([
                'status' => true,
                'message' => "Đã đổi tình trạng sản phẩm " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }

    public function chuyenNoiBat(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $is_noi_bat = $request->is_noi_bat == 1 ? 0 : 1;
            SanPham::find($request->id)->update([
                'is_noi_bat'    =>  $is_noi_bat
            ]);

            return response()->json([
                'status' => true,
                'message' => "Đã đổi tình trạng sản phẩm " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }

    public function chuyenFlashSale(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $is_flash_sale = $request->is_flash_sale == 1 ? 0 : 1;

            $updateData = [
                'is_flash_sale' => $is_flash_sale
            ];

            if ($is_flash_sale == 1) {
                // 🔥 Random % giảm từ 10 - 50
                $tyLeGiam = rand(10, 50);

                $sanPham = SanPham::find($request->id);
                if ($sanPham) {
                    $giaKhuyenMai = $sanPham->gia_ban * (1 - $tyLeGiam / 100);

                    $updateData['phan_tram'] = $tyLeGiam;
                    $updateData['gia_khuyen_mai'] = $giaKhuyenMai;
                }
            } else {
                // Nếu tắt Flash Sale thì reset
                $updateData['phan_tram'] = null;
                $updateData['gia_khuyen_mai'] = null;
            }

            SanPham::find($request->id)->update($updateData);

            return response()->json([
                'status' => true,
                'message' => "Đã đổi tình trạng Flash Sale cho sản phẩm " . $request->ten_san_pham . " thành công.",
            ]);
        }
    }



    public function search(Request $request)
    {
        $noi_dung_tim = '%' . $request->noi_dung_tim . '%';
        $data   =  SanPham::where('ten_san_pham', 'like', $noi_dung_tim)
            ->orWhere('mo_ta_ngan', 'like', $noi_dung_tim)
            ->get();
        return response()->json([
            'data'  => $data
        ]);
    }
}
