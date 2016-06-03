<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Email;
use Request;

use App\Http\Requests;
use App\Http\Requests\EmailRequest;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailRequest $request,$contact_id)
    {
        $data = [
            'email' => $request->email,
            'contact_id' => $request->contact_id
        ];

        Email::create($data);
        return redirect('contact/'.$request['contact_id']."/email")->with('success_message', 'Nieuwe Email is toegevoegd');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailRequest $request, $id)
    {
        Email::where(['id' => $request->id])->update(['email' => $request->email]);
        return redirect('contact/'.$request['contact_id']."/email")->with('success_message', 'Email is successvol bewerkt');
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
        $email = Email::findOrFail($input->id);
        $name = $email->email;
        $email->delete();

        return redirect('contact/'.$contact_id."/email")->with('info_message', 'Email '.$name.' is verwijderd');
    }
}
