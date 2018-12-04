
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
    )};                    
 </script>

@endif

<a data-toggle="modal" data-target="#AddProprietaire" class="btn btn-app">
                <i class="fa fa-plus"></i> Ajouter Locataire
              </a>

    

<div class="modal fade" id="AddProprietaire" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nouveau Locataire</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ url('locataires') }}" method="POST">
					
               {{ csrf_field() }}
					 
     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nom </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" value="{{ old('nom') }}" name="nom">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Prenom</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('prenom') }}" name="prenom">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> CIN</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('cin') }}" name="cin">
                        </div>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fonction</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('fonction') }}" name="fonction">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Situation Familial</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" value="old('sf')" name="sf">
                        <option value="1">Marié</option>
                        <option value="0">celibataire</option>
                        </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sex</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" value="old('sex')" name="sex">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date de naissance</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="select2_group form-control"  value="{{ old('daten') }}" name="daten">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Lieu de naissance</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('lieun') }}" name="lieun">
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> GSM </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('gsm') }}" name="gsm">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fix </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('fix') }}" name="fix">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Banque </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('banque') }}" name="banque">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Compte </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ old('compte') }}" name="compte">
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
              <h2>Locataires Table </h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-print"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a target="_Blank" href="#">Print</a>
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
                          <th>Nom et prenom</th>
                          <th>CIN</th>
                          <th>Fonction</th>
                          <th>Situation familial</th>
                          <th>Sex</th>
                          <th>date de naissance</th>
                          <th>Lieu de naissance</th>
                          <th>GSM</th>
                          <th>Fix</th>
                          <th> Banque </th>
                          <th> Compte </th>
                        
          <th>Actions</th>
          
                          
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($locataires as $p)
        
      <tr>
      <th>{{ $p->id }}</th>
                          <th>{{$p->nom.' '.$p->prenom}}</th>
                          <th>{{ $p->cin }}</th>
                          <th>{{$p->fonction}}</th>
                          <th>{{ $sf[$p->sf] }}</th>
                          <th>{{ $sex[$p->sex] }}</th>
                          <th>{{ $p->datenai }}</th>
                          <th>{{ $p->lieunai }}</th>
                          <th>{{ $p->gsm }}</th>
                          <th>{{ $p->fix }}</th>
                          <th> {{ $p->banque }} </th>
                          <th> {{$p->compte}} </th>
                      
                          <td>
                          <form action="{{ url('locataires/'.$p->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <a href="#" class="btn btn-success">Detail</a>
    <a href="#" data-toggle="modal" data-target="#UpLoc{{ $p->id }}" class="btn btn-warning">Modifier</a>
                        <button type="submit"  class="deleteobj btn btn-danger">Supprimer</button>
    
                          </form>
     



  </td>
            </tr>
            @endforeach
        
                     
                     
                    </table>

                    @foreach ($locataires as $p)    
            <div class="modal fade" id="UpLoc{{ $p->id }}" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Locataire {{ $p->id }}</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ 'locataires/'.$p->id }}" method="POST">
            {{ csrf_field() }}
                 <input type="hidden" name="_method" value="PUT">

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nom </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" value="{{ $p->nom }}" name="nom">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Prenom</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->prenom }}" name="prenom">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> CIN </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->cin }}" name="cin">
                        </div>
                      </div>
                     
                      <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fonction </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                           <input type="text" class="select2_group form-control"  value="{{ $p->fonction }}" name="fonction">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Situation Familial</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" value="{{ $p->sf }}" name="sf">
                        
                        <option @if($p->sf == 0) {{' selected' }} @endif value="0">celibataire</option>
                        <option @if($p->sf == 1) {{' selected' }} @endif value="1">Marié</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Sex</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control" value="{{ $p->sex }}" name="sex">
                        
                        <option @if($p->sex == 0) {{' selected' }} @endif  value="0">Female</option>
                        <option @if($p->sex == 1) {{' selected' }} @endif  value="1">Male</option>
                        </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Date de naissance</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="date" class="select2_group form-control"  value="{{ date('Y-m-d',strtotime($p->datenai)) }}" name="daten">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Lieu de naissance</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->lieunai }}" name="lieun">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> GSM </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->gsm }}" name="gsm">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Fix </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->fix }}" name="fix">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Banque </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->banque }}" name="banque">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Compte </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control"  value="{{ $p->compte }}" name="compte">
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