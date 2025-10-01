<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // API chung cho Thanh toán (COD hoặc MoMo)
    public function thanhToan(Request $request)
    {
        $khachHang  = Auth::guard('sanctum')->user();
        $phuongThuc = $request->phuong_thuc; // 0: online (MoMo), 1: COD

        DB::beginTransaction();
        try {
            $tongTien = 0; // sẽ tự tính

            // Tạo đơn hàng trước (chưa có tổng tiền chính xác)
            $donHang = DonHang::create([
                'ma_don_hang'        => 'DH' . time(),
                'id_khach_hang'      => $khachHang->id,
                'id_dia_chi'         => $request->id_dia_chi ?? 1,
                'tong_tien'          => 0,
                'ma_code_giam'       => $request->ma_code_giam,
                'so_tien_giam'       => $request->so_tien_giam ?? 0,
                'so_tien_thanh_toan' => 0,
                'is_thanh_toan'      => 0,
                'phuong_thuc'        => $phuongThuc,
            ]);

            // Nếu là "Mua Ngay"
            if ($request->is_mua_ngay) {
                $sanPham = SanPham::findOrFail($request->id_san_pham);

                $giaKhuyenMai = $sanPham->gia_khuyen_mai ?? 0;
                $donGia = ($sanPham->is_flash_sale == 1 && $giaKhuyenMai > 0)
                    ? $giaKhuyenMai
                    : $sanPham->gia_ban;

                $thanhTien = $request->so_luong * $donGia;
                $tongTien += $thanhTien;

                ChiTietDonHang::create([
                    'id_san_pham'   => $sanPham->id,
                    'id_khach_hang' => $khachHang->id,
                    'id_don_hang'   => $donHang->id,
                    'is_gio_hang'   => 0,
                    'don_gia'       => $donGia,
                    'so_luong'      => $request->so_luong,
                    'thanh_tien'    => $thanhTien,
                    'tinh_trang'    => 0
                ]);

                $this->capNhatSoLuong($sanPham->id, $request->so_luong);
            } else {
                // Nếu từ giỏ hàng
                $idsSanPham = collect($request->san_phams)->pluck('id')->toArray();

                $chiTietGioHang = ChiTietDonHang::where('id_khach_hang', $khachHang->id)
                    ->where('is_gio_hang', 1)
                    ->whereIn('id', $idsSanPham)
                    ->get();

                foreach ($chiTietGioHang as $item) {
                    $sanPham = SanPham::find($item->id_san_pham);

                    $giaKhuyenMai = $sanPham->gia_khuyen_mai ?? 0;
                    $donGia = ($sanPham->is_flash_sale == 1 && $giaKhuyenMai > 0)
                        ? $giaKhuyenMai
                        : $sanPham->gia_ban;

                    $thanhTien = $item->so_luong * $donGia;
                    $tongTien += $thanhTien;

                    $item->update([
                        'id_don_hang' => $donHang->id,
                        'is_gio_hang' => 0,
                        'don_gia'     => $donGia,
                        'thanh_tien'  => $thanhTien,
                        'tinh_trang'  => 0
                    ]);

                    $this->capNhatSoLuong($sanPham->id, $item->so_luong);
                }
            }

            // Cập nhật lại tổng tiền đơn hàng
            $tongTienSauGiam = $tongTien - ($request->so_tien_giam ?? 0);
            $donHang->tong_tien = $tongTien;
            $donHang->so_tien_thanh_toan = $tongTienSauGiam;
            $donHang->save();

            DB::commit();

            // Nếu COD → xác nhận luôn
            if ($phuongThuc == 1) {
                return response()->json([
                    'status'  => true,
                    'message' => 'Đặt hàng COD thành công'
                ]);
            }

            // Nếu MoMo → gọi API MoMo
            return $this->momo_payment(new Request([
                'total_momo' => $tongTienSauGiam,
                'id_dia_chi' => $request->id_dia_chi ?? 1,
                'ma_don_hang' => $donHang->ma_don_hang
            ]));
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        }
    }


    // Hàm trừ số lượng sản phẩm
    private function capNhatSoLuong($idSanPham, $soLuongMua)
    {
        $sanPham = SanPham::find($idSanPham);
        if ($sanPham) {
            if ($sanPham->so_luong < $soLuongMua) {
                throw new \Exception("Sản phẩm {$sanPham->ten_san_pham} không đủ số lượng tồn");
            }
            $sanPham->so_luong -= $soLuongMua;
            $sanPham->save();
        }
    }

    // Thanh toán MoMo
    public function momo_payment(Request $request)
    {
        $endpoint   = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey   = 'klm05TvNBzhg7h7j';
        $secretKey   = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo   = "Thanh toán MoMo";
        $amount      = $request->total_momo;

        $orderId     = $request->ma_don_hang;
        $redirectUrl = url('/momo_return');
        $ipnUrl      = url('/momo_ipn');
        $extraData   = "";

        $requestId   = time() . "";
        $requestType = "captureWallet";

        $rawHash = "accessKey=" . $accessKey .
            "&amount=" . $amount .
            "&extraData=" . $extraData .
            "&ipnUrl=" . $ipnUrl .
            "&orderId=" . $orderId .
            "&orderInfo=" . $orderInfo .
            "&partnerCode=" . $partnerCode .
            "&redirectUrl=" . $redirectUrl .
            "&requestId=" . $requestId .
            "&requestType=" . $requestType;

        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId"     => "MomoTestStore",
            'requestId'   => $requestId,
            'amount'      => $amount,
            'orderId'     => $orderId,
            'orderInfo'   => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl'      => $ipnUrl,
            'lang'        => 'vi',
            'extraData'   => $extraData,
            'requestType' => $requestType,
            'signature'   => $signature
        ];

        $result = Http::post($endpoint, $data);
        $jsonResult = $result->json();

        return response()->json([
            'status' => true,
            'payUrl' => $jsonResult['payUrl'] ?? null
        ]);
    }

    public function momo_return(Request $request)
    {
        if ($request->resultCode == 0) {
            $donHang = DonHang::where('ma_don_hang', $request->orderId)->first();
            if ($donHang) {
                $donHang->is_thanh_toan = 1;
                $donHang->save();
                ChiTietDonHang::where('id_don_hang', $donHang->id)
                ->update(['tinh_trang' => 0]);
            }
            return redirect('http://localhost:5173/khach-hang/don-hang');
        }
        return redirect('/khach-hang/thanh-toan?error=1');
    }

    public function momo_ipn(Request $request)
    {
        if ($request->resultCode == 0) {
            $donHang = DonHang::where('ma_don_hang', $request->orderId)->first();
            if ($donHang) {
                $donHang->is_thanh_toan = 1;
                $donHang->save();
                ChiTietDonHang::where('id_don_hang', $donHang->id)
                ->update(['tinh_trang' => 0]);
            }
        }
        return response()->json(['status' => 'ok']);
    }
}
