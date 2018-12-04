<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;
use App\Zone;
use App\Proprietaire;

class ZoneController extends Controller
{
    public function index(){
        $Zones = Zone::all();
        return view('Zone.List',['zones'=>$Zones]);
    }

    public function create(){

    }

    public function store(ZoneRequest $request){
        $zone = new Zone();
        $zone->libelle = $request->libelle;
        $zone->save();
        session()->flash('success','la Zone a ete bien enregistrer');
        return redirect('Zones');
    }

    public function edit(){

    }

    public function update(ZoneRequest $request, $id){
            $Zone = Zone::find($id);
            $Zone->libelle = $request->libelle;
            $Zone->save();
            session()->flash('success','la Zone a ete bien modifier');
            return redirect('Zones');

    }

    public function distroy(Request $request, $id){
     $Zone = Zone::find($id);
     $Zone->delete();
     return redirect('Zones');
    }

    public function immeubles($id){
    $proprietaires = Proprietaire::all();
        $Zone = Zone::find($id);
        $immeubles = $Zone->immeubles;
        return view('Zone.immeubles',['zone'=>$Zone,'immeubles'=>$immeubles,'proprietaires'=>$proprietaires]);
    }
}
