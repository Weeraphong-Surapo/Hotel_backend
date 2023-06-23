<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
             'category_name' => 'required|unique:categories,category_name|max:255',
         ];
     }
 
     public function messages()
     {
         return [
             'category_name.required' => 'กรุณากรอกหมวดหมู่!!',
             'category_name.unique' => 'มีหมวดหมู่นี้แล้วในระบบ!!',
             'category_name.max' => 'ความยาวต้องไม่เกิน 255 ตัว!!',
         ];
     }
}
