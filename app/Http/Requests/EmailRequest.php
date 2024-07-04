<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => 'required|email'
        ];
    }
    public function messages(): array
    {
        return [
            'required' => ':attribute bắt buộc nhập!',
            'email' => ':attribute không hợp lệ!',
        ];
    }
    public function attributes(): array
    {
        return [
            'email' => 'Email'
        ];
    }
}
