<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Immeuble;
use App\Zone;
use App\Proprietaire;

class ImmeubleController extends Controller
{
   
    public function index(){
        $immeubles = Immeuble::all();
        $zones = Zone::all();
        $proprietaires = Proprietaire::all();
        return view('Immeuble.List',['immeubles'=>$immeubles,'zones'=>$zones,'proprietaires'=>$proprietaires]);
    }

    public function create(){

    }

    public function store(Request $request){
        $imeuble = new Immeuble();
        $imeuble->libelle = $request->libelle;
        $imeuble->zone_id = $request->zone;
        $imeuble->proprietaire_id = $request->prop;
        $imeuble->save();
        session()->flash('success','l immeubles a ete bien enregistrer');
        return redirect('Immeubles');
    }


    public function storebyzone(Request $request){
        $imeuble = new Immeuble();
        $imeuble->libelle = $request->libelle;
        $imeuble->zone_id = $request->zone;
        $imeuble->proprietaire_id = $request->prop;
        $imeuble->save();
        session()->flash('success','l immeubles a ete bien enregistrer');
        return redirect('zones/'.$request->zone);
    }


    public function edit(){

    }

    public function update(Request $request, $id){
            $imeuble = Immeuble::find($id);
            $imeuble->libelle = $request->libelle;
            $imeuble->zone_id = $request->zone;
            $imeuble->prop_id = $request->prop;
            $imeuble->save();
            session()->flash('success','Immeuble a ete bien modifier');
            return redirect('Immeubles');

    }

    public function updatebyzone(Request $request, $id){
        $imeuble = Immeuble::find($id);
        $imeuble->libelle = $request->libelle;
        $imeuble->zone_id = $request->zone;
        $imeuble->prop_id = $request->prop;
        $imeuble->save();
        session()->flash('success','Immeuble a ete bien modifier');
        return redirect('zones/'.$request->zone);

}

    public function distroy(Request $request, $id){
     $imeuble = Immeuble::find($id);
     $imeuble->delete();
     session()->flash('success','Immeuble a ete bien supprimer');
     return redirect('Immeubles');
    }

    
}
