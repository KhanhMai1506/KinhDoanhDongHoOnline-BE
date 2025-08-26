<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminDoiMatKhau extends FormRequest
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
            'current_password' => 'required',
            'new_password'      =>  'required|min:6',
            'confirm_new_password'   =>  'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại',
            'new_password.required'     => 'Vui lòng nhập mật khẩu mới',
            'new_password.min'          => 'Mật khẩu mới phải có ít nhất 6 ký tự',
            'confirm_new_password.required' => 'Vui lòng nhập lại mật khẩu mới',
            'confirm_new_password.same'     => 'Mật khẩu nhập lại không khớp',
        ];
    }
}
