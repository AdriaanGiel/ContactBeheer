<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = [
        'opmerking',
        'contact_id',
        'user_id'
    ];

    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

}
