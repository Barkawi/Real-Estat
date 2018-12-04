@extends('layouts.master')

@section('content')

 <div class="right_col" role="main">
          <div class="">


@if(count($errors))

<script>
           function init_PNotify(){
 "undefined"!=typeof PNotify&&(console.log("init_PNotify"),
 new PNotify({
       title: 'Operation failed',
                                 text: '<ul>@foreach($errors->all() as $message) <li>{{$message}}</li>  @endforeach</ul>',
                                 type: 'error',
                                 nonblock: {
                                     nonblock: true
                                 },
                                
                                 styling: 'bootstrap3'
   })
   )
   };                    
</script>

@endif

@if(session()->has('success'))

<script>
           function init_PNotify(){
 "undefined"!=typeof PNotify&&(console.log("init_PNotify"),
 new PNotify({
       title: 'Success Operation',
                                 text: '{{ session()->get("success") }}',
                                 type: 'success',
                                 nonblock: {
                                     nonblock: true
                                 },
                                
                                 styling: 'bootstrap3'
   })
   )
   };                    
</script>

@endif

@if(session()->has('danger'))

<script>
           function init_PNotify(){
 "undefined"!=typeof PNotify&&(console.log("init_PNotify"),
 new PNotify({
       title: 'Operation Echoe',
                                 text: '{{ session()->get("danger") }}',
                                 type: 'danger',
                                 nonblock: {
                                     nonblock: true
                                 },
                                
                                 styling: 'bootstrap3'
   })
   )
   };                    
</script>

@endif


		  <a href="{{url('appartements')}}" class="btn btn-app">
                      <i class="fa fa-backward"></i> Appartements 
                    </a>
					
            <div class="page-title">
              <div class="title_left">
                <h3>Detail Appartement</h3>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view"  src="{{asset('image/people.png')}}" alt="Customer" title="Customer">
                        </div>
                      </div>
                      <h4><?=$appartement->immeuble->zone->libelle.' '.$appartement->immeuble->libelle.' '.$appartement->libelle?></h4>

                      <ul class="list-unstyled user_data">
                      
					
						
                      </ul>

                      <br />
 <a class="btn btn-info" href="#" target="_Blank"><i class="fa fa-edit m-right-xs"></i>Contrat de bail</a>
   @if(!empty($actif))
   	<a data-toggle="modal" data-target="#myModalEnc" class="btn btn-warning">Encaissement</a>
                     @endif
				


			

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                   
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Liste des equipements </a>
                          </li>
						    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">liste des reglements</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="locataire-tab" data-toggle="tab" aria-expanded="false">Detail Locataires</a>
                          </li>
                        
                         
                        </ul>

                        <div id="myTabContent" class="tab-content">
     <div role="tabpanel" class="tab-pane fade " id="tab_content3" aria-labelledby="locataire-tab">
     @if($test != 0)
     <a class="btn btn-success" data-toggle="modal" data-target="#addlign"><i class="fa fa-plus m-right-xs"></i> Ajouter Lign</a>
  @endif
 
     <table class=" data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nom et prenom</th>
                                  <th>Date d'habitation</th>
                                  <th> Date de sortie </th>
                                  <th>Tel</th>
                                  <th>Loyer</th>
                                  <th>Coution</th>
                                  <th> Etat </th>
                                 
                                </tr>
                              </thead>
                              <tbody>
							
              @foreach($lignapps as $l)
							  <tr>
                                  <td>{{$l->id}}</td>
                                  <td>{{$l->locataire->nom.' '.$l->locataire->prenom}}</td>
                                  <td>{{ date('d-m-Y',strtotime($l->dateh)) }}</td>
                                  @if($l->date_sortie != Null)
                                  <td> {{ date('d-m-Y',strtotime($l->date_sortie)) }} </td>
                                  @else
                                  <td>  </td>
                                  @endif
                                 <td> {{ $l->locataire->gsm }}</td>
                                 <td> {{ $l->loyer.' DHS' }} </td>
                                 <td> {{ $l->cotion.' DHS' }} </td>
                                 <td> @if($l->date_sortie == Null) <span class="btn-success"> active </span>  @else <span class="btn-danger"> out </span>  @endif </td>
                                 <td>
                                 <form action="{{ url('appartements/lign/'.$l->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                                <a href="#" data-toggle="modal" data-target="#uplign{{$l->id}}" class="btn btn-warning"> Updaate </a>
                                @if($l->date_sortie == Null)
                                 <a href="{{url('appartements/lign/out/'.$l->id)}}" class="btn btn-info">OUT</a>
                                 @elseif($l->date_sortie == $val && $count ==0)
                                 <a href="{{url('appartements/lign/in/'.$l->id)}}" class="btn btn-info">IN</a>
                                 @endif
                                 <button type="submit" class="deleteobj btn btn-danger">Delete</a>
                                 </form>
                                 </td>
                                </tr>
						@endforeach
							 
                                
                              </tbody>
                            </table>
                                          </div>

                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <a class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus m-right-xs"></i> Ajouter Detail</a>
  
						    <table class=" data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Libelle</th>
                                  <th>Detail</th>
                                 
                                </tr>
                              </thead>
                              <tbody>
							@foreach($details as $d)
							  <tr>
                                  <td>{{$d->id}}</td>
                                  <td>{{ $d->libelle }}</td>
                                  <td>{{ $d->qte }}</td>
                                 <td>
                                 <form action="{{ url('appartements/detail/'.$d->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                                <a href="#" data-toggle="modal" data-target="#updetail{{ $d->id }}" class="btn btn-warning"> Updaate </a>
                                 <button type="submit" class="deleteobj btn btn-danger">Delete</a>
                                 </form>
                                 </td>
                                </tr>
							  @endforeach
							 
                                
                              </tbody>
                            </table>
						   
                          

                            

                            <!-- end recent activity -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                             <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          

                          <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Date De Reglement</th>
                                <th>Reçu</th>
                                <th>Loyer</th>
                                <th>Type</th>
                                <th>Observation</th>
                                <th>De -> A (nbr des mois)</th>
                                <th>Montant total</th>
                                <th></th>
                               
								
                                
                              </tr>
                            </thead>


                            <tbody>
							@foreach($reglements as $r)
						<tr>
                                <td>{{$r->created_at}}</td>
                                <td>{{$r->id}}</td>
                                <td>{{ $r->lignapp->loyer.' DHS' }}</td>
                                <td>{{ $types[$r->type] }}</td>
                                <td>{{ $r->observation }}</td>
                                <?php 
                              $ts1 = strtotime($r->de);
                              $ts2 = strtotime($r->a);
                              
                              $year1 = date('Y', $ts1);  $year2 = date('Y', $ts2);
                              $month1 = date('m', $ts1); $month2 = date('m', $ts2);
                              
                              $value = (($year2 - $year1) * 12) + ($month2 - $month1+1);
                              $mnt  =  $r->lignapp->loyer * $value;
                                        ?>
                                         <td> {{ date('m-Y',strtotime($r->de)).' -> '.date('m-Y',strtotime($r->a)).' ('.$value.' months)' }} </td>
                               
                                <td>{{ $mnt.' DHS' }}</td>
                                
                                <td>

   <form action="{{ url('appartements/reglement/'.$r->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                                <a href="#" data-toggle="modal" data-target="#upreg{{$r->id}}" class="btn btn-warning"> Updaate </a>
                               
                                 <button type="submit" class="deleteobj btn btn-danger">Delete</button>
                                 <a target="_Blank" href="{{url('appartement/recu/'.$r->id)}}" class="btn btn-info">Quittance</a>
                                 </form>

					
								</td>
								  </tr>
								             @endforeach               
                             
                           
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                          </div>
						   
                        
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<!-- Modal Encaissement -->

@include('Appartement.models.enc')
<!-- End Modal Encaissement -->
 			
<!-- Modal Ajouter Detail -->
@include('Appartement.models.addDetail')
<!-- End Modal Ajouter detail -->

<!-- Modal Ajouter Lign Locataire -->
@include('Appartement.models.Addlignapp')
<!-- End Modal Ajouter lign Locataire -->


<!-- loop Update Detail -->
@include('Appartement.models.loopDetail')
<!-- End Loop -->

<!-- loop Update Lign -->
@include('Appartement.models.looplignapp')
<!-- End Loop -->

<!-- loop Encaissement -->
@include('Appartement.models.loopenc')
<!-- end loop-->

@endsection