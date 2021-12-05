<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'user_id' => 'required',
            'status' => 'required',
           
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Vui lòng nhập tên khách hàng',
            'status.required' => 'Vui lòng chọn trạng thái'
        ];
    }
}
