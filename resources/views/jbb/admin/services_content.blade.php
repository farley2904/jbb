<h3 >Услуги</h3>
<div class="row">
<div class="col">
{!! Html::decode(link_to_route('admin.services.create', '<i class="fa fa-plus"></i>', array(), ['class' => 'btn btn-success pull-right btn-add'])) !!}
</div>
</div>
<table class="table table-striped table-hover table-responsive-md">
<thead>
	
	<th>id</th>
	<th>Услуга</th>
	<th>Категория</th>
	<th>Цена</th>				

</thead>
@if($services)
<tbody>
@foreach($services as $k=>$service)
<tr>
	<th scope="row">{{ $service->id }}</th>
	<td>{{ $service->name }}</td>
	<td>{{ $service->serviceCategory->name }}</td>
	<td>{{ $service->price }} грн.</td>
	<td>
		<a href="{{route('admin.services.edit',['services'=>$service->id])}}" class="btn btn-warning" id="btn-link" role="button"><i class="fa fa-edit"></i></a>
	</td>
	<td>
		{!! Form::open(['url' => route('admin.services.destroy',['services'=>$service->id]),'method'=>'POST']) !!}

		{{ method_field('DELETE') }}

		{!! Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger','type'=>'submit']) !!}

		{!! Form::close() !!}
	</td>
</tr>
@endforeach
</tbody>
@endif
</table>