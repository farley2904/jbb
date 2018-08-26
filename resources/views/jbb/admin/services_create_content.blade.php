{!! Form::open(['url' => (isset($service->id)) ? route('admin.services.update',['services'=>$service->id])
 : route('admin.services.store'),'method'=>'POST','enctype'=>'multipart/form-data','role'=>'form' ]) !!}
	<div class="row">
	 	<div class="form-group col-md-6">	
			<label>
				<span class="">Имя сервиса:</span>
			</label>
			{!! Form::text('name',isset($service->name) ? $service->name  : old('name'), ['placeholder'=>'Введите имя сервиса','class'=>'form-control ']) !!}
		</div>
		<div class="form-group col-md-3">
			<label>
				<span class="">Цена:</span>
			</label>		
			{!! Form::text('price', isset($service->price) ? $service->price  : old('price'), ['placeholder'=>'Введите цену','class'=>'form-control']) !!}	 	 
		</div>
		<div class="form-group col-md-3">
			<label>
				<span class="">Категория:</span>
			</label>		
			{!! Form::select('service_category', $categories, isset($service->service_category) ? $service->service_category  : old('service_category'), ['class'=>'form-control']) !!}	 	 
		</div>
	</div>	 
		
	@if(isset($service->id))
		<input type="hidden" name="_method" value="PUT">				
	@endif
			
	{!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}			
		

{!! Form::close() !!}