<div class="row">
	<div class="col-md-12">
		
	
	<table  class="table table-bordered">
		<thead class="table-info">
			<tr class="info">
		<th>Year</th>
	<?php foreach($models as $model):?>
		<th>{{$model->yearofadmission}}</th>

	 <?php endforeach;?>
</tr>
			
		</thead>
		<tbody>
			<tr class="info">
		<td>Number </td>
	<?php foreach($models as $model):?>
		<td>{{number_format($model->number,0)}}</td>

	 <?php endforeach;?>
</tr>
			
		</tbody>
	
	
</table>
</div>
	
</div>

