@foreach($reglements as $d)

<!-- Modal -->
<div class="modal fade" id="upreg{{$d->id}}" role="dialog" charset="UTF-8">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier Encaissement Recu = RC{{$d->id}} </h4>
      </div>
      <div class="modal-body">
       
     <form class="form-horizontal form-label-left" action="{{ url('appartements/reglement/'.$d->id) }}" method="POST">
        
     {{ csrf_field() }}

      <input type="hidden" name="_method" value="PUT">
      <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12"> De  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input onchange="myFunction()" id="de" type="month" value="{{date('Y-m',strtotime($d->de))}}" class="form-control"   name="de">
                        
                        </div>
						
                      </div>

					  <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12"> A  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="month" id="a" class="form-control" value="{{date('Y-m',strtotime($d->a))}}"  name="a">
                        
                        </div>
						
                      </div>
            
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Type  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="selectpicker show-tick form-control" data-live-search="true" name="type">
                            <optgroup label="Type De Reglement">
							
                              <option @if($d->type == 0) selected @endif value="0">Espece</option>
                              <option @if($d->type == 1) selected @endif value="1">Virement</option>
                              <option @if($d->type == 2) selected @endif value="2">Cheque</option>
                             
                            </optgroup>
                           
                           
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Observations </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" value="{{ $d->observation }}" class="select2_group form-control" name="observation">
                            
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
      
    </div>
    
  </div>
</div>

                          @endforeach