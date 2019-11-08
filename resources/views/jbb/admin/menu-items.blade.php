@foreach($items as $item)

{{--		<tr>
			<td style="text-align: left;">{{ $paddingLeft }} {!! Html::link(route('admin.menus.edit',['menus' => $item->id]),$item->title) !!}</td>
			<td>{{ $item->url() }}</td>

			<td>
			{!! Form::open(['url' => route('admin.menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
												    {{ method_field('DELETE') }}
												    {!! Form::button('Удалить', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']) !!}
												{!! Form::close() !!}

			</td>
		</tr>		
		 @if($item->hasChildren())
		        
		        @include(config('settings.theme').'.admin.custom-menu-items', array('items' => $item->children(),'paddingLeft' => $paddingLeft.'--'))

		 @endif
--}}
<div class="row border border-info">
    <div class="col pt-3">
      {!! Html::link(route('admin.menus.edit',['menus' => $item->id]),$item->title) !!}
	</div>

	<div class="col-2 blue lighten-5">
	</div>
	<div class="text-center col-md-2">
		@if($item->trashed)
		{!! Form::open(['url' => route('admin.menus.update',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
		{{ method_field('PUT') }}
		{!! Form::button('<i class="fa fa-plus"></i>', ['class' => 'btn btn-primary waves-effect waves-light','type'=>'submit']) !!}
		{!! Form::close() !!}
		@else
		{!! Form::open(['url' => route('admin.menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
		{{ method_field('DELETE') }}
		{!! Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']) !!}
		{!! Form::close() !!}
		@endif
	</div>
 </div>

@endforeach

<!-- <div class="container">
  <div class="row">
    <div class="col-4">.col-4</div>
    <div class="col-4">.col-4</div>
    <div class="col-4">.col-4</div>
  </div>

  <div class="row">
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
    <div class="col-sm-4">.col-sm-4</div>
  </div>

  <div class="row">
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
    <div class="col-md-4">.col-md-4</div>
  </div>

  <div class="row">
    <div class="col-lg-4">.col-lg-4</div>
    <div class="col-lg-4">.col-lg-4</div>
    <div class="col-lg-4">.col-lg-4</div>
  </div>

  <div class="row">
    <div class="col-xl-4">.col-xl-4</div>
    <div class="col-xl-4">.col-xl-4</div>
    <div class="col-xl-4">.col-xl-4</div>
  </div>
</div> -->