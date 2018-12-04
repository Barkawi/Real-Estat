<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reglement;
use App\Appartement;
use App\Immeuble;
use App\Locataire;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('Y-m-d');
        $paiements = Reglement::where('de','<=',$month)->where('a','>=',$month)->count();
        $reglements = count(Reglement::all());
        $locataires = count(Locataire::all());
        $imeubles = count(Immeuble::all());
        $appartement = count(Appartement::all());
       
        return view('home',['reglements'=>$reglements,'appartements'=>$appartement,'imeubles'=>$imeubles,'locataires'=>$locataires,'paiements'=>$paiements]);
    }
}
