<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function immeubles(){
return $this->hasMany('App\Immeuble');

    }
}
