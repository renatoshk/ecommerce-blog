<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutUserRequest extends FormRequest
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
            //
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'address'=>'required',
            'country'=>'required',
            'city'=>'required',
            'zip_code'=>'required',
            'phone_number'=>'required'
        ];
    }
}
