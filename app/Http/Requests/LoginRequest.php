<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:8|max:20'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc nhập',
            'email' => ':attribute không hợp lệ',
            'unique' => ':attribute đã tồn tại',
            'min' => ':attribute tối thiểu :min kí tự',
            'max' => ':attribute tối đa :max kí tự',
        ];
    }
    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Mật khẩu'
        ];
    }
}
