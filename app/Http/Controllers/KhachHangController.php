<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Http\Requests\KhachHangDangNhapRequest;
use App\Http\Requests\KhachHangDoiMatKhauRequest;
use App\Mail\MasterMail;
use App\Models\chi_tiet_phan_quyen;
use App\Models\ChiTietPhanQuyen;
use App\Models\khach_hang;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    public function logout(Request $request)
    {
        $khach_hang   = Auth::guard('sanctum')->user();
        if ($khach_hang && $khach_hang instanceof \App\Models\KhachHang) {
            DB::table('personal_access_tokens')
                ->where('id', $khach_hang->currentAccessToken()->id)->delete();
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

    public function logoutAll(Request $request)
    {
        $khach_hang   = Auth::guard('sanctum')->user();
        if ($khach_hang && $khach_hang instanceof \App\Models\KhachHang) {
            $ds_token = $khach_hang->tokens;
            foreach ($ds_token as $key => $value) {
                $value->delete();
            }
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

    public function dataKhachHang()
    {

        $id_chuc_nang = 28;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $data = KhachHang::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function kichHoatTaiKhoan(Request $request)
    {

        $id_chuc_nang = 29;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $khach_hang = KhachHang::where('id', $request->id)->first();

        if ($khach_hang) {
            if ($khach_hang->is_active == 0) {
                $khach_hang->is_active = 1;
                $khach_hang->save();

                return response()->json([
                    'status' => true,
                    'message' => "Đã kích hoạt tài khoản thành công!"
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function doiTrangThaiKhachHang(Request $request)
    {

        $id_chuc_nang = 30;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $khach_hang = KhachHang::where('id', $request->id)->first();

        if ($khach_hang) {
            $khach_hang->is_block = !$khach_hang->is_block;
            $khach_hang->save();

            return response()->json([
                'status' => true,
                'message' => "Đã đổi trạng thái tài khoản thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function updateTaiKhoan(Request $request)
    {

        $id_chuc_nang = 31;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $khach_hang = KhachHang::where('id', $request->id)->first();

        if ($khach_hang) {
            $khach_hang->update([
                'email'             => $request->email,
                'so_dien_thoai'     => $request->so_dien_thoai,
                'ho_va_ten'         => $request->ho_va_ten,
            ]);

            return response()->json([
                'status' => true,
                'message' => "Đã cập nhật tài khoản thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function deleteTaiKhoan(Request $request)
    {

        $id_chuc_nang = 32;
        $login = Auth::guard('sanctum')->user();
        $id_quyen = $login->$id_chuc_nang;
        $check_quyen = ChiTietPhanQuyen::where('id_quyen', $id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();
        if ($check_quyen) {
            return response()->json([
                'data' => false,
                'message' => "bạn không có quyền thực hiện chức năng này!"
            ]);
        }
        $khach_hang = KhachHang::where('id', $request->id)->first();

        if ($khach_hang) {
            $khach_hang->delete();

            return response()->json([
                'status' => true,
                'message' => "Đã đổi trạng thái tài khoản thành công!"
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Có lỗi xảy ra!"
            ]);
        }
    }

    public function dangKy(KhachHangDangKyRequest $request)
    {
        $hash_active    = Str::uuid();

        $khachHang = KhachHang::create([
            'email'             => $request->email,
            'so_dien_thoai'     => $request->so_dien_thoai,
            'ho_va_ten'         => $request->ho_va_ten,
            'password'          => bcrypt($request->password),
            'hash_active'       => $hash_active
        ]);

        $data['ho_va_ten']  = $request->ho_va_ten;
        // $data['link']       = 'http://localhost:5173/khach-hang/kich-hoat/' . $hash_active;

        // Mail::to($request->email)->send(new MasterMail('Kích Hoạt Tài Khoản', 'dang_ky', $data));

        return response()->json([
            'status' => true,
            'message' => "Đăng Kí Tài Khoản Thành Công!"
        ]);
    }

    public function dangNhap(KhachHangDangNhapRequest $request)
    {
        $check  =   Auth::guard('khachhang')->attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ]);

        if ($check) {
            $khach_hang  =   Auth::guard('khachhang')->user();

            return response()->json([
                'status'    => true,
                'message'   => "Đã đăng nhập thành công!",
                'token'     => $khach_hang->createToken('token_khach_hang')->plainTextToken,
                'ten_kh'    => $khach_hang->ho_va_ten
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => "Tài khoản hoặc mật khẩu không đúng!",
            ]);
        }
    }

    public function kiemTraKhachHang()
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        if($tai_khoan_dang_dang_nhap && $tai_khoan_dang_dang_nhap instanceof \App\Models\KhachHang) {
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

    public function getDataProfile()
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        return response()->json([
            'data'    =>  $tai_khoan_dang_dang_nhap
        ]);
    }

    public function updateProfile(Request $request)
    {
        $tai_khoan_dang_dang_nhap   = Auth::guard('sanctum')->user();
        $check = KhachHang::where('id', $tai_khoan_dang_dang_nhap->id)->update([
            'email'         => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ho_va_ten'     => $request->ho_va_ten,
        ]);

        if($check) {
            return response()->json([
                'status'    =>  true,
                'message'   =>  'Cập nhật profile thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Cập nhật thất bại'
            ]);
        }
    }

    public function kichHoat(Request $request)
    {
        $khach_hang = KhachHang::where('hash_active', $request->id_khach_hang)->first();
        if ($khach_hang && $khach_hang->is_active == 0) {
            $khach_hang->is_active = 1;
            $khach_hang->save();

            return response()->json([
                'status'    =>  true,
                'message'   =>  'Đã kích hoạt tài khoản thành công'
            ]);
        } else {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'Liên kết không tồn tại'
            ]);
        }
    }

    public function doiMatKhau(KhachHangDoiMatKhauRequest $request) {
        $khach_hang = Auth::guard('sanctum')->user();

        if (!Hash::check($request->current_password, $khach_hang->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Mật khẩu cũ không chính xác'
            ], 400);
        }
        
        $khach_hang->password = Hash::make($request->new_password);
        $khach_hang->save();

        return response()->json([
            'status' => true,
            'message' => 'Đổi mật khẩu thành công'
        ]);
    }
}
