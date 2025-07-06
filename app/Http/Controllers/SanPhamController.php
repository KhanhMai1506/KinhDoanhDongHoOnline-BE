<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function getDataNoiBat()
    {
        $data = SanPham::where('is_noi_bat', 1)->take(4)->get();
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }

    public function getDataFlashSale()
    {
        $data = SanPham::where('is_flash_sale', 1)->take(4)->get();
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
}
