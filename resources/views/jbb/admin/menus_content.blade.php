<div id="content-page" class="content group">
				            <div class="hentry group">
<h3 class="title_page">Меню</h3>


<div class="short-table white">
	<table style="width: 100%" cellspacing="0" cellpadding="0">
	<thead>
		
		<th>Name</th>
		<th>Link</th>
		
		<th>Удалить</th>
	</thead>
	@if($menus)
	
		@include(env('THEME').'.admin.custom-menu-items', array('items' => $menus->roots(),'paddingLeft' => ''))
		
		
	@endif
	</table>
	</div>
	
</div>
</div>