<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/khach-hang/kich-hoat', [KhachHangController::class, 'kichHoat']);
Route::get('/khach-hang/profile/data', [KhachHangController::class, 'getDataProfile'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/profile/update', [KhachHangController::class, 'updateProfile'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/profile/update-avatar', [KhachHangController::class, 'changeAvatar'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/dia-chi/data', [DiaChiController::class, 'getData'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/create', [DiaChiController::class, 'store'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/update', [DiaChiController::class, 'update'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/delete', [DiaChiController::class, 'destroy'])->middleware("KhachHangMiddle");
Route::get('/kiem-tra-khachhang', [KhachHangController::class, 'kiemTraKhachHang']);

Route::post('/khach-hang/dang-xuat', [KhachHangController::class, 'logout']);
Route::post('/khach-hang/dang-xuat-all', [KhachHangController::class, 'logoutAll']);
Route::post('/khach-hang/gio-hang/create', [GioHangController::class, 'store'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/gio-hang/data', [GioHangController::class, 'getGioHang'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/gio-hang/delete', [GioHangController::class, 'deleteGioHang'])->middleware("KhachHangMiddle");

Route::get('/danh-muc/data', [DanhMucController::class, 'getData']);

Route::get('/san-pham/data-noi-bat', [SanPhamController::class, 'getDataNoiBat']);
Route::get('/san-pham/data-flash-sale', [SanPhamController::class, 'getDataFlashSale']);

Route::get('/slug-to-id/{slug}', [DanhMucController::class, 'layIdTuSlug']);
Route::get('/san-pham-tu-danh-muc/{id}', [SanPhamController::class, 'laySanPhamTuDanhMuc']);

Route::get('/chi-tiet-san-pham/{id}', [SanPhamController::class, 'layThongTinSanPham']);
Route::get('/san-pham-de-xuat/{id_san_pham}', [SanPhamController::class, 'laySanPhamDeXuat']);

Route::post('/san-pham/tim-kiem', [SanPhamController::class, 'searchProducts']);
