<?php

namespace App\Http\Controllers\Api\Front;

use App\Contact;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\ContactRequest;
use App\Remark;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        $user = \Auth::user();
        $input = $request->all();
        $contacts = Contact::all();
        $contact = '';

        $date = explode('-',$input['geboortedatum']);
        $input['dag'] = $date[0];
        $input['user_id'] = $user->id;

        foreach($contacts as $check):
            if($check->voornaam == $input['voornaam'] && $check->achternaam == $input['achternaam'] && $check->geboortedatum == $input['geboortedatum']):
                $contact = Contact::findOrFail($check->id);
            endif;
        endforeach;

        if(!$contact):
            $contact = Contact::create($input);
        endif;

        $contact->user()->attach($user->id, ['contact_id' => $contact->id]);

        /**
         * If there is a hidden input of all_data create all the following
         */
        if(array_key_exists('all_data', $input)):
            $input['contact_id'] = $contact->id;
            if($input['email']):
                $email = Email::create($input);
            endif;

//            foreach($contact->remark as $remark):
//
//            endforeach;
            if($input['opmerking']):
                $remark = Remark::create($input);
            endif;

            if($input['telefoonnummer']):
                $phone = Phonenumber::create($input);
            endif;

            if($input['banknummer']):
                $bank = Banknumber::create($input);
            endif;

            if($input['straat'] && $input['huisnummer'] && $input['toevoeging'] && $input['postcode'] && $input['plaats']):
                $addresses = Address::all();
                $address = '';
                foreach($addresses as $checkData):
                    if($checkData->straat == $input['straat'] && $checkData->huisnummer == $input['huisnummer'] && $checkData->toevoeging == $input['toevoeging']
                        && $checkData->plaats == $input['plaats'] && $checkData->postcode == $input['postcode']):
                        $address = Address::findOrFail($checkData->id);
                        break;
                    endif;
                endforeach;

                if(!$address):
                    $address = Address::create($input);
                endif;
                $contact->address()->attach($address->id,['contact_id' => $contact->id]);
            endif;
        endif;

        return redirect("contact")->with('success_message', "Nieuw contact is toegevoegd");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $user = \Auth::user();
        $input = $request->all();
        $contact = Contact::findOrFail($request->contact_id);

        $updateContact = $contact->user()->where('id',$user->id);

        if(count($contact->user) > 1){
            $new = Contact::create($input);
            $user->contact()->attach($new->id,['contact_id' => $user->id]);

            $updateContact->user()->detach();
            $updateContact->delete();

        }else{
            $contact = Contact::findOrFail($request->contact_id)->update($input);
        }

        return redirect('contact/'.$request->contact_id)->with('success_message', 'Contact is bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = (object)Request::all();
        $contact = Contact::findOrFail($input->contact_id);
        $name = $contact->user()->first()->voornaam . ' ' . $contact->user()->first()->achternaam;

        $contact->user()->detach();
        $contact->delete();

        return redirect('contact/'.$input->contact_id)->with('info_message', "Contact $name is verwijderd");
    }
}
