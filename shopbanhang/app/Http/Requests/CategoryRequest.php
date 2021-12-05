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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:50',
            'code'=> 'required',    
        ];
    }
    public function messages(){
            return [
                'name.required' => 'Tên danh mục không được để trống',
                'name.max'=> 'Tên danh mục không nhập quá 50 kí tự',
                'code.required' => 'Mã danh mục không được để trống'
            ];
    }
}   
