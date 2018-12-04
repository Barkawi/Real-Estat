<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ourdata;

class OurdataController extends Controller
{
    public function index(){
        $datas = Ourdata::all();
        return view('Ourdata.list',['datas'=>$datas]);
    }

    public function store(Request $request){
        $data = new Ourdata();
        $data->libelle = $request->libelle;
        $data->adresse = $request->adresse;
        $data->tel = $request->tel;
        $data->fix = $request->fixe;
        $data->email = $request->email;
        $data->website = $request->website;

        if($request->hasFile('logo'))
        {
            $data->logo = $request->file('logo')->store('image');
        }

        $data->save();
        session()->flash('success','Nous donnée a ete bien enregistrer');
        return redirect('datas');
    }



    public function update(Request $request){
            $data = Ourdata::all();
            if(!empty($data)){
            $data = $data[0];
            $data->libelle = $request->libelle;
            $data->adresse = $request->adresse;
            $data->tel = $request->tel;
            $data->fix = $request->fixe;
            $data->email = $request->email;
            $data->website = $request->website;
    
            if($request->hasFile('logo'))
            {
                $data->logo = $request->file('logo')->store('image');
            }
    
            $data->save();
            session()->flash('success','our data a ete bien modifier');
        }
            return redirect('datas');

    }
}
