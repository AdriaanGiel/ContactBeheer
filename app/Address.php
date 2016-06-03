<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'straat',
        'huisnummer',
        'toevoeging',
        'postcode',
        'plaats'
    ];

    public function contact()
    {
        return $this->belongsToMany('App\Contact','address_contact','address_id','contact_id');
    }


}
