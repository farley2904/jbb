<section class="well-md text-center" id="contact" data-type="anchor">
<div class="container">


<?php if(count($errors) > 0): ?>
    <div class="box error-box">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p style="color:red" ><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(session('status')): ?>
    <div class="box success-box">
        <p style="color:green" ><?php echo e(session('status')); ?></p>
    </div>
<?php endif; ?>

<!-- <h1 class="section-head-left">Напишите нам</h1> -->
<div class="row text-sm-left">
<div class="col-sm-6 wow fadeInUp">
<div class="content">
<div class="content__head">
<span class="line">Пожалуйста свяжитесь с нами</span>
</div>
<div class="image-wrap shadow-right">
 
<div class="rd-google-map">
<div id="google-map" class="rd-google-map__model" data-zoom="14" data-x="30.506748" data-y="50.452182"></div>
<ul class="rd-google-map__locations">
<li data-x="30.506748" data-y="50.452182">
<p>Киев, ул. Олеся Гончара, 24б</p>
<span>+38 097 8614120</span><br>
<span>+38 097 5437548</span>
</li>
</ul>
</div>
 
</div>
</div>
</div>


<div class="col-sm-preffix-1 col-sm-5 col-md-4 inset-1 wow fadeInRight">
<div class="line-right">
<h4>Заполните контактную форму:</h4>
 
<form class="m-mailform" method="post" action="<?php echo e(route('contacts')); ?>">
 
<!-- <input type="hidden" name="form-type" value="contact"/> -->
 
<fieldset>
<label data-add-placeholder>
<input type="text" name="name" placeholder="Имя" data-constraints="@NotEmpty  @LettersOnly"/>
</label>
<label data-add-placeholder>
<input type="text" name="email" placeholder="Email" data-constraints="@NotEmpty  @Email"/>
</label>
<label data-add-placeholder>
<textarea name="text" placeholder="Текст" data-constraints="@NotEmpty"></textarea>
</label>
<div class="mfControls btn-group text-center text-sm-left">
<button class="btn btn-lg btn-primary" type="submit" data-hover="Отправить"></button>
</div>
<div class="mfInfo"></div>
</fieldset>
<?php echo e(csrf_field()); ?>

</form>

 
</div>
</div>
</div>
</div>
</section>