<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminDangNhapRequest;
use App\Http\Requests\AdminDoiMatKhau;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dangNhap(AdminDangNhapRequest $request)
    {
        $check  =   Auth::guard('admin')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if ($check) {
            // Lấy thông tin tài khoản đã đăng nhập thành công
            $admin  =   Auth::guard('admin')->user(); // Lấy được thông tin nhân viên đã đăng nhập

            return response()->json([
                'status'    => true,
                'message'   => "Đã đăng nhập thành công!",
                'token'     => $admin->createToken('token_admin')->plainTextToken,
                'ten_admin'    => $admin->ho_va_ten
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Tài khoản hoặc mật khẩu không đúng!",
            ]);
        }
    }

    public function logout(Request $request)
    {
        $admin   = Auth::guard('sanctum')->user();
        if ($admin && $admin instanceof \App\Models\Admin) {
            DB::table('personal_access_tokens')
                ->where('id', $admin->currentAccessToken()->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Bạn đã đăng xuất thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "bạn chưa đăng nhập hệ thống!"
            ]);
        }
    }

    public function getDataProfile()
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        return response()->json([
            'data'    =>  $tai_khoan_dang_dang_nhap
        ]);
    }

    public function kiemTraAdmin()
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();

        if($tai_khoan_dang_dang_nhap && $tai_khoan_dang_dang_nhap instanceof \App\Models\Admin) {
            return response()->json([
                'status'    =>  true
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Bạn cần đăng nhập hệ thống trước'
            ]);
        }
    }

    public function updateAvatar(Request $request)
    {
        $login = Auth::guard('sanctum')->user();
        if (!$login) {
            return response()->json([
                'status' => false,
                'message' => 'Chưa đăng nhập hoặc token không hợp lệ'
            ], 401);
        }

        $admin = Admin::find($login->id);
        if (!$admin) {
            return response()->json([
                'status' => false,
                'message' => 'Không tìm thấy tài khoản'
            ], 404);
        }

        if ($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('avatars', $fileName, 'public');

            // Lưu full URL để Vue load được
            $admin->hinh_anh = asset('storage/' . $path);
            $admin->save();
        }


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật avatar thành công!',
            'data' => $admin
        ]);
    }
}
