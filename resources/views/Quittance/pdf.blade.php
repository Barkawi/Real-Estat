
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}


</style>
<div class="row" style="font-size:14px; text-align:centre">
                      <div class="col-xs-12 invoice-header">
                      <div class=" invoice-col" style="float:right">
                        <b>{{$data[0]->libelle}}</b>
                        <br>
                        {{$data[0]->adresse}}
                        <br>
                        {{$data[0]->tel.' / '.$data[0]->fix}}
                        <br>
                         {{$data[0]->email}}
                      </div>

                      </div>
                      <!-- /.col -->
                    </div>
                  
 <img width="20%" src="{{public_path('storage/'.$data[0]->logo)}}">
                    
 <h2 style="text-align:centre">Quittance<small> pour la reception de reglement mensuel </small></h2>
              
<p style="float:right">Date: {{date('d-m-Y')}}</p><br/><br/>
                    
<div style="float:left; border-style: groove;padding : 10px;">
                          <b>Quittance #RA{{sprintf("%05d", $reglement->id)}}</b>
                         
                          <br>
                          <b>Date:</b> {{date('d-m-Y',strtotime($reglement->created_at))}}
                          <br>
                          <b>Mode de paiement :</b> {{$types[$reglement->type]}}
                          <br>
                          <b>Observation:</b> {{$reglement->observation}}
                        </div>
                        <div style="float:right; border-style: groove;padding : 10px;">
                        
                        <address>
                        <b>Locataire: </b> {{$reglement->lignapp->locataire->nom.' '.$reglement->lignapp->locataire->prenom}} 
                                        <br>{{ $reglement->lignapp->appartement->immeuble->zone->libelle.' '.$reglement->lignapp->appartement->immeuble->libelle.' '.$reglement->lignapp->appartement->libelle }}
                                        <br><b>Date d'habitation :</b>{{date('d-m-Y',strtotime($reglement->lignapp->dateh))}}
                                        <br><b>Phone:</b> {{$reglement->lignapp->locataire->gsm.' / '.$reglement->lignapp->locataire->fix }}
                                       
                        </address>
                      </div>
                        </div>
<br/><br/><br/><br/><br/><br/>
                        <table>
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

                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Pour le Montant de {{$value}} mois des Locaux qu il occupe a usage Habitation <br/>
                        Arrêter la presente quittance a la somme de :</br>
                        {{$vars.' DHS'}}

                        <p style="float:right">Signature</p>
<br/>
                        <p>...................................................................................................................................................................................</p>
<br/>
                         <h2>Quittance<small> pour la reception de reglement mensuel </small></h2>
              
              <p style="float:right">Date: {{date('d-m-Y')}}</p><br/><br/>
                                  
              <div style="float:left; border-style: groove;padding : 10px;">
                                        <b>Quittance #RA{{sprintf("%05d", $reglement->id)}}</b>
                                       
                                        <br>
                                        <b>Date:</b> {{date('d-m-Y',strtotime($reglement->created_at))}}
                                        <br>
                                        <b>Mode de paiement :<style>
              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
              }
              
              td, th {
                  border: 1px solid #dddddd;
                  text-align: left;
                  padding: 8px;
              }
              
              tr:nth-child(even) {
                  background-color: #dddddd;
              }
              </style></b> {{$types[$reglement->type]}}
                                        <br>
                                        <b>Observation:</b> {{$reglement->observation}}
                                      </div>
                                      <div style="float:right; border-style: groove;padding : 10px;">
                                      Locataire
                                      <address>
                                                      <strong>{{$reglement->lignapp->locataire->nom.' '.$reglement->lignapp->locataire->prenom}}</strong>
                                                      <br>{{ $reglement->lignapp->appartement->immeuble->zone->libelle.' '.$reglement->lignapp->appartement->immeuble->libelle.' '.$reglement->lignapp->appartement->libelle }}
                                                      <br><b>Date d'habitation :</b>{{date('d-m-Y',strtotime($reglement->lignapp->dateh))}}
                                                      <br><b>Phone:</b> {{$reglement->lignapp->locataire->gsm }}
                                                      <br>Fixe: {{$reglement->lignapp->locataire->fix}}
                                      </address>
                                    </div>
                                      </div>
              <br/><br/><br/><br/><br/><br/><br/><br/><br/>
                                      <table>
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
                                            <td>{{$reglement->lignapp->loyer}}</td>
                                            <td>{{ $mnt }}</td>
                                          </tr>
                                        
                                        </tbody>
                                      </table>
              
                                      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                      Pour le Montant de {{$value}} mois des Locaux qu il occupe a usage Habitation <br/>
                                      Arrêter la presente quittance a la somme de :</br>
                                      {{$vars.' DHS'}}
                                      <p style="float:right">Signature</p>