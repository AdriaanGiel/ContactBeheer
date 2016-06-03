<?php

namespace App\Http\Controllers\Api\Front;


use App\Email;
use Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;

class EmailController extends Controller
{
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
