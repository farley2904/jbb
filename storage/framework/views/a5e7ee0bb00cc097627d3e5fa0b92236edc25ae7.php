	<div id="lang" class="wow fadeInRight">
	<select id="soflow"  onChange="console.log(this.options[this.selectedIndex]);if(this.options[this.selectedIndex].value!=''){window.location=this.options[this.selectedIndex].value}else{this.options[selectedIndex=0];}">
		<?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<option <?php if($lang->locale == config('app.locale')) {echo 'selected';} ?> value="/lang/<?php echo e($lang->locale); ?>"><?php echo e($lang->name); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
	</div>
