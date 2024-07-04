<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2', 'max:40'],
            'last_name' => ['required', 'min:2', 'max:40'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8','max:20'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống!',
            'min' => ':attribute tối thiểu :min kí tự',
            'max' => ':attribute tối đa :max kí tự',
            'email' => 'Email không hợp lệ',
            'unique' => 'Email đã tồn tại',
            'same' => 'Mật khẩu không khớp'
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'Họ của bạn',
            'last_name' => 'Tên của bạn',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu',
        ];
    }
}
