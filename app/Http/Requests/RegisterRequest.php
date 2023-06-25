<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'กรุณากรอกอีเมลล์!!',
            'name.required' => 'กรุณากรอกชื่อ!!',
            'password.required' => 'กรุณากรอกรหัสผ่าน!!',
            'email.unique'=>'อีเมลล์นี้ไม่สามารถใช้งานใด้',
            'password.confirmed'=>'รหัสผ่านไม่ตรงกัน',
            'password.min'=>'รหัสผ่านต้องมีอย่างน้อย 6 ตัว'
        ];
    }
}
