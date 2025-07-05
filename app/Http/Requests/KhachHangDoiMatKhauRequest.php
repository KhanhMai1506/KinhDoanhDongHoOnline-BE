<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDoiMatKhauRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'            =>  'required|exists:khach_hangs,hash_reset',
            'password'      =>  'required|min:6|max:30',
            're_password'   =>  'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'id.*'            =>  'Tài khoản không tồn tại',
            'password.*'      =>  'Mật khẩu phải từ 6 đến 30 ký tự',
            're_password.*'   =>  'Mật khẩu nhập lại không giống',
        ];
    }
}
