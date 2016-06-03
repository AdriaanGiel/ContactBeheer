<?php

namespace App\Http\Controllers\Web\Front;

use App\Contact;
use App\Email;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        $emails = Email::where(['contact_id' => $contact_id])->get();

        return view('front.email.dashboard',compact('contact','emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        return view('front.email.create',compact('contact'));
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
        $email = Email::findOrFail($id);
        return view('front.email.show_email',compact('email','contact'));
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
        $email = Email::findOrFail($id);
        return view('front.email.edit',compact('email','contact'));
    }


}
