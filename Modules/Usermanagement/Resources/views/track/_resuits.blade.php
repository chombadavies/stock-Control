<div class="table-responsive" style="margin-top: 1%;">
	<table class="table table-bordered table-striped" style="border-radius: 2%;">
		<thead class="table-info">
			<tr>
				<th>Name</th>
				<th>Year</th>
				<th>Description</th>
				<th>Stage/Other Details</th>
				<th>Contact</th>
				<th>System Date</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($models as $model):?>
				<tr>
					<td>{{$model->name}}</td>
					<td>{{$model->year}}</td>
					<td>{{$model->event_description}}</td>
					<td>{{$model->organization}}</td>
					<td>{{$model->phone}}</td>
					<td>{{$model->created_at}}</td>
				</tr>

			 <?php endforeach;?>
		</tbody>
		
	</table>
	
</div>