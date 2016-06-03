<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhoneRequest extends Request
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
            'contact_id' => 'required',
            'telefoonnummer' => 'required|min:10'
        ];

        return $rules;
    }
}
