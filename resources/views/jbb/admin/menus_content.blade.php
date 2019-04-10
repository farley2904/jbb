
<h3 class="title_page">Меню</h3>

@if($menus)

	@include(env('THEME').'.admin.menu-items', array('items' => $menus->roots(),'paddingLeft' => ''))
	
	
@endif
