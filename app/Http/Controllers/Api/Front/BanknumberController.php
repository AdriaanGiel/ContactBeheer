<?php

namespace App\Http\Controllers\Api\Front;

use App\Banknumber;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;

class BanknumberController extends Controller
{
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
