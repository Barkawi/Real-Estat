<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reglement;
use App\Lignapp;

class ReglementController extends Controller
{
    public function store(Request $request){
        $reglement = new Reglement();
      
        $reglement->de = $request->de.'-1';
        $reglement->a = $request->a.'-1';
        $reglement->type = $request->type;
        $reglement->observation = $request->observation;
        $reglement->lignapp_id = $request->lign;
        $lignapp = Lignapp::find($request->lign);
        $reglement->save();
        session()->flash('success','le Nouveau Encaissement a ete bien enregistrer');
        return redirect('appartements/detail/'.$lignapp->appartement_id);
    }

    public function update(Request $request, $id){
            $reglement = Reglement::find($id);
            $lignapp = Lignapp::find($reglement->lignapp_id);

        $reglement->de = $request->de.'-1';
        $reglement->a = $request->a.'-1';
        $reglement->type = $request->type;
        $reglement->observation = $request->observation;
        $reglement->save();
        
            
            session()->flash('success','l encaissement a ete bien modifier');
            return redirect('appartements/detail/'.$lignapp->appartement_id);

    }

    public function distroy(Request $request, $id){
     $reglement = Reglement::find($id);
     $id = $reglement->lignapp->appartement_id;
     $reglement->delete();
     return redirect('appartements/detail/'.$id);
    }
}
