<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Immeuble extends Model
{
    public function proprietaire(){
        return $this->belongsTo('App\Proprietaire');
    }

    public function zone(){
        return $this->belongsTo('App\Zone');
    }

    public function appartements(){

        return $this->hasMany('App\Appartement');

    }
}
