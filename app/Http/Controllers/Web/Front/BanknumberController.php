<?php

namespace App\Http\Controllers\Web\Front;

use App\Banknumber;
use App\Contact;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
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


}
