<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuanLyTaiKhoanCaNhan extends FormRequest
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
    public function rules(): array {
        return [
            'ten_nguoi_nhan' => [
                'required',
                'regex:/^[\pL\s\-]+$/u'  
            ],
            'so_dien_thoai' => [
                'required',
                'regex:/^(0|\+84)[0-9]{9}$/'
            ],
            'dia_chi' => [
                'required',
                'max:255'
            ],
        ];
    }

    public function messages(): array {
        return [
            'ten_nguoi_nhan.required' => 'Tên người nhận không được để trống.',
            'ten_nguoi_nhan.regex' => 'Tên người nhận không được chứa ký tự đặc biệt.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.regex' => 'Số điện thoại sai định dạng.',
            'dia_chi.required' => 'Địa chỉ không được để trống.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ];
    }
}
