
	<form action="{{$url}}" method="post">
		 <?=csrf_field()?>
		 <div class="row">
		 	 <div class="col-md-6 form-group">
		 	<label>Service Number</label>
		 	<input type="text" readonly  class="form-control" value="{{@$paramilitary->servicenumber}}">
		 	
		 </div>
		 <div class="col-md-6 form-group">
		 	<label>Date of Exit</label>
		 	<input type="date" name="date"  class="form-control" value="<?=date('Y-m-d')?>">
		 	
		 </div>
		 <div class="col-md-6 form-group">
		 	<label>Type of Exit</label>
		 	 <select id="typeofexit" name="typeofexit" class="form-control select2" style="width: 100%;" readonly required >
                              <option value="" selected>select type of exit...</option>
                              <option value="Dismissal">Dismissal</option>
                              <option value="Desertion">Desertion</option>
                              <option value="Voluntary">Voluntary</option>
                            </select>
		 	
		 </div>
		 <div class="col-md-12 form-group">
		 	<label>Reason</label>
		 	<textarea name="reason" class="form-control" required>{{$paramilitary->reason}}</textarea>
		 	
		 </div>
		  <div class="col-md-12 form-group">
               <button class="btn btn-info">Complete</button>
		  </div>
		 	
		 </div>
		
		

	</form>
	
