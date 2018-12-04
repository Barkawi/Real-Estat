
@extends('layouts.pdf')

@section('content')


        <!-- page content -->
        <div class="right_col" role="main">
          
            


            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quittance<small> pour la reception de reglement mensuel </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

            
            

                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                      <img width="10%" src="{{asset('storage/'.$data[0]->logo)}}">
                      <div class=" invoice-col" style="float:right">
                        <b>{{$data[0]->libelle}}</b>
                        <br>
                        {{$data[0]->adresse}}
                        <br>
                        {{$data[0]->tel.' / '.$data[0]->fix}}
                        <br>
                         {{$data[0]->email}}
                      </div>

                        <h1>
                        <small class="pull-right">Date: {{date('d-m-Y')}}</small>
                        </h1>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                  
                      <!-- /.col -->
                     
                      <!-- /.col -->
                      <div class="col-sm-6 invoice-col">
                        <b>Quittance #RA{{sprintf("%05d", $reglement->id)}}</b>
                        <br>
                        <br>
                        <b>Date:</b> {{date('d-m-Y',strtotime($reglement->created_at))}}
                        <br>
                        <b>Mode de paiement :</b> {{$types[$reglement->type]}}
                        <br>
                        <b>Observation:</b> {{$reglement->observation}}
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-6 invoice-col">
                        
                        <address>
                       <b> Locataire</b> {{$reglement->lignapp->locataire->nom.' '.$reglement->lignapp->locataire->prenom}}
                                        <br>{{ $reglement->lignapp->appartement->immeuble->zone->libelle.' '.$reglement->lignapp->appartement->immeuble->libelle.' '.$reglement->lignapp->appartement->libelle }}
                                        <br><b>Date d'habitation :</b>{{date('d-m-Y',strtotime($reglement->lignapp->dateh))}}
                                        <br><b>Phone:</b> {{$reglement->lignapp->locataire->gsm }}
                                  
      <br>Fixe: {{$reglement->lignapp->locataire->fix}}
                                    </address>
                      </div>
                    </div>
                    <!-- /.row -->
<?php 
$ts1 = strtotime($reglement->de);
$ts2 = strtotime($reglement->a);

$year1 = date('Y', $ts1);  $year2 = date('Y', $ts2);
$month1 = date('m', $ts1); $month2 = date('m', $ts2);

$value = (($year2 - $year1) * 12) + ($month2 - $month1+1);
$mnt  =  $reglement->lignapp->loyer * $value;
?>
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Period</th>
                              <th>Nombres des mois</th>
                              <th>Loyer</th>
                              <th>Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>{{ 'De : '.date('m-Y',strtotime($reglement->de)).' A: '.date('m-Y',strtotime($reglement->a)) }}</td>
                              <td>{{$value.' mois'}}</td>
                              <td>{{$reglement->lignapp->loyer.' DHS'}}</td>
                              <td>{{ $mnt.' DHS' }}</td>
                            </tr>
                          
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-xs-6">
                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Pour le Montant de {{$value}} mois des Locaux qu il occupe a usage Habitation <br/>
                        Arrêter la presente quittance a la somme de :</br>
                        <?php
                        $inWords = new \NumberFormatter('fr', \NumberFormatter::SPELLOUT);
                        $vars =  $inWords->format($mnt);
                        echo($vars." DHS");
                        ?>

                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                      <button class="btn btn-default pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <a class="btn btn-primary pull-right" href="{{ url('appartement/recu/'.$reglement->id.'/pdf') }}" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                      
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                     </div>
                    </div>
                  </section>

                </div>
              </div>
            </div>
          </div>
        </div>
                                        
       
        <!-- /page content -->

@endsection