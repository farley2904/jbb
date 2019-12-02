<span class="icon icon-md wow fadeInUp">
    <a href="<?php echo e(route('home')); ?>" class="">
        <img src="<?php echo e(asset(env('THEME'))); ?>/images/<?php echo e($logo_img); ?>" title="Jbb" alt="" />
    </a>
</span>

<div class="rd-navbar-brand wow fadeInUp ">
    <a href="<?php echo e(url('/')); ?>" class="rd-navbar-brand__name heading-2"><?php echo e(config('configuration.name')); ?></a>
    <p class="rd-navbar-brand__slogan"><?php echo e((App::isLocale('ru'))?config('configuration.slogan'):config('configuration.slogan_ua')); ?></p>
</div>