
<?php if(count($slider)>0): ?>
 <div id="block-for-slider">
        <div id="viewport">
            <ul id="slidewrapper">
            	<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <li class="slide"><img src="<?php echo e(asset(env('THEME'))); ?>/images/sliders/<?php echo e($slide->img); ?>" title="Jbb" alt="" /></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>

             <div id="prev-next-btns">
                <div id="prev-btn"></div>
                <div id="next-btn"></div>
            </div>
            <ul id="nav-btns">
            	<?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <li class="slide-nav-btn"></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
