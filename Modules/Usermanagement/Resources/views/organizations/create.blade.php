
	<form action="{{$url}}" method="post">
		  <?=csrf_field()?>
		  <div class="row">
		  <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Organization Name</label>
		  	<input type="text" name="organizationname" class="form-control" required value="{{$model->organizationname}}">
		  	
		  </div>
		  <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Category</label>
		  	<select name="category" class="form-control" required>
		  		 <option value="">--select category---</option>
		  		<option>Placement Center</option>
		  		<option>Deployment Center</option>
		  		
		  	</select>
		  	
		  </div>
		   <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Organization Type</label>
		  	<select name="enitity_type" class="form-control" required>
                <option value="">--Select Type---</option>
		  		<option <?php if($model->enitity_type=="Ministry"):?>selected <?php endif;?>>Ministry</option>
		  		<option <?php if($model->enitity_type=="State Department"):?>selected <?php endif;?> >State Department</option>
		  		<option <?php if($model->enitity_type=="Commision"):?>selected <?php endif;?> >Commision</option>
		  		<option <?php if($model->enitity_type=="Agency"):?>selected <?php endif;?> >Agency</option>
		  		<option <?php if($model->enitity_type=="State Corporation"):?>selected <?php endif;?> >State Corporation</option>
		  		<option <?php if($model->enitity_type==">Public Univesity"):?>selected <?php endif;?> >Public Univesity</option>
		  		<option <?php if($model->enitity_type=="Others"):?>selected <?php endif;?> >Others</option>
		  		
		  	</select>
		  	
		  </div>
		  <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Contact Email Address</label>
		  	<input type="text" name="email_address" class="form-control" required value="{{$model->email_address}}">
		  	
		  </div>

		  <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Postal Address</label>
		  	<input type="text" name="postal_address" class="form-control" required value="{{$model->postal_address}}">
		  	
		  </div>

		  <div class="col-md-6 form-group">
		  	<label style="font-weight: normal;">Telephone</label>
		  	<input type="text" name="telephone" class="form-control" required value="{{$model->telephone}}">
		  	
		  </div>
		   <div class="col-md-12 form-group">
             <button class="btn btn-info"><?=($model->exists) ?"Update" :"Create"?></button>
		   </div>
		  </div>

		
	</form>
	
