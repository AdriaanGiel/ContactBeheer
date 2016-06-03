<?php

namespace App\Http\Controllers\Api\Front;

use App\Phonenumber;
use Request;
use App\Http\Requests\PhoneRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhonenumberController extends Controller
{
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
        return redirect(route('contact.phonenumber.index',$request['contact_id']))->with('success_message', 'Telefoonnummer is toegevoegd');

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
        return redirect(route('contact.phonenumber.index',$request['contact_id']))->with('success_message', 'Telefoonnummer is bewerkt');
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
        $phonenummer = Phonenumber::findOrfail($input->id);
        $name = $phonenummer->telefoonnummer;
        $phonenummer->delete();
        return redirect(route('contact.phonenumber.index',$contact_id))->with('info_message', "Banknummer $name is verwijderd");

    }
}
