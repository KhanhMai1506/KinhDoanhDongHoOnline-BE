<?php

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\MaGiamGiaController;
use App\Http\Controllers\DonHangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirebaseAuthController;

Route::post('/khach-hang/doi-mat-khau', [KhachHangController::class, 'doiMatKhau']);
Route::post('/admin/doi-mat-khau', [AdminController::class, 'doiMatKhau']);


Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/khach-hang/quen-mat-khau', [KhachHangController::class, 'quenMK']);
Route::post('/khach-hang/doi-mat-khau-moi', [KhachHangController::class, 'doiMK']);
Route::post('/khach-hang/kich-hoat', [KhachHangController::class, 'kichHoat']);
Route::get('/khach-hang/profile/data', [KhachHangController::class, 'getDataProfile'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/profile/update', [KhachHangController::class, 'updateProfile'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/profile/update-avatar', [KhachHangController::class, 'updateAvatar'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/dia-chi/data', [DiaChiController::class, 'getData'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/create', [DiaChiController::class, 'store'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/update', [DiaChiController::class, 'update'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/dia-chi/delete', [DiaChiController::class, 'destroy'])->middleware("KhachHangMiddle");
Route::get('/kiem-tra-khach-hang', [KhachHangController::class, 'kiemTraKhachHang']);

Route::post('/khach-hang/dang-xuat', [KhachHangController::class, 'logout']);
Route::post('/khach-hang/dang-xuat-all', [KhachHangController::class, 'logoutAll']);
Route::post('/khach-hang/gio-hang/create', [ChiTietDonHangController::class, 'store'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/gio-hang/data', [ChiTietDonHangController::class, 'getGioHang'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/gio-hang/delete', [ChiTietDonHangController::class, 'deleteGioHang'])->middleware("KhachHangMiddle");
Route::post('/khach-hang/gio-hang/update', [ChiTietDonHangController::class, 'updateGioHang'])->middleware("KhachHangMiddle");

Route::post('/khach-hang/don-hang/create', [DonHangController::class, 'store'])->middleware("KhachHangMiddle");
Route::put('/khach-hang/huy-don-hang/{id}', [DonHangController::class, 'huyDonHang'])->middleware("KhachHangMiddle");
Route::get('/khach-hang/lich-su-don-hang', [DonHangController::class, 'getDataLS'])->middleware("KhachHangMiddle");

Route::post('/khach-hang/thanh-toan', [PaymentController::class, 'thanhToan'])->middleware("KhachHangMiddle");
Route::post('/momo_payment', [PaymentController::class, 'momo_payment'])->middleware("KhachHangMiddle");
Route::middleware('KhachHangMiddleWare')->group(function () {
    Route::post('/payment/cod',   [PaymentController::class, 'codPayment']);
    Route::post('/payment/momo',  [PaymentController::class, 'momoPayment']);
    Route::post('/payment/momo/callback', [PaymentController::class, 'momoCallback']);
});

Route::get('/danh-muc/data-open', [DanhMucController::class, 'getDataOpen']);

Route::get('/san-pham/data-noi-bat', [SanPhamController::class, 'getDataNoiBat']);
Route::get('/san-pham/data-flash-sale', [SanPhamController::class, 'getDataFlashSale']);

Route::get('/slug-to-id/{slug}', [DanhMucController::class, 'layIdTuSlug']);
Route::get('/san-pham-tu-danh-muc/{id}', [SanPhamController::class, 'laySanPhamTuDanhMuc']);

Route::get('/chi-tiet-san-pham/{id}', [SanPhamController::class, 'layThongTinSanPham']);
Route::get('/san-pham-de-xuat/{id_san_pham}', [SanPhamController::class, 'laySanPhamDeXuat']);

Route::post('/san-pham/tim-kiem', [SanPhamController::class, 'searchProducts']);

Route::get('/danh-gia/{id}', [DanhGiaController::class, 'layDanhGia']);
Route::post('/danh-gia/create', [DanhGiaController::class, 'taoDanhGia'])->middleware("KhachHangMiddle");
Route::get('/danh-gia/thong-ke/{id}', [DanhGiaController::class, 'thongKe']);
Route::get('/danh-gia/kiem-tra/{id_san_pham}', [DanhGiaController::class, 'kiemTraQuyen'])->middleware("KhachHangMiddle");

Route::get('/gio-hang/dem', [ChiTietDonHangController::class, 'demSoLuongGioHang']);

Route::post('/admin/dang-nhap', [AdminController::class, 'dangNhap']);
Route::post('/admin/dang-xuat', [AdminController::class, 'logout']);
Route::get('/admin/profile/data', [AdminController::class, 'getDataProfile'])->middleware("AdminMiddle");
Route::post('/admin/profile/update-avatar', [AdminController::class, 'updateAvatar'])->middleware("AdminMiddle");

Route::get('/kiem-tra-admin', [AdminController::class, 'kiemTraAdmin']);
Route::get('/san-pham', [SanPhamController::class, 'getData'])->middleware("AdminMiddle");
Route::post('/admin/san-pham/create', [SanPhamController::class, 'store'])->middleware("AdminMiddle");
Route::post('/admin/san-pham/delete', [SanPhamController::class, 'destroy'])->middleware("AdminMiddle");
Route::post('/admin/san-pham/update', [SanPhamController::class, 'update'])->middleware("AdminMiddle");
Route::post('/admin/san-pham/chuyen-trang-thai-ban', [SanPhamController::class, "chuyenTrangThaiBan"])->middleware("AdminMiddle");
Route::post('/admin/san-pham/chuyen-noi-bat', [SanPhamController::class, "chuyenNoiBat"])->middleware("AdminMiddle");
Route::post('/admin/san-pham/chuyen-flash-sale', [SanPhamController::class, "chuyenFlashSale"])->middleware("AdminMiddle");
Route::post('/admin/san-pham/tim-kiem', [SanPhamController::class, 'search'])->middleware("AdminMiddle");

Route::get('/danh-muc', [DanhMucController::class, 'getData'])->middleware("AdminMiddle");
Route::post('/admin/danh-muc/create', [DanhMucController::class, 'store'])->middleware("AdminMiddle");
Route::post('/admin/danh-muc/delete', [DanhMucController::class, 'destroy'])->middleware("AdminMiddle");
Route::post('/admin/danh-muc/checkSlug', [DanhMucController::class, 'checkSlug'])->middleware("AdminMiddle");
Route::post('/admin/danh-muc/update', [DanhMucController::class, 'update'])->middleware("AdminMiddle");
Route::post('/admin/danh-muc/doi-trang-thai', [DanhMucController::class, 'changeStatus'])->middleware("AdminMiddle");

Route::get('/admin/khach-hang/data', [KhachHangController::class, 'dataKhachHang'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/get-by-ids', [KhachHangController::class, 'getKhachHangByIds'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/kich-hoat-tai-khoan', [KhachHangController::class, 'kichHoatTaiKhoan'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/doi-trang-thai', [KhachHangController::class, 'doiTrangThaiKhachHang'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'updateTaiKhoan'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'deleteTaiKhoan'])->middleware("AdminMiddle");
Route::post('/admin/khach-hang/tim-kiem', [KhachHangController::class, 'search'])->middleware("AdminMiddle");

Route::post('/ma-giam-gia/kiem-tra',[MaGiamGiaController::class, 'kiemTraMaGiamGia']);
Route::get('/ma-giam-gia/data', [MaGiamGiaController::class, 'getDataOpen']);

Route::get('/admin/ma-giam-gia/data', [MaGiamGiaController::class, 'getData'])->middleware("AdminMiddle");
Route::post('/admin/ma-giam-gia/create', [MaGiamGiaController::class, 'store'])->middleware("AdminMiddle");
Route::post('/admin/ma-giam-gia/update', [MaGiamGiaController::class, 'update'])->middleware("AdminMiddle");
Route::post('/admin/ma-giam-gia/doi-trang-thai', [MaGiamGiaController::class, 'doiTrangThai'])->middleware("AdminMiddle");
Route::post('/admin/ma-giam-gia/delete', [MaGiamGiaController::class, 'destroy'])->middleware("AdminMiddle");

Route::get('/admin/lich-su-don-hang', [DonHangController::class, 'getDataLSAD'])->middleware("AdminMiddle");
Route::put('/admin/cap-nhat-tinh-trang/{id}', [DonHangController::class, 'capNhatTinhTrang'])->middleware("AdminMiddle");

Route::get('/admin/danh-gia/data', [DanhGiaController::class, 'layDanhGiaAdmin'])->middleware('AdminMiddle');
Route::post('/admin/danh-gia/{id}/phan-hoi', [DanhGiaController::class, 'phanHoi'])->middleware('AdminMiddle');
Route::post('/admin/danh-gia/delete', [DanhGiaController::class, 'destroy'])->middleware("AdminMiddle");
Route::post('/admin/danh-gia/tim-kiem', [DanhGiaController::class, 'timKiemDanhGia'])->middleware("AdminMiddle");

Route::get('/auth/google/redirect', [KhachHangController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [KhachHangController::class, 'handleGoogleCallback']);


Route::get('/firebase/custom-token', [FirebaseAuthController::class, 'createToken'])->middleware("KhachHangMiddle");




