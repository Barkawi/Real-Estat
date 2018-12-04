<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proprietaire;

class ProprietaireController extends Controller
{
    public function index(){
        $prorieraires = Proprietaire::all();
        return view('Proprietaire.List',['proprietaires'=>$prorieraires]);
    }

    public function create(){

    }

    public function store(Request $request){
        $Prorieraire = new Proprietaire();
        $Prorieraire->nom = $request->name;
        $Prorieraire->codem = $request->code;
        $Prorieraire->tg = $request->tg;
        $Prorieraire->save();
        session()->flash('success','le Prorieraire a ete bien enregistrer');
        return redirect('proprietaires');
    }

    public function edit(){

    }

    public function update(Request $request, $id){
            $Prorieraire = Proprietaire::find($id);
            $Prorieraire->nom = $request->name;
            $Prorieraire->codem = $request->code;
            $Prorieraire->tg = $request->tg;
            $Prorieraire->save();
            session()->flash('success','le Prorieraire a ete bien modifier');
            return redirect('proprietaires');

    }

    public function distroy(Request $request, $id){
     $Prorieraire = Proprietaire::find($id);
     $Prorieraire->delete();
     return redirect('proprietaires');
    }
}
