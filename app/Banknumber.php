<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banknumber extends Model
{
    protected $fillable = [
        'banknummer',
        'contact_id'
    ];

    public function contact()
    {
        return $this->hasone('App\Contact');
    }
}
