
	<form action="{{$url}}" method="post">
		  <?=csrf_field()?>
		  <div class="row">
		  <div class="col-md-12 form-group">
		  	<label>Industry Name</label>
		  	<input type="text" name="industryname" class="form-control" required value="{{$model->industryname}}">
		  	
		  </div>
		   <div class="col-md-12 form-group">
             <button class="btn btn-info"><?=($model->exists) ?"Update" :"Create"?></button>
		   </div>
		  </div>

		
	</form>
	
