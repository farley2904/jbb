<h4 class="card-title">{{$title}}</h4>
<div class="row">
	<div class="col-md-12 ">
		<form class="text-left border border-light p-4" method="post" action="{{route('admin.information.store')}}">
			{{ csrf_field() }}

			 <label>Логотип:</label>

				<div class="input-group mb-4">
				   <span class="input-group-btn">
				     <a id="lfm" data-input="thumbnail" data-preview="holder" class="border d-block">
				 		<img src="{{asset((old('logo_img'))?old('logo_img'):config('configuration.logo_img'))}}" width="100" height="100" id="holder">
				 		<!-- <img id="holder" style="margin-top:15px;max-height:100px;"> -->
				     </a>
				   </span>
				   <input id="thumbnail" class="form-control" type="hidden" value="{{(old('logo_img')?old('logo_img'):config('configuration.logo_img'))}}" name="logo_img">
				 </div>

				<label>Фон баннера:</label>

				<div class="input-group mb-4">
				   <span class="input-group-btn">
				     <a id="lfm2" data-input="thumbnail2" data-preview="holder2" class="border d-block">
				 		<img src="{{asset((old('header_bg'))?old('header_bg'):config('configuration.header_bg'))}}" width="100" height="100" id="holder2">
				 		<!-- <img id="holder" style="margin-top:15px;max-height:100px;"> -->
				     </a>
				   </span>
				   <input id="thumbnail2" class="form-control" type="hidden" value="{{(old('header_bg')?old('header_bg'):config('configuration.header_bg'))}}" name="header_bg">
				 </div>

			<ul class="nav nav-tabs" id="langTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="true">ru</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="ua-tab" data-toggle="tab" href="#ua" role="tab" aria-controls="ua" aria-selected="false">ua</a>
			  </li>
			</ul>

			<div class="tab-content" id="langTabContent">
				<div class="tab-pane fade show active" id="ru" role="tabpanel" aria-labelledby="ru-tab">
				   
					<!-- Site name -->

				    <label>Название:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Введите название сайта" name="name" value="{{(old('name'))?old('name'):config('configuration.name')}}">

				    <label>Слоган:</label>
				    {{-- <input type="text" id="" class="form-control mb-4" placeholder="Введите cлоган сайта" name="slogan" value="{{old('slogan')}}"> --}}



				    <input type="text" id="" class="form-control mb-4" placeholder="Введите cлоган сайта" name="slogan" value="{{ (old('slogan')) ? old('slogan')  : config('configuration.slogan')}}">

				    

				    <label>O Нас:</label>
				    <div class="form-group">
				        <textarea class="form-control rounded-0" id="editor" rows="3" placeholder="Информация о нас" name="about_us">{{(old('about_us'))?old('about_us'):config('configuration.about_us')}}</textarea>
				    </div>

				   	<label>Мета-тег Description (для поисковых систем):</label>
				    <div class="form-group">
				        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Введите описание для поисковых систем" name="meta_description">{{(old('meta_description'))?old('meta_description'):config('configuration.meta_description')}}</textarea>
				    </div>

				    <label></label>
				    <p class="h4 mb-2">Время работы</p>
				    <label>Пн-Сб</label>
					<div class="row">
						<div class="col">
							<input type="time" class="form-control" id="worktime" name="worktime">
						</div>
						<div class="col">
							<input type="time" class="form-control" id="worktime" name="worktime">
						</div>
					</div>
				     
				     <label>Вс</label>
					<div class="row mb-4">
						<div class="col">
							<input type="time" class="form-control" id="worktime" name="worktime">
						</div>
						<div class="col">
							<input type="time" class="form-control" id="worktime" name="worktime">
						</div>
					</div>			     

				    <p class="h4 mb-2">Контакты</p>
				    <!-- Adress -->
				    <label>Адресс:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Адресс" name="adress" value="{{(old('adress'))?old('adress'):config('configuration.adress')}}">

				    <!-- Telephone -->
				    <label>Телефоны:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Телефон 1" name="tel_1" value="{{(old('tel_1'))?old('tel_1'):config('configuration.tel_1')}}">
				    <input type="text" id="" class="form-control mb-4" placeholder="Телефон 2" name="tel_2" value="{{(old('tel_2'))?old('tel_2'):config('configuration.tel_2')}}">

				    <!-- Social -->
				    <!-- <label>Соцсети</label> -->
				    <div class="custom-control custom-checkbox mb-4">
				        <input type="checkbox" class="custom-control-input" id="soc" name="social" value="on" {{ old('social') ? 'checked' : '' }} >
				        <label class="custom-control-label" for="soc">Показать соцсети</label>
				    </div>
			  	</div>
			  
				<div class="tab-pane fade" id="ua" role="tabpanel" aria-labelledby="ua-tab">
					<p class="h4 mb-2 mt-4">Загальна</p>
					@if(isset($information))
						@foreach ($information as $setting)

							@if($setting->key == 'logo_img')
								</br>{{ $setting->value }}
							@endif

							@if($setting->key == 'name')
									</br>{{ $setting->value }}
							@endif

						@endforeach
					@endif

				  	<!-- Default switch -->
					<div class="custom-control custom-switch mb-4">
					  <input type="checkbox" class="custom-control-input" id="customSwitches">
					  <label class="custom-control-label" for="customSwitches"></label>
					</div>
					<select class="custom-select">
					  <option selected>Open this select menu</option>
					  <option value="1">One</option>
					  <option value="2">Two</option>
					  <option value="3">Three</option>
					</select>

					<label for="customRange1">Example range</label>
					<input type="range" class="custom-range" id="customRange1">
				</div>
			</div>

		    <!-- Update -->
		    <button class="btn btn-success" type="submit">Обновить</button>

		</form>

	</div>
</div>
<script>

 $( document ).ready(function() {
 	$('#lfm').filemanager('image');
 	$('#lfm2').filemanager('image');
	CKEDITOR.replace('editor');
});
</script>