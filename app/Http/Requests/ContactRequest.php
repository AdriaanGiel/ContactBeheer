<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
        return [
            'relation_id' => 'required',
            'voornaam' => 'required|min:3|max:50',
            'achternaam' => 'required|min:3|max:50',
            'geboortedatum' => 'required|date',
            'opmerking' => 'required',
        ];
    }
}
