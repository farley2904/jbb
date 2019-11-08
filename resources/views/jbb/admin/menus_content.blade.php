
<h3 class="title_page">Меню</h3>

@if($menus)
	<div class="container">
  		
			@include(env('THEME').'.admin.menu-items', array('items' => $menus->roots()))
	
	</div>
@endif
