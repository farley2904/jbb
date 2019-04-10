@foreach($items as $item)

	{{ $paddingLeft }} {!! Html::link(route('admin.menus.edit',['menus' => $item->id]),$item->title) !!}

	{{ $item->url() }}
	
	{!! Form::open(['url' => route('admin.menus.destroy',['menus'=> $item->id]),'class'=>'form-horizontal','method'=>'POST']) !!}
	
		{{ method_field('DELETE') }}
		
		{!! Form::button('Удалить', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']) !!}
		
	{!! Form::close() !!}
	
	@if($item->hasChildren())  
	    
	    @include(config('settings.theme').'.admin.custom-menu-items', array('items' => $item->children(),'paddingLeft' => $paddingLeft.'--'))
	    
	@endif
	
@endforeach