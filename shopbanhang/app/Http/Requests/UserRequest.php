<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'          => 'required|unique:users,name|max:50',
            'email'         => 'required|unique:users,email|max:50',
            'password'      => 'required|regex:/(^([a-z0-9]+)$)/u|min:6|max:50',
            'confirm_password' => 'required|same:password',
            'phone'         => 'required|unique:users,phone|max:50',
            'address'       => 'required',
        ];
    }
    public function messages(){
        return [
            'name.required'     => 'Vui lòng nhập tên',
            'name.unique'       => 'Tên đã tồn tại',
            'email.required'    => 'Vui lòng nhập email',
            'email.unique'      => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.regex' => 'Mật khẩu không đúng',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
            'confirm_password.required' => 'Vui lòng nhập lại mật khẩu',
            'phone.required'    => 'Vui lòng nhập số điện thoại',
            'phone.required'    => 'Số điện thoại đã tồn tại',
            'address.required'  => 'Vui lòng nhập địa chỉ'
        ];
    }
}
