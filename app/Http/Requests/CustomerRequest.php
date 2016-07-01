<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CustomerRequest extends Request
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
        /** check the method to update the validation rule accordingly */
        if ($this->method()=='PATCH') {
            $customer_id=$this->route()->parameters()['customer']['attributes']['customer_id'];
            $email_rule='required|email|max:255|unique:customer,email,'.$customer_id.',customer_id';
        } else {
            $email_rule='required|email|max:255|unique:customer';
        }
        return [
            'store_id'=>'required',
            'first_name'=>'required|min:3|max:45',
            'last_name'=>'required|min:3|max:45',
            'email'=>$email_rule,
            'address.address'=>'required|min:3|max:50',
            'address.address2'=>'max:50',
            'address.district'=>'required|max:20',
            'city_id'=>'required',
            'address.postal_code'=>'required|alpha_dash|min:5|max:10',
            'address.phone'=>'required|min:10|max:20',
        ];
    }
}
