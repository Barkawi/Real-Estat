<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appartement;
use App\Immeuble;
use App\Detail_app;
use App\Locataire;
use App\Lignapp;
use App\Reglement;

class AppartementController extends Controller
{

    public function index($id){
       $appartements = Appartement::where('immeuble_id',$id)->get();
       
       $immeubles = Immeuble::all();
        
        return view('Appartement.List',['immeubles'=>$immeubles,'appartements'=>$appartements,'id'=>$id]);
    
}

public function show($id){
    $appartement = Appartement::find($id);
    $locataires  = Locataire::all();
    $types = array('Espece','Virement','Cheque');
    $lastreg = Reglement::whereIn('lignapp_id', function($query) use ($id) {
        $query->select('id')
        ->from(with(new Lignapp)->getTable())
        ->where('appartement_id',$id);
    })->max('a');
    $reglements = Reglement::whereIn('lignapp_id', function($query) use ($id) {
        $query->select('id')
        ->from(with(new Lignapp)->getTable())
        ->where('appartement_id',$id);
    })->get();

 // for get all lignappartements 
    $lignapps = Lignapp::where('appartement_id',$id)->get();
    $count = count(Lignapp::where('appartement_id',$id)->where('date_sortie',null)->get());

    if(!empty($lignapps)){
        $ligns = Lignapp::where('appartement_id',$id)->where('date_sortie', Null)->first(); 
        $lignse = Lignapp::where('appartement_id',$id)->orderBy('date_sortie', 'desc')->first();
            $val = $lignse->date_sortie;
        if(!empty($ligns)){
            $test = 0;
        }
        else{
            $test = 1;

        }
    }
    else{
        $test = 1;
    }


    $Actif = $ligns;
   
    $details = Detail_app::where('appartement_id',$appartement->id)->get();
     return view('Appartement.detail',
     [
     'appartement'=>$appartement,
     'details'=>$details,
     'locataires'=>$locataires,
     'val'=>$val,
     'lignapps'=>$lignapps,
     'actif'=>$Actif,
     'reglements'=>$reglements,
     'types'=>$types,
     'lastreg'=>$lastreg,
     'test' => $test,
     'count'=>$count
     ]);
 
}

public function first(){
    
    $imm = Immeuble::all()->first();
   $id = $imm->id;
   return redirect('appartements/'.$id); 
}

    
    public function store(Request $request){
        $appartement = new Appartement();
        $appartement->libelle = $request->libelle;
        $appartement->type = $request->type;
        $appartement->immeuble_id = $request->immeuble;
        $appartement->save();
        session()->flash('success','l appartement a ete bien enregistrer');
        return redirect('appartements/'.$request->immeuble); 
    }

  
    public function update(Request $request, $id){
            $appartement = Appartement::find($id);
            $appartement->libelle = $request->libelle;
            $appartement->type = $request->type;
            $appartement->immeuble_id = $request->immeuble;
            $appartement->save();
            session()->flash('success','appartement a ete bien modifier');
            return redirect('appartements/'.$request->immeuble);

    }

    public function distroy(Request $request, $id){
     $appartement = Appartement::find($id);
     $appartement->delete();
     session()->flash('success','Appartement a ete bien supprimer');
     return redirect('appartements');
    }
    
}
