<h3 >Услуги</h3>

{!! Html::link(route('admin.services.create'),'Добавить новую услугу',['class' => 'btn btn-success btn-lg pull-right btn-add']) !!}

<table class="table table-striped table-hover table-responsive-sm">
<thead>
	
	<th>id</th>
	<th>Услуга</th>
	<th>Категория</th>
	<th>Цена</th>				

</thead>
@if($services)

@foreach($services as $k=>$service)
<tbody>
<tr>
	<td>{{ $service->id }}</td>
	<td>{{ $service->name }}</td>
	<td>{{ $service->serviceCategory->name }}</td>
	<td>{{ $service->price }} грн.</td>
	<td>	{!! Html::link(route('admin.services.edit',['services'=>$service->id]),'Изменить',['class'=>'btn btn-warning btn-block center-block']) !!}
	</td>
	<td>
		{!! Form::open(['url' => route('admin.services.destroy',['services'=>$service->id]),'method'=>'POST']) !!}

		{{ method_field('DELETE') }}

		{!! Form::button('Удалить', ['class' => 'btn btn-danger btn-block center-block','type'=>'submit']) !!}

		{!! Form::close() !!}
	</td>
</tr>
</tbody>
@endforeach
@endif
</table>