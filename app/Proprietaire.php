<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proprietaire extends Model
{
           public function immeubles(){
            return $this->hasMany('App\Immeuble');
            }
}
