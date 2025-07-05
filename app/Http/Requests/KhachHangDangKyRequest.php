<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangDangKyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ho_va_ten' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:khach_hangs,email',
            'password' => 'required|min:6',
            're_password' => 'required|min:6|same:password',
            'so_dien_thoai' => 'required|digits:10',
        ];
    }

    public function messages(): array
    {
        return [
            'ho_va_ten.required' => 'Họ và tên không được để trống',
            'ho_va_ten.min' => 'Họ và tên phải có ít nhất 3 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            're_password.required' => 'Nhập lại mật khẩu không được để trống',
            're_password.min' => 'Nhập lại mật khẩu phải có ít nhất 6 ký tự',
            're_password.same' => 'Nhập lại mật khẩu phải giống mật khẩu',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống',
            'so_dien_thoai.digits' => 'Số điện thoại phải đủ 10 ký tự',
        ];
    }
}
