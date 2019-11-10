<section class="well-md text-center" >
	<div class="container">
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
			<div class="col-sm-preffix-1 col-sm-5 col-md-4 inset-1 wow fadeInRight"  id="contact" >
				<div class="line-right">
					<h4>Заполните контактную форму:</h4>
					<form class="m-mailform" method="post" action="<?php echo e(route('contacts')); ?>"> 
						<fieldset>
							<label data-add-placeholder>
								<input type="text" name="name" placeholder="Имя" data-constraints="@NotEmpty  @LettersOnly"/>
							</label>
							<label data-add-placeholder>
								<input type="text" name="email" placeholder="Почта" data-constraints="@NotEmpty  @Email"/>
							</label>
							<label data-add-placeholder>
								<input type="text" name="phone" placeholder="Телефон" data-constraints="@NotEmpty  @Phone"/>
							</label>
							<label data-add-placeholder>
								<textarea name="text" placeholder="Текст" data-constraints="@NotEmpty"></textarea>
							</label>
							<div class="mfControls btn-group text-center text-sm-left">
								<button class="btn btn-lg btn-primary" type="submit" data-hover="Отправить"></button>
							</div>
							<div class="mfInfo"></div>
						</fieldset>
						<?php echo app('captcha')->render($lang = 'ru');; ?>

						<?php echo e(csrf_field()); ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>