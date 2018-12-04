
@extends('layouts.master')

@section('content')
      <!-- page content -->
		
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
<a href="{{url('Zones')}}" class="btn btn-app">
                <i class="fa fa-mail-reply"></i> Zones
              </a>

<a data-toggle="modal" data-target="#AddImmeuble" class="btn btn-app">
                <i class="fa fa-plus"></i> Ajouter Immeuble
              </a>

    

<div class="modal fade" id="AddImmeuble" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nouveau Immeuble</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ url('Immeubles/zone') }}" method="POST">
					
               {{ csrf_field() }}
					 
     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Adresse </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="libelle" value="{{ old('libelle') }}" name="libelle">
                        </div>
                      </div>

                         
                            <input type="hidden" name="zone" value="{{$zone->id}}"/>
                     

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proprietaire </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" name="prop">
                        @foreach($proprietaires as $p)
                        <option value="{{ $p->id }}">{{ $p->nom.' '.$p->prenom }}</option>
                        @endforeach
                        </select>
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                      </div>

                    </form>
		 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
   
      
    </div>
	</div>
  </div>

      <div class="clearfix"></div>

      <div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Immeubles Table </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-print"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a target="_Blank" href="PDFS/ListApp.php">Print</a>
                    </li>
                   
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    

                    <table id="datatable-keytable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Adresse</th>
                          <th>Proprietaire</th>
                          <th>Zone</th>
                        
          <th>Actions</th>
          
                          
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($immeubles as $i)
        
      <tr>
                          <td>{{ $i->id }}</td>
                          <td>{{ $i->libelle }} </td>
                          <td> {{ $i->proprietaire->nom }} </td>
                          <td> {{ $i->zone->libelle }} </td>
                          
                          <td>
                          <form action="{{ url('Immeubles/'.$i->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <a href="#" class="btn btn-success">Detail</a>
    <a href="#" data-toggle="modal" data-target="#UpImeuble{{ $i->id }}" class="btn btn-warning">Modifier</a>
                        <button id="deleteimm" type="submit"  class="btn btn-danger">Supprimer</button>
    
                          </form>
     



  </td>
            </tr>
            @endforeach
        
                     
                     
                    </table>

                    @foreach ($immeubles as $i)    
            <div class="modal fade" id="UpImeuble{{ $i->id }}" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Immeuble {{ $i->id }}</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ 'Immeubles/'.$i->id }}" method="POST">
            {{ csrf_field() }}
               
					 <input type="hidden" name="_method" value="PUT">
     
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Adresse </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="libelle" value="{{ $i->libelle }}" name="libelle">
                        </div>
                      </div>


                    <input type="hidden" value="{{ $zone->id }}" name="zone"/>


                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Proprietaire </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" name="prop">
        

                        @foreach($proprietaires as $p)
                        <option @if($i->prop_id == $p->id) {{'selected'}} @endif value="{{ $p->id }}">{{ $p->nom }}</option>
                        @endforeach
                        </select>
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                      </div>

                      

                    </form>
		 

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
   
      
    </div>
	</div>
  </div>

  @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection