<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\GioiTinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhMucController extends Controller
{
    public function getDataOpen()
    {
        $danhMucCha = DanhMuc::whereNull('id_cha')->get();
        $danhMucCon = DanhMuc::whereNotNull('id_cha')->get();

        return response()->json([
            'status' => true,
            'data' => $danhMucCha,
            'data1' => $danhMucCon,
        ]);
    }

    public function layIdTuSlug($slug)
    {
        $danhMuc = DanhMuc::where('slug_danh_muc', $slug)->first();

        if ($danhMuc) {
            return response()->json([
                'status' => true,
                'data' => $danhMuc,
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy danh mục.',
        ]);
    }

    public function getData()
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $data = DanhMuc::get();
            $danhMucCha = DanhMuc::whereNull('id_cha')->get();
            $danhMucCon = DanhMuc::whereNotNull('id_cha')->get();

            return response()->json([
                'status' => true,
                'data' => $data,
                'danhmuccha' => $danhMucCha,
                'danhmuccon' => $danhMucCon
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
            DanhMuc::create([
                'ten_danh_muc'  => $request->ten_danh_muc,
                'slug_danh_muc' => $request->slug_danh_muc,
                'icon_danh_muc' => $request->icon_danh_muc,
                'id_cha'        => $request->id_cha,
                'tinh_trang'    => $request->tinh_trang,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Đã tạo mới danh mục " . $request->ten_danh_muc . " thành công.",
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
            DanhMuc::find($request->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Đã xóa danh mục " . $request->ten_danh_muc . " thành công.",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }
    public function checkSlug(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $slug = $request->slug_danh_muc;
            $check = DanhMuc::where('slug_danh_muc', $slug)->first();
            if ($check) {
                return response()->json([
                    'status' => false,
                    'message' => "Slug này đã tồn tại.",
                ]);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => "Có thể thêm danh mục này.",
                ]);
            }
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
            DanhMuc::find($request->id)->update([
                'ten_danh_muc' => $request->ten_danh_muc,
                'slug_danh_muc' => $request->slug_danh_muc,
                'icon_danh_muc' => $request->icon_danh_muc,
                'tinh_trang' => $request->tinh_trang,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Đã update danh mục " . $request->ten_danh_muc . " thành công.",
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function changeStatus(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if ($login) {
            $danhMuc = DanhMuc::where('id', $request->id)->first();

            if ($danhMuc) {
                if ($danhMuc->tinh_trang == 0) {
                    $danhMuc->tinh_trang = 1;
                } else {
                    $danhMuc->tinh_trang = 0;
                }
                $danhMuc->save();

                return response()->json([
                    'status'    => true,
                    'message'   => "Đã cập nhật trạng thái danh mục thành công!"
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => "Danh mục không tồn tại!"
                ]);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
        ], 401);
    }

    public function getDanhMucCon($slug)
    {
        $dmCha = DanhMuc::where('slug_danh_muc', $slug)->first();

        if (!$dmCha) {
            return response()->json(['status' => false, 'message' => 'Danh mục cha không tồn tại']);
        }

        $dmCon = DanhMuc::where('id_cha', $dmCha->id)->get();

        return response()->json([
            'status' => true,
            'data'   => $dmCon,
        ]);
    }
}
