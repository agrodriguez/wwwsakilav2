<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreRequest extends Request
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
            'address.address'=>'required|min:3|max:50',
            'address.address2'=>'max:50',
            'address.district'=>'required|max:20',
            'city_id'=>'required',
            'address.postal_code'=>'required|alpha_dash|min:5|max:10',
            'address.phone'=>'required|min:10|max:20',
        ];
    }
}
