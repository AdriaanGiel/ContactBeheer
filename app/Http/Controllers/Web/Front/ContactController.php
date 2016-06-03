<?php

namespace App\Http\Controllers\Web\Front;

use App\Address;
use App\Banknumber;
use App\Email;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Contact;
use App\Phonenumber;
use App\Relation;
//use Illuminate\Http\Request;

use Carbon\Carbon;
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
