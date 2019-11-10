
<h3 class="title_page">Меню</h3>

<?php if($menus): ?>
	<div class="container">
  		
			<?php echo $__env->make(env('THEME').'.admin.menu-items', array('items' => $menus->roots()), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	</div>
<?php endif; ?>
