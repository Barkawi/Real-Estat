  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter detail : </h4>
        </div>
        <div class="modal-body">
         
		   <form class="form-horizontal form-label-left" action="{{ url('appartements/detail') }}" method="POST">
					
       {{ csrf_field() }}
					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Libelle </label>
                      
                        <div class="col-md-5 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="libelle"/>
                         
                           
                        </div>
						</div>
						<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12"> Qte </label>
						<div class="col-md-4 col-sm-9 col-xs-12">
						
						 <input type="number" class="form-control" name="qte"/>
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