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
        $khachHang = Auth::guard('sanctum')->user();
        $tongTien  = $request->tong_tien;
        $phuongThuc = $request->phuong_thuc; // 0: online (MoMo), 1: COD

        DB::beginTransaction();
        try {
            // Tạo đơn hàng
            $donHang = DonHang::create([
                'ma_don_hang'        => 'DH' . time(),
                'id_khach_hang'      => $khachHang->id,
                'id_dia_chi'         => $request->id_dia_chi ?? 1,
                'tong_tien'          => $request->tong_tien + $request->so_tien_giam,
                'ma_code_giam'       => $request->ma_code_giam,
                'so_tien_giam'       => $request->so_tien_giam,
                'so_tien_thanh_toan' => $tongTien,
                'is_thanh_toan'      => 0,
                'phuong_thuc'        => $phuongThuc,
            ]);

            // Nếu là "Mua Ngay"
            if ($request->is_mua_ngay) {
                $ct = ChiTietDonHang::create([
                    'id_san_pham'   => $request->id_san_pham,
                    'id_khach_hang' => $khachHang->id,
                    'id_don_hang'   => $donHang->id,
                    'is_gio_hang'   => 0,
                    'don_gia'       => $request->don_gia,
                    'so_luong'      => $request->so_luong,
                    'thanh_tien'    => $request->so_luong * $request->don_gia,
                    'tinh_trang'    => 0
                ]);

                $this->capNhatSoLuong($ct->id_san_pham, $ct->so_luong);
            } else {
                // Nếu từ giỏ hàng
                $idsSanPham = collect($request->san_phams)->pluck('id')->toArray();

                ChiTietDonHang::where('id_khach_hang', $khachHang->id)
                    ->where('is_gio_hang', 1)
                    ->whereIn('id', $idsSanPham)
                    ->update([
                        'id_don_hang' => $donHang->id,
                        'is_gio_hang' => 0,
                        'tinh_trang'  => 0
                    ]);
            }

            DB::commit();

            // Nếu COD → xác nhận luôn
            if ($phuongThuc == 1) {
                $donHang->is_thanh_toan = 0;
                $donHang->save();
                return response()->json([
                    'status'  => true,
                    'message' => 'Đặt hàng COD thành công'
                ]);
            }

            // Nếu MoMo → gọi API MoMo
            return $this->momo_payment(new Request([
                'total_momo' => $tongTien,
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

    public function momo_payment(Request $request)
    {
        $endpoint   = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529';
        $accessKey   = 'klm05TvNBzhg7h7j';
        $secretKey   = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo   = "Thanh toán MoMo";
        $amount      = $request->total_momo;

        // Dùng chính mã đơn hàng đã tạo
        $maDonHang   = $request->ma_don_hang;
        $orderId     = str_replace('DH', '', $maDonHang);

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
            $donHang = DonHang::where('ma_don_hang', 'DH' . $request->orderId)->first();
            if ($donHang) {
                $donHang->is_thanh_toan = 1;
                $donHang->save();
            }
            return redirect('http://localhost:5173/khach-hang/don-hang');
        }
        return redirect('/khach-hang/thanh-toan?error=1');
    }


    public function momo_ipn(Request $request)
    {
        if ($request->resultCode == 0) {
            $donHang = DonHang::where('ma_don_hang', 'DH' . $request->orderId)->first();
            if ($donHang) {
                $donHang->is_thanh_toan = 1;
                $donHang->save();
            }
        }
        return response()->json(['status' => 'ok']);
    }
}
