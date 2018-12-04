<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reglement;
use DB;

class Lignapp extends Model
{
    public function appartement(){
        return $this->belongsTo('App\Appartement');
    }

    public function locataire(){
        return $this->belongsTo('App\Locataire');
    }

    public function reglements(){
        return $this->hasMany('App\Reglement');
   }
   public function maxyear(){
        $maxyear = Reglement::where('lignapp_id',$this->id)->max('a');
        return $maxyear;
   }

   public function existe($month,$year){
       $date  = $year.'-'.$month.'-01';
       $reglement = Reglement::where('de','<=',$date)->where('a','>=',$date)->where('lignapp_id',$this->id)->get();
      if(!empty($reglement))
      return $reglement;
      else
      return false;
   }

   public function total(){

    $reglement = DB::table('reglements')
                     ->select(DB::raw('sum(TIMESTAMPDIFF(MONTH, de, a)+1)*'.$this->loyer.' as total'))
                     ->where('lignapp_id',$this->id)
                     ->get();
return $reglement[0]->total;
   }



}
