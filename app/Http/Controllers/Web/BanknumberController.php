<?php

namespace App\Http\Controllers;

use App\Banknumber;
use App\Contact;
use Request;
use App\Http\Requests;

use App\Http\Requests\BankRequest;
use Illuminate\Support\Facades\Session;

class BanknumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        $banks = Banknumber::where(['contact_id' => $contact_id])->get();

        return view('front.bank.dashboard',compact('banks','contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($contact_id)
    {
        $contact = Contact::findOrFail($contact_id);
        return view('front.bank.create',compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request, $contact_id)
    {
        $data = [
            'banknummer' => $request->banknummer,
            'contact_id' => $request->contact_id
        ];

        Banknumber::create($data);
        return redirect("contact/".$request['contact_id']."/banknumber")->with('success_message', 'Nieuw banknummer is toegevoegd');
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
        $banks = Banknumber::findOrFail($id);
        return view('front.bank.show_bank',compact('bank','contact'));
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
        $bank = Banknumber::findOrFail($id);
        \Session::flash('edit_message', True);
        return view('front.bank.edit',compact('bank','contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, $contact_id,$id)
    {
        Banknumber::where(['id' => $request->id])->update(['banknummer' => $request->banknummer]);

        return redirect("contact/".$request['contact_id']."/banknumber")->with('success_message', 'Banknummer is successvol bewerkt');
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
        $banknummer = Banknumber::findOrfail($input->id);
        $name = $banknummer->banknummer;
        $banknummer->delete();
        return redirect("contact/$contact_id/banknumber")->with('info_message', "Banknummer $name is verwijderd");
    }
}
