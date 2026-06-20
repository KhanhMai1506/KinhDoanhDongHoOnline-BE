# 🕐 Kinh Doanh Đồng Hồ Online — Backend API

Backend RESTful API cho hệ thống thương mại điện tử bán đồng hồ trực tuyến, xây dựng bằng **Laravel 11**.

---

## 📋 Mục lục

- [Giới thiệu](#-giới-thiệu)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Tính năng](#-tính-năng)
- [Cấu trúc dự án](#-cấu-trúc-dự-án)
- [Cơ sở dữ liệu](#-cơ-sở-dữ-liệu)
- [API Endpoints](#-api-endpoints)
- [Cài đặt & Chạy dự án](#-cài-đặt--chạy-dự-án)
- [Biến môi trường](#-biến-môi-trường)
- [Xác thực & Phân quyền](#-xác-thực--phân-quyền)

---

## 🌟 Giới thiệu

Dự án này là phần **Backend (API Server)** của hệ thống thương mại điện tử chuyên bán đồng hồ online. Hệ thống hỗ trợ hai vai trò chính:

- **Khách hàng**: Đăng ký, đăng nhập, mua sắm, quản lý đơn hàng, đánh giá sản phẩm.
- **Admin**: Quản lý sản phẩm, danh mục, đơn hàng, khách hàng, mã giảm giá và thống kê.

---

## 🛠 Công nghệ sử dụng

| Công nghệ | Phiên bản | Mô tả |
|---|---|---|
| PHP | ^8.2 | Ngôn ngữ lập trình |
| Laravel | ^11.0 | Framework chính |
| Laravel Sanctum | ^4.0 | Xác thực API bằng token |
| Laravel Socialite | ^5.23 | Đăng nhập OAuth (Google) |
| Firebase PHP SDK | ^7.22 | Tích hợp Firebase (chat realtime) |
| Pusher | ^7.2 | Broadcast realtime |
| MySQL / SQLite | — | Cơ sở dữ liệu |
| MoMo Payment | — | Cổng thanh toán trực tuyến |

---

## ✨ Tính năng

### 👤 Khách hàng
- Đăng ký tài khoản (gửi email kích hoạt)
- Đăng nhập bằng email/mật khẩu
- **Đăng nhập bằng Google** (OAuth2 qua Laravel Socialite)
- Quên mật khẩu / đặt lại mật khẩu qua email
- Cập nhật thông tin cá nhân & avatar
- Quản lý địa chỉ giao hàng
- Xem và tìm kiếm sản phẩm, lọc theo danh mục
- Thêm, cập nhật, xóa sản phẩm trong giỏ hàng
- Đặt hàng (từ giỏ hàng hoặc "Mua Ngay")
- Thanh toán **COD** hoặc **MoMo**
- Xem lịch sử đơn hàng, hủy đơn hàng
- Viết đánh giá sản phẩm
- Chat với admin (realtime qua Firebase)

### 🛡 Admin
- Đăng nhập / đăng xuất admin
- Quản lý sản phẩm (CRUD, đổi trạng thái bán, nổi bật, flash sale)
- Quản lý danh mục (cây danh mục đệ quy, CRUD, đổi trạng thái)
- Quản lý khách hàng (xem, cập nhật, khoá/mở tài khoản, xoá)
- Quản lý mã giảm giá (CRUD, đổi trạng thái)
- Quản lý đơn hàng (xem lịch sử, cập nhật tình trạng giao hàng)
- Quản lý đánh giá (xem, phản hồi, xoá)
- Thống kê doanh thu & sản phẩm đã bán

---

## 📁 Cấu trúc dự án

```
KinhDoanhDongHoOnline-BE/
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Các controller xử lý logic
│   │   │   ├── AdminController.php
│   │   │   ├── ChiTietDonHangController.php
│   │   │   ├── DanhGiaController.php
│   │   │   ├── DanhMucController.php
│   │   │   ├── DiaChiController.php
│   │   │   ├── DonHangController.php
│   │   │   ├── FirebaseAuthController.php
│   │   │   ├── KhachHangController.php
│   │   │   ├── MaGiamGiaController.php
│   │   │   ├── PaymentController.php
│   │   │   ├── SanPhamController.php
│   │   │   └── ThongKeController.php
│   │   ├── Middleware/
│   │   │   ├── AdminMiddleware.php      # Bảo vệ route admin
│   │   │   └── KhachHangMiddleware.php  # Bảo vệ route khách hàng
│   │   └── Requests/             # Form Request Validation
│   ├── Models/                   # Eloquent Models
│   │   ├── Admin.php
│   │   ├── Chat.php
│   │   ├── ChiTietDonHang.php
│   │   ├── DanhGia.php
│   │   ├── DanhMuc.php
│   │   ├── DiaChi.php
│   │   ├── DonHang.php
│   │   ├── KhachHang.php
│   │   ├── MaGiamGia.php
│   │   ├── SanPham.php
│   │   └── User.php
│   ├── Services/
│   │   └── FirebaseService.php   # Tích hợp Firebase
│   └── Mail/
│       └── MasterMail.php        # Template email
├── database/
│   ├── migrations/               # Migration tạo bảng CSDL
│   └── seeders/
├── routes/
│   └── api.php                   # Toàn bộ định nghĩa API route
└── .env.example                  # Mẫu biến môi trường
```

---

## 🗃 Cơ sở dữ liệu

| Bảng | Mô tả |
|---|---|
| `khach_hangs` | Thông tin khách hàng |
| `admins` | Thông tin quản trị viên |
| `dia_chis` | Địa chỉ giao hàng của khách |
| `danh_mucs` | Danh mục sản phẩm (hỗ trợ đệ quy cha-con) |
| `san_phams` | Thông tin sản phẩm (đồng hồ) |
| `don_hangs` | Đơn hàng |
| `chi_tiet_don_hangs` | Chi tiết đơn hàng & giỏ hàng |
| `ma_giam_gias` | Mã giảm giá |
| `danh_gias` | Đánh giá sản phẩm |
| `chats` | Tin nhắn chat giữa khách và admin |
| `personal_access_tokens` | Token xác thực (Sanctum) |

---

## 📡 API Endpoints

> Base URL: `http://localhost:8000/api`

### 🔓 Public (không cần xác thực)

| Method | Endpoint | Mô tả |
|---|---|---|
| `POST` | `/khach-hang/dang-ky` | Đăng ký tài khoản |
| `POST` | `/khach-hang/dang-nhap` | Đăng nhập |
| `POST` | `/khach-hang/quen-mat-khau` | Quên mật khẩu |
| `POST` | `/khach-hang/doi-mat-khau-moi` | Đặt lại mật khẩu |
| `POST` | `/khach-hang/kich-hoat` | Kích hoạt tài khoản qua email |
| `GET` | `/auth/google/redirect` | Đăng nhập Google |
| `GET` | `/auth/google/callback` | Callback sau đăng nhập Google |
| `POST` | `/admin/dang-nhap` | Đăng nhập admin |
| `GET` | `/danh-muc/data-open` | Lấy danh mục hiển thị |
| `GET` | `/danh-muc-con/{slug}` | Lấy danh mục con |
| `GET` | `/san-pham/data-noi-bat` | Sản phẩm nổi bật |
| `GET` | `/san-pham/data-flash-sale` | Sản phẩm flash sale |
| `GET` | `/chi-tiet-san-pham/{id}` | Chi tiết sản phẩm |
| `GET` | `/san-pham-tu-danh-muc/{slug}` | Sản phẩm theo danh mục |
| `POST` | `/san-pham/tim-kiem` | Tìm kiếm sản phẩm |
| `GET` | `/danh-gia/{id}` | Xem đánh giá sản phẩm |
| `POST` | `/ma-giam-gia/kiem-tra` | Kiểm tra mã giảm giá |

### 🔒 Khách hàng (yêu cầu `Authorization: Bearer <token>`)

| Method | Endpoint | Mô tả |
|---|---|---|
| `GET` | `/khach-hang/profile/data` | Xem thông tin cá nhân |
| `POST` | `/khach-hang/profile/update` | Cập nhật thông tin |
| `POST` | `/khach-hang/profile/update-avatar` | Cập nhật avatar |
| `POST` | `/khach-hang/doi-mat-khau` | Đổi mật khẩu |
| `POST` | `/khach-hang/dang-xuat` | Đăng xuất |
| `POST` | `/khach-hang/dang-xuat-all` | Đăng xuất tất cả thiết bị |
| `GET` | `/khach-hang/dia-chi/data` | Xem danh sách địa chỉ |
| `POST` | `/khach-hang/dia-chi/create` | Thêm địa chỉ |
| `POST` | `/khach-hang/dia-chi/update` | Sửa địa chỉ |
| `POST` | `/khach-hang/dia-chi/delete` | Xóa địa chỉ |
| `GET` | `/khach-hang/gio-hang/data` | Xem giỏ hàng |
| `POST` | `/khach-hang/gio-hang/create` | Thêm vào giỏ |
| `POST` | `/khach-hang/gio-hang/update` | Cập nhật giỏ hàng |
| `POST` | `/khach-hang/gio-hang/delete` | Xóa khỏi giỏ hàng |
| `POST` | `/khach-hang/thanh-toan` | Đặt hàng & thanh toán (COD / MoMo) |
| `GET` | `/khach-hang/lich-su-don-hang` | Lịch sử đơn hàng |
| `PUT` | `/khach-hang/huy-don-hang/{id}` | Hủy đơn hàng |
| `PUT` | `/khach-hang/xac-nhan-da-giao/{id}` | Xác nhận đã nhận hàng |
| `POST` | `/danh-gia/create` | Viết đánh giá |

### 👑 Admin (yêu cầu `Authorization: Bearer <token>`)

| Method | Endpoint | Mô tả |
|---|---|---|
| `GET` | `/admin/profile/data` | Xem profile admin |
| `GET` | `/san-pham` | Danh sách sản phẩm |
| `POST` | `/admin/san-pham/create` | Tạo sản phẩm |
| `POST` | `/admin/san-pham/update` | Cập nhật sản phẩm |
| `POST` | `/admin/san-pham/delete` | Xóa sản phẩm |
| `POST` | `/admin/san-pham/chuyen-noi-bat` | Bật/tắt nổi bật |
| `POST` | `/admin/san-pham/chuyen-flash-sale` | Bật/tắt flash sale |
| `GET` | `/danh-muc` | Danh sách danh mục |
| `POST` | `/admin/danh-muc/create` | Tạo danh mục |
| `POST` | `/admin/danh-muc/update` | Cập nhật danh mục |
| `POST` | `/admin/danh-muc/delete` | Xóa danh mục |
| `GET` | `/admin/khach-hang/data` | Danh sách khách hàng |
| `POST` | `/admin/khach-hang/doi-trang-thai` | Khoá/mở tài khoản khách |
| `POST` | `/admin/khach-hang/delete` | Xóa tài khoản khách |
| `GET` | `/admin/ma-giam-gia/data` | Danh sách mã giảm giá |
| `POST` | `/admin/ma-giam-gia/create` | Tạo mã giảm giá |
| `POST` | `/admin/ma-giam-gia/delete` | Xóa mã giảm giá |
| `GET` | `/admin/lich-su-don-hang` | Lịch sử đơn hàng |
| `PUT` | `/admin/cap-nhat-tinh-trang/{id}` | Cập nhật tình trạng giao hàng |
| `GET` | `/admin/danh-gia/data` | Danh sách đánh giá |
| `POST` | `/admin/danh-gia/{id}/phan-hoi` | Phản hồi đánh giá |
| `POST` | `/admin/danh-gia/delete` | Xóa đánh giá |
| `POST` | `/admin/thong-ke-1` | Thống kê doanh thu |
| `POST` | `/admin/thong-ke-da-ban` | Thống kê sản phẩm đã bán |

---

## 🚀 Cài đặt & Chạy dự án

### Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- MySQL hoặc SQLite
- Node.js (nếu cần build asset)

### Các bước cài đặt

```bash
# 1. Clone repository
git clone <repository-url>
cd KinhDoanhDongHoOnline-BE

# 2. Cài đặt dependencies PHP
composer install

# 3. Tạo file .env từ mẫu
cp .env.example .env

# 4. Sinh APP_KEY
php artisan key:generate

# 5. Cấu hình database trong .env, sau đó chạy migration
php artisan migrate

# 6. Tạo symbolic link cho storage (upload ảnh)
php artisan storage:link

# 7. Khởi động server
php artisan serve
```

Server mặc định chạy tại: `http://localhost:8000`

---

## ⚙️ Biến môi trường

Sao chép file `.env.example` thành `.env` và điền các giá trị sau:

```env
# Cấu hình App
APP_NAME="Đồng Hồ Online"
APP_URL=http://localhost:8000

# Cấu hình Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dong_ho_online
DB_USERNAME=root
DB_PASSWORD=

# Cấu hình Mail (dùng cho gửi email xác thực)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@gmail.com
MAIL_FROM_NAME="Đồng Hồ Online"

# Cấu hình Google OAuth (Đăng nhập bằng Google)
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_REDIRECT_URI=http://localhost:8000/api/auth/google/callback

# Cấu hình Firebase (Chat realtime)
FIREBASE_CREDENTIALS=path/to/firebase-credentials.json
FIREBASE_DATABASE_URL=https://your-project.firebaseio.com

# Cấu hình Pusher (Broadcast)
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
```

---

## 🔐 Xác thực & Phân quyền

Dự án sử dụng **Laravel Sanctum** để xác thực API bằng token.

### Luồng xác thực:

1. Người dùng đăng nhập → nhận được **Bearer Token**
2. Gửi token trong header mỗi request:
   ```
   Authorization: Bearer <your_token>
   ```

### Hai middleware bảo vệ route:

| Middleware | Mô tả |
|---|---|
| `KhachHangMiddle` | Xác thực token khách hàng (model `KhachHang`) |
| `AdminMiddle` | Xác thực token admin (model `Admin`) |

---

## 💳 Tích hợp thanh toán

### COD (Giao hàng thu tiền)
Đặt hàng thành công ngay lập tức, không cần xử lý thanh toán trực tuyến.

### MoMo
Sử dụng **MoMo Payment Gateway** (môi trường sandbox):
- Khách hàng đặt hàng → backend tạo đơn → gọi API MoMo → nhận `payUrl`
- Frontend redirect khách đến trang thanh toán MoMo
- MoMo callback về backend để xác nhận thanh toán thành công

---

## 📧 Tính năng Email

Hệ thống gửi email tự động trong các trường hợp:

- **Kích hoạt tài khoản**: Sau khi đăng ký, gửi link kích hoạt qua email
- **Quên mật khẩu**: Gửi link đặt lại mật khẩu qua email

---

## 📄 Giấy phép

Dự án được phát triển cho mục đích học tập và thương mại nội bộ.
