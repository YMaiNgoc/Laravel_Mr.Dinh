<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:225',
            'mota'  => 'sometimes|string|nullable',
            'price' => 'sometimes|numeric|nullable',
            'img'   => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048|nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string'   => 'Tên phải là chuỗi ký tự.',
            'name.max'      => 'Tên không được vượt quá 225 ký tự.',
            'mota.string'   => 'Mô tả phải là chuỗi ký tự.',
            'price.numeric' => 'Giá phải là số.',
            'img.image'     => 'File tải lên phải là hình ảnh.',
            'img.mimes'     => 'Hình ảnh phải có định dạng jpg, png, jpeg, gif, svg.',
            'img.max'       => 'Dung lượng hình ảnh không được vượt quá 2MB.'
        ];
    }
}
