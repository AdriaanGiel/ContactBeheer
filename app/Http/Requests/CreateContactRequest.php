<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateContactRequest extends Request
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
            'voornaam' => 'required|min:3',
            'achternaam' => 'required|min:3',
            'geboortedatum' => 'required|date',
            'opmerking' => 'required',
            'email' => 'email',
            'telefoonnummer' => 'min:10',
            'banknummer' => 'min:10',
            'straat' => 'min:3',
            'huisnummer' => 'numeric',
            'toevoeging' => 'max:3',
            'postcode' => 'min:6|max:6',
            'plaats' => 'min:3',
        ];
    }
}
