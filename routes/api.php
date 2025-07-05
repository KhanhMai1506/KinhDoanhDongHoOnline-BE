<?php

use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\KhachHangController;
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