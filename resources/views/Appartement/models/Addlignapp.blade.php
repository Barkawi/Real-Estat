  <!-- Modal -->
  <div class="modal fade" id="addlign" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter Lign Appartement : </h4>
        </div>
        <div class="modal-body">
         <p>this appartement is free from : {{ $val }}</p>
		   <form class="form-horizontal form-label-left" action="{{ url('appartements/lign') }}" method="POST">
					
       {{ csrf_field() }}
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Locataire </label>
                      
                        <div class="col-md-5 col-sm-9 col-xs-12">
                        <select class="form-control" name="locataire">
                        @foreach($locataires as $l)
                        <option value="{{ $l->id }}" > {{ $l->nom.' '.$l->prenom }} </option>
                        @endforeach
                        </select>
                         </div>
						</div>

						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Date d'habitation </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
            @if($val != 1 && $val != null)
						 <input type="date" class="form-control" min="{{ date('Y-m-d',strtotime($val)) }}" name="dateh"/>
             @else
             <input type="date" class="form-control"  name="dateh"/>
             @endif
						</div>
						</div>

                        <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Loyer </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
						 <input type="number" class="form-control" name="loyer"/>
						</div>
						</div>

                        <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Cotion </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
						 <input type="number" class="form-control" name="cotion"/>
						</div>
						</div>


            <input type="hidden" value="{{$appartement->id}}" class="form-control" name="id"/>
					 

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