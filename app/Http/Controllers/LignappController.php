<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lignapp;
class LignappController extends Controller
{
   

    public function store(Request $request){
        $lignapp = new Lignapp();
      
        $lignapp->locataire_id = $request->locataire;
        $lignapp->appartement_id = $request->id;
        $lignapp->dateh = $request->dateh;
        $lignapp->loyer = $request->loyer;
        $lignapp->cotion =  $request->cotion;
        $lignapp->save();
        session()->flash('success','le Nouveau Locataire a ete bien enregistrer');
        return redirect('appartements/detail/'.$request->id);
    }

    public function update(Request $request, $id){
            $lignapp = Lignapp::find($id);
            $lignapp->locataire_id = $request->locataire;
            $lignapp->dateh = $request->dateh;
            $lignapp->loyer = $request->loyer;
            $lignapp->cotion =  $request->cotion;
            $lignapp->save();
            session()->flash('success','la lign a ete bien modifier');
            return redirect('appartements/detail/'.$lignapp->appartement_id);

    }

    public function distroy(Request $request, $id){
     $lignapp = Lignapp::find($id);
     $id = $lignapp->appartement_id;
     $lignapp->delete();
     return redirect('appartements/detail/'.$id);
    }

    public function out($id){
        $lignapp = Lignapp::find($id);
        $lignapp->date_sortie = date('Y-m-d');
        $lignapp->save();
        return redirect('appartements/detail/'.$lignapp->appartement_id);
    }

    public function in($id){
        $lignapp = Lignapp::find($id);
        $lignapp->date_sortie = null;
        $lignapp->save();
        return redirect('appartements/detail/'.$lignapp->appartement_id);
    }
}
