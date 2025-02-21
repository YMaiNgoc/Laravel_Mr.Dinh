<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleStudent extends FormRequest
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
            'name'=>'required|max:225|string',
            'age'=>'numeric',
            'date'=>'string',
            'phone'=>'numeric',
            'web'=>'string',
            'address'=>'string'
        ];
    }
    public function messages (){
         return [
            'name.string'=> 'Vui long nhap ten cho dung',
            'age.numeric'=> 'Vui long nhap tuoi cho dung',
            'date.string'=> 'Vui long nhap ngay thang',
            'phone.numeric'=> 'Vui long nhap so dien thoai cho dung',
            'web.string'=> 'Vui long nhap kiem tra lai ki tu',
            'address.string'=> 'Vui long nhap dia chi'
         ];
    }
}
