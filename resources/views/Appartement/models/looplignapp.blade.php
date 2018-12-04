@foreach($lignapps as $d)

<!-- Modal -->
<div class="modal fade" id="uplign{{$d->id}}" role="dialog" charset="UTF-8">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modifier Lign appartement </h4>
      </div>
      <div class="modal-body">
       
     <form class="form-horizontal form-label-left" action="{{ url('appartements/lign/'.$d->id) }}" method="POST">
        
     {{ csrf_field() }}

      <input type="hidden" name="_method" value="PUT">
    
      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Locataire </label>
                      
                        <div class="col-md-5 col-sm-9 col-xs-12">
                        <select class="form-control" name="locataire">
                        @foreach($locataires as $l)
                        <option @if($l->id == $d->locataire_id) selected @endif value="{{ $l->id }}" > {{ $l->nom.' '.$l->prenom }} </option>
                        @endforeach
                        </select>
                         </div>
						</div>



						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Date d'habitation </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
					    
                        <input type="date" class="form-control" value="{{date('Y-m-d',strtotime($d->dateh))}}" min="{{ date('Y-m-d',strtotime($val)) }}" name="dateh" />
						
             

                        </div>
						</div>

                        <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Loyer </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
						 <input type="number" value="{{ $d->loyer }}" class="form-control" name="loyer"/>
						</div>
						</div>

                        <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Cotion </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
						 <input type="number" value="{{ $d->cotion }}" class="form-control" name="cotion"/>
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