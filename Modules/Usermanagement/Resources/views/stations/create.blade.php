
	<form action="{{$url}}" method="post">
		  <?=csrf_field()?>
		  <div class="row">
		  	 <div class="col-md-6 form-group">
		  	<label>County Name</label>
		  <select name="countycode" class="form-control" required>
		  	 <option value="">---Select County---</option>
		  	   <?php foreach($counties as $county):?>
		  	   	<option   <?php if($model->countycode==$county->id):?>selected <?php endif;?> value="{{$county->id}}">{{$county->countyname}}</option>


		  	   <?php endforeach;?>
		  	
		  </select>
		  	
		  </div>
		  <div class="col-md-6 form-group">
		  	<label>Station Name</label>
		  	<input type="text" name="name" class="form-control" required value="{{$model->name}}">
		  	
		  </div>
		   <div class="col-md-12 form-group">
             <button class="btn btn-info"><?=($model->exists) ?"Update" :"Create"?></button>
		   </div>
		  </div>

		
	</form>
	
