<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locataire;

class LocataireController extends Controller
{
    public function index(){
        $locataires = Locataire::all();
        $sf = array("Celibataire","Marié");
        $sex = array("Female","Male");
        
        return view('Locataire.List',['locataires'=>$locataires,'sf'=>$sf,'sex'=>$sex]);
    }

    public function create(){

    }

    public function store(Request $request){
        $locataire = new Locataire();
        $locataire->nom = $request->nom;
        $locataire->prenom = $request->prenom;
        $locataire->cin = $request->cin;
        $locataire->fonction = $request->fonction;
        $locataire->sf = $request->sf;
        $locataire->sex = $request->sex;
        $locataire->datenai = $request->daten;
        $locataire->lieunai = $request->lieun;
        $locataire->gsm = $request->gsm;
        $locataire->fix = $request->fix;
        $locataire->compte = $request->compte;
        $locataire->banque = $request->banque;
        $locataire->save();
        session()->flash('success','le Locataire a ete bien enregistrer');
        return redirect('locataires');
    }

    public function edit(){

    }

    public function update(Request $request, $id){
            $locataire = Locataire::find($id);
            $locataire->nom = $request->nom;
            $locataire->prenom = $request->prenom;
            $locataire->cin = $request->cin;
            $locataire->fonction = $request->fonction;
            $locataire->sf = $request->sf;
            $locataire->sex = $request->sex;
            $locataire->datenai = $request->daten;
            $locataire->lieunai = $request->lieun;
            $locataire->gsm = $request->gsm;
            $locataire->fix = $request->fix;
            $locataire->compte = $request->compte;
            $locataire->banque = $request->banque;
            $locataire->save();
            session()->flash('success','le locataire a ete bien modifier');
            return redirect('locataires');
    }

    public function distroy(Request $request, $id){
     $locataires = locataire::find($id);
     $locataires->delete();
     return redirect('locataires');
    }
}
