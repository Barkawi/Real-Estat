 <!-- Modal -->
 <div class="modal fade" id="myModalEnc" role="dialog" charset="UTF-8">
    <div class="modal-dialog">
    <?php if($lastreg == null){
      if($actif != null){
      $lastreg = $actif->dateh; 
      }
      else{
        $lastreg = date('Y,m-d');
      }
    } ?>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <?php $newdate = date('Y-m', strtotime("+1 months", strtotime($lastreg))); ?>
          <h4 class="modal-title">Encaissement : ( {{ $newdate }}) </h4>
          @if($actif != null)
          {{ 'Date d habitation :'.date('d-m-Y',strtotime($actif->dateh)) }}
          @endif

        
        </div>
        <div class="modal-body">
         
		    <form class="form-horizontal form-label-left" action="{{ url('appartements/reglement') }}" method="POST">
        {{ csrf_field() }}
           <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12"> De  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input onchange="myFunction()" id="de" type="month" min="{{$newdate}}" class="form-control"   name="de">
                        
                        </div>
						
                      </div>

					  <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12"> A  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="month" id="a" class="form-control" min="{{$newdate}}"  name="a">
                        
                        </div>
						
                      </div>
              @if(!empty($actif))
              <input type="hidden" value="{{ $actif->id }}" name="lign"/>
					    @endif
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Type  </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="selectpicker show-tick form-control" data-live-search="true" name="type">
                            <optgroup label="Type De Reglement">
							
                              <option  value="0">Espece</option>
                              <option  value="1">Virement</option>
                              <option  value="2">Cheque</option>
                             
                            </optgroup>
                           
                           
                          </select>
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Observations </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text"  class="select2_group form-control" placeholder="Observation" name="observation">
                            
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
    
				