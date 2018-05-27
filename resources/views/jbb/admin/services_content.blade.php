
{{-- @if($categories) --}}

{{-- @foreach($categories as $k=>$category) --}}

{{-- $category --}}

{{-- @endforeach --}}
{{-- @endif --}}

<h3 >Услуги</h3>

{!! Html::link(route('admin.services.create'),'Добавить услугу',['class' => 'btn btn-success btn-lg pull-right btn-add','type'=>'button']) !!}

<table class="table table-striped table-hover">
<thead>
	
	<th>№</th>
	<th>Услуга</th>
	<th>Цена</th>		

</thead>
@if($services)

@foreach($services as $k=>$service)
<tbody>
<tr>
	<td>{{ $k+1 }}</td>
	<td>{{ $service->name }}</td>
	<td>{{$service->price }}</td>
	<td>	{!! Html::link(route('admin.services.edit',['services'=>$service->id]),'Изменить',['class'=>'btn btn-warning btn-block center-block','type'=>'button']) !!}
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