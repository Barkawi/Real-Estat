<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reglement extends Model
{
    public function lignapp(){
        return $this->belongsTo('App\Lignapp');
    }

}
