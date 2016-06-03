<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Phonenumber;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PhoneRequest;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $data = [
            'telefoonnummer' => $request->telefoonnummer,
            'contact_id' => $request->contact_id
        ];
        Phonenumber::create($data);
        return redirect('contact/'.$request['contact_id'].'/phonenumber');

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, $id)
    {
        Phonenumber::where(['id' => $request->id])->update(['telefoonnummer' => $request->telefoonnummer]);

        \Session::flash('success_message', 'Telefoonnummer is successvol bewerkt');
        return redirect('contact/'.$request['contact_id'].'/phonenumber');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($contact_id,$id)
    {
        return redirect('contact/'.$contact_id.'/phonenumber');
    }
}
