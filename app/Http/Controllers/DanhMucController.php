<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    public function getData()
    {
        $data = DanhMuc::where('tinh_trang', 1)->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function layIdTuSlug($slug)
    {
        $danhMuc = DanhMuc::where('slug_danh_muc', $slug)->first();

        if ($danhMuc) {
            return response()->json([
                'status' => true,
                'data'   => ['id' => $danhMuc->id]
            ]);
        } else {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy danh mục.'
            ]);
        }
    }
}
