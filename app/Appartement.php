<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    public function immeuble(){
        return $this->belongsTo('App\Immeuble');
    }

    public function lignapps(){
         return $this->hasMany('App\Lignapp');
    }
}
