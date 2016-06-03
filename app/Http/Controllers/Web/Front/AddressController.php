<?php

namespace App\Http\Controllers\Web\Front;

use App\Address;
use App\Contact;
use App\Http\Requests;
use App\Http\Controllers\Controller;


/**
 * Class Addresses
 * @package App\Http\Controllers
 */
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $contact = Contact::findOrFail($id);

        $addresses = $contact->address;

        return view('front.address.dashboard',compact('addresses','contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $contact = Contact::findOrFail($id);
        return view('front.address.create',compact('contact'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($contact_id,$id)
    {
        $contact = Contact::findOrFail($contact_id);
        $address = $contact->address->find($id);

        return view('front.address.show_address',compact('address','contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($contact_id,$id)
    {
        $contact = Contact::findOrFail($contact_id);
        $address = Address::findOrFail($id);
        return view('front.address.edit',compact('address','contact'));
    }


}
