<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_app;

class Detail_appController extends Controller
{
    

    public function create(){

    }

    public function store(Request $request){
        $detail = new Detail_app();
        $detail->libelle = $request->libelle;
        $detail->qte = $request->qte;
        $detail->appartement_id = $request->id;
        $detail->save();
        session()->flash('success','le detail a ete bien enregistrer');
        return redirect('appartements/detail/'.$request->id);
    }

    public function edit(){

    }

    public function update(Request $request, $id){
            $Detail = Detail_app::find($id);
            $Detail->libelle = $request->libelle;
            $Detail->qte  = $request->qte;

            $Detail->save();
            session()->flash('success','le Detail a ete bien modifier');
            return redirect('appartements/detail/'.$Detail->appartement_id);

    }

    public function distroy(Request $request, $id){
     $Detail = Detail_app::find($id);
     $id = $Detail->appartement_id;
     $Detail->delete();
     return redirect('appartements/detail/'.$id);
    }

   
}
