
	<form action="{{$url}}" method="post">
		 <?=csrf_field()?>
		 <div class="row">
		 <div class="form-group col-md-6">
		 	<label>Name</label>
		 	<input type="text" name="name" class="form-control"  value="{{$user->name}}"  readonly>
		 	
		 </div>
		 <div class="form-group col-md-6">
		 	<label>Email Address</label>
		 	<input type="text" name="name" class="form-control"  value="{{$user->email}}"  readonly>
		 	
		 </div>


		 <div class="form-group col-md-6">
		 	<label>Password</label>
		 	<input type="password" name="password" class="form-control"    required>
		 	
		 </div>
		 <div class="form-group col-md-6">
		 	<label>Confirm Password</label>
		 	<input type="password" name="password_confirmation" class="form-control"  required  >
		 	
		 </div>
		  <div class="form-group col-md-6">
		 	<button class="btn btn-info">Reset</button>
		 	
		 </div>

</div>
		


	</form>
	
