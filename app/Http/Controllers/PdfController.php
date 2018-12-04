<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reglement;
use App\Immeuble;
use App\Lignapp;
use App\Appartement;
use App\Ourdata;
use Dompdf\Dompdf;
use pdf;
class PdfController extends Controller
{

  //Quittance Format HTML

    public function quittance($id){
            $reglement = Reglement::find($id);
            $types = array("Espece","Virement","Chèque");
            $datas = Ourdata::all();
            return view('Quittance.quittance',['reglement'=>$reglement,'types'=>$types,'data'=>$datas]);
    }

  //Quittance Format PDF
    public function quittance_pdf($id){
      $reglement = Reglement::find($id);
      $datas = Ourdata::all();
      $pdf = \App::make('dompdf.wrapper');
      $types = array("Espece","Virement","Chèque");
      $ts1 = strtotime($reglement->de);
      $ts2 = strtotime($reglement->a);

      $year1 = date('Y', $ts1);  $year2 = date('Y', $ts2);
      $month1 = date('m', $ts1); $month2 = date('m', $ts2);
    

      $value = (($year2 - $year1) * 12) + ($month2 - $month1+1);
      $mnt  =  $reglement->lignapp->loyer * $value;
      $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
      $vars =  $inWords->format($mnt);
   
       $pdf = PDF::loadView('Quittance.pdf',['reglement'=>$reglement,'data'=>$datas,'types'=>$types,'value'=>$value,'mnt'=>$mnt,'vars'=>$vars]);
      return $pdf->stream();
  }

  //Etat Immeuble Format HTML

    public function immeuble($id){
      $immeuble = Immeuble::find($id);
      $lignapps = Lignapp::where('date_sortie',null)->whereIn('appartement_id',function($query) use ($id){
        $query->select('id')
        ->from(with(new Appartement)->getTable())
        ->where('immeuble_id',$id);
      })->get();

      return view('Etats.immeuble',['immeuble'=>$immeuble,'lignapps'=>$lignapps]);
}

//Etat Immeuble Format PDF 

public function Etatimmeuble($id){
  $immeuble = Immeuble::find($id);
  $lignapps = Lignapp::where('date_sortie',null)->whereIn('appartement_id',function($query) use ($id){
    $query->select('id')
    ->from(with(new Appartement)->getTable())
    ->where('immeuble_id',$id);
  })->get();
 // $pdf = \App::make('dompdf.wrapper');
  $pdf = new DOMPDF();
$pdf->set_paper('letter', 'landscape');
  $pdf = PDF::loadView('Etats/pdf',['immeuble'=>$immeuble,'lignapps'=>$lignapps])->setPaper('a4', 'landscape')->setWarnings(false);
  
  return $pdf->stream();
}


//Formulaire Etat entre deux date

public function encetat(){
  return view('Etats/Etatdate');
}

//Etat Encaissement Entre deux date
public function encpdf(Request $request){

  $date1 = $request->date1;
  $date2 = $request->date2;
  $reglements = Reglement::whereBetween('created_at',array($date1,$date2))->get();
  return view('Etats/datetat',['reglements'=>$reglements,'date1'=>$date1,'date2'=>$date2]);

}

 


}
