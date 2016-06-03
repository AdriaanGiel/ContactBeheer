<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddressRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!\Auth::check()){
            return False;
        }
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'straat'        => 'required|min:5',
            'huisnummer'    => 'required|numeric',
            'toevoeging'    => 'max:3',
            'postcode'      => 'required|min:6|max:6',
            'plaats'        => 'required',
        ];

        return $rules;

    }
}
