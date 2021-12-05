<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'  =>'required|max:255',
            'price' => 'required',
            'category_id' => 'required',
            'image'=>'required'
        ];
    }
    
    public function messages()
    {
        return [
            'name.required'=> 'Tên sản phẩm không được để trống',
            'price.required'=> 'Giá sản phẩm không được để trống',
            'category_id.required'=> 'Danh mục sản phẩm không được để trống',
            'image.required'=> 'Vui lòng chọn ảnh',
            'description.required'=> 'Mô tả sản phẩm không được để trống'
        ];
    }
}
