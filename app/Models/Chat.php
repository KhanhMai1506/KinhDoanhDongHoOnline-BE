<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chats';

    protected $fillable = [
        'user_id',    // id của KhachHang
        'admin_id',   // id của admin (có thể null nếu chưa có admin trả lời)
        'message',    // nội dung tin nhắn
        'sender',     // 'user' hoặc 'admin'
        'is_read'     // trạng thái đã đọc
    ];

    /**
     * Quan hệ đến KhachHang (người gửi hoặc nhận)
     */
    public function user()
    {
        return $this->belongsTo(KhachHang::class, 'user_id');
    }

    /**
     * Quan hệ đến Admin (người trả lời)
     * Giả sử bạn có bảng users cho admin
     */
    public function admin()
    {
        return $this->belongsTo(\App\Models\User::class, 'admin_id');
    }
}
