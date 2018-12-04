
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
                <i class="fa fa-plus"></i> Ajouter Proprietaire
              </a>

    

<div class="modal fade" id="AddProprietaire" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nouveau Proprietaire</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ url('proprietaires') }}" method="POST">
					
               {{ csrf_field() }}
					 
     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nom et prenom </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Nom et prenom" value="{{ old('name') }}" name="name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Code Proprietaire</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Code Proprietaire" value="{{ old('code') }}" name="code">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> taux de gérance</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Taux de gérance" value="{{ old('tg') }}" name="tg">
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
              <h2>Proprietaires Table </h2>
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
                          <th>Code</th>
                          <th>Taux de gérance</th>
                        
          <th>Actions</th>
          
                          
                        </tr>
                      </thead>


                      <tbody>
                      @foreach ($proprietaires as $p)
        
      <tr>
                          <td>{{ $p->id }}</td>
                          <td>{{ $p->nom }} </td>
                          <td>{{ $p->codem }} </td>
                          <td>{{ $p->tg.' %' }} </td>
                      
                          <td>
                          <form action="{{ url('proprietaires/'.$p->id) }}" method="POST">
                          {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <a href="#" class="btn btn-success">Detail</a>
    <a href="#" data-toggle="modal" data-target="#UpProp{{ $p->id }}" class="btn btn-warning">Modifier</a>
                        <button type="submit"  class="deleteobj btn btn-danger">Supprimer</button>
    
                          </form>
     



  </td>
            </tr>
            @endforeach
        
                     
                     
                    </table>

                    @foreach ($proprietaires as $p)    
            <div class="modal fade" id="UpProp{{ $p->id }}" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Proprietaire {{ $p->id }}</h4>
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ 'proprietaires/'.$p->id }}" method="POST">
            {{ csrf_field() }}
               
					 <input type="hidden" name="_method" value="PUT">
     
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Nom et prenom </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Nom et prenom" value="{{ $p->nom}}" name="name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Code Proprietaire</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Code Proprietaire" value="{{ $p->codem }}" name="code">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> taux de gérance(%)</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="select2_group form-control" placeholder="Taux de gérance" value="{{ $p->tg }}" name="tg">
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