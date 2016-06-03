<?php

namespace App\Http\Controllers\Web\Front;

use App\Contact;
use App\Phonenumber;
use App\Http\Controllers\Controller;


class PhonenumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);

        $phones = Phonenumber::where(['contact_id' => $contact_id])->get();;

        return view('front.phone.dashboard',compact('contact','phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);


        return view('front.phone.create',compact('contact'));
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
        $phones = Phonenumber::findOrFail($id);
        return view('front.phone.show_phone',compact('contact','phones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($contact_id, $id)
    {
        $contact = Contact::findOrFail($contact_id);
        $phone = Phonenumber::findOrFail($id);
        \Session::flash('edit_message', True);
        return view('front.phone.edit',compact('phone','contact'));
    }


}
