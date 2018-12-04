<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
  public function lignapps(){
        return $this->hasMany('App\Lignapp');
   }
}
