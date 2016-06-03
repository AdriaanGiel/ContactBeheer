<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonenumber extends Model
{
    protected $fillable = [
        'telefoonnummer',
        'contact_id'
    ];

    public function contact()
    {
        return $this->hasone('App\Contact');
    }
}
