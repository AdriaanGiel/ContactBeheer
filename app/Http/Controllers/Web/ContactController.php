<?php

namespace App\Http\Controllers;

use App\Address;
use App\Banknumber;
use App\Email;
use App\Http\Requests;
use App\Http\Requests\CreateContactRequest;
use App\Http\Requests\ContactRequest;
use App\Contact;
use App\Phonenumber;
use App\Relation;
//use Illuminate\Http\Request;
use Request;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = \Auth::user();
        $contacts = $user->contact->all();
        $relations = Relation::all();
        $relation_array = [];
        foreach($relations as $relation):
            $relation_array[$relation->id] = $relation->type;
        endforeach;

        return view('front.contact.dashboard',compact('contacts','relation_array'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = Relation::all();
        $relation_array = [];
        foreach($relations as $relation):
            $relation_array[$relation->id] = $relation->type;
        endforeach;

        return view('front.contact.create',compact('relations','relation_array'));
    }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $address = $contact->address->first();
        $email = $contact->email->first();
        $phone = $contact->phone->first();
        $bank = $contact->bank->first();

        return view('front.contact.show_contact',compact('contact','address','email','phone','bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $relations = Relation::all();
        $relation_array = [];
        foreach($relations as $relation):
            $relation_array[$relation->id] = $relation->type;
        endforeach;
        return view('front.contact.edit',compact('contact','relation_array'));
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

    public function filter($id){
        $user = \Auth::user();
        if($id != 1):
            $contacts = $user->contact()->where('relation_id',$id)->get();
        else:
            $contacts = $user->contact;
        endif;

        return $contacts;
    }
}
