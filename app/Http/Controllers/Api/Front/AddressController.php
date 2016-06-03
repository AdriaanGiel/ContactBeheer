<?php

namespace App\Http\Controllers\Api\Front;

use App\Address;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request, $contact_id)
    {
        $input = $request->all();
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
        $address->contact()->attach($address->id,['contact_id' => $input['contact_id']]);

        return redirect('contact/'.$request['contact_id']."/address")->with('success_message', 'Nieuw address is toegevoegd');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, $id)
    {
        $input = $request->all();
        $contact = Contact::findOrFail($request->contact_id);

        $updateAddress = $contact->address()->where('id',$request->id);

        $address = Address::findOrFail($request->id);

        if(count($address->contact) > 1) {
            $new = Address::create($input);
            $new->contact()->attach($new->id,['contact_id' => $contact->id]);

            $updateAddress->contact()->detach();
            $updateAddress->delete();
        }else {
            $address = Address::findOrFail($request->id)->update($input);
        };

        return redirect('contact/'.$request['contact_id']."/address")->with('success_message', 'Address is successvol bewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact_id,$id)
    {
        $input = (object)Request::all();
        $address = Address::findOrFail($input->id);
        $name = $address->straat;

        if(count($address->contact) > 1):
            $address->delete();
        endif;


        return redirect('contact/'.$contact_id."/address")->with('info_message', "Address $name is verwijderd");
    }
}
