<?php

namespace App\Http\Controllers\Web\Front;

use App\Address;
use App\Address_contact;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class IndexController extends Controller
{
    //
    public function index()
    {
//        $data = [
//            "id" => 1,
//            "voornaam" => "Adriaan",
//            "achternaam" => "Giel",
//            "geboortedatum" => "1900-10-5",
//            "opnemen_calendar" => TRUE,
//            "opmerking" => "ff testen",
//        ];
//
        $contact = Contact::find(1);
//
//        $adres_data = [
//            'straatnaam' => 'Westerbeekstraat',
//            'huisnummer' => 82,
//            'toevoeging' => 'b',
//            'postcode' => '3074DN',
//            'plaats' => 'Rotterdam',
//        ];
//
//        $address = Address::create($adres_data);
//
//        $cID = $contact->id;
//        $aID = $address->id;
//
//        $contact_regel = Address_contact::create(['contact_id' => $cID, 'address_id' => $aID]);
//
//        dd($contact_regel);

        //$contact = Contact::find(1);
        //$adressen = Address::find(1);



        //$contact_regel = Address_contact::where('contact_id',$contact->id)->get();

        //dd($contact_regel);

//        $address = [];
//        foreach($contact_regel as $regel):
//            $address[] = Address::find($regel->id);
//        endforeach;
//
//        dd($address);




        return view('index.index',compact('contact'));
    }


}
