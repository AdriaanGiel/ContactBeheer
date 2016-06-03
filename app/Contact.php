<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'voornaam',
        'achternaam',
        'geboortedatum',
        'dag',
        'afbeelding',
        'opnemen_calendar',
        'relation_id',
    ];

    protected $dateFormat = 'd-m-Y H:i:s';

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function address()
    {
        return $this->belongsToMany('App\Address','address_contact','contact_id','address_id');
    }

    public function email()
    {
        return $this->hasMany('App\Email');
    }

    public function phone()
    {
        return $this->hasMany('App\Phonenumber');
    }

    public function bank()
    {
        return $this->hasMany('App\Banknumber');
    }

    public function remark()
    {
        $user = \Auth::user();
        return $this->hasOne('App\Remark')->where('user_id','=',$user->id);
    }

    public function relation()
    {
        return $this->hasOne('App\Relation','id','relation_id');
    }
}
