<h4 class="card-title">{{$title}}</h4>
<div class="row">
	<div class="col-md-12 ">
		<form class="text-left border border-light p-4" method="post" action="{{route('admin.information.store')}}">
			{{ csrf_field() }}

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
					<p class="h4 mb-2 mt-4">Общая</p>
				    <label>Логотип:</label>

			

				<div class="input-group">
				   <span class="input-group-btn">
				     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
				       <i class="fa fa-picture-o"></i>
				     </a>
				   </span>
				   <input id="thumbnail" class="form-control" type="hidden" name="filepath" style="margin: 0.6em 0">
				 </div>
				 <img id="holder" style="margin-top:15px;max-height:100px;"><br>
					<!-- Site name -->

					{{-- {{dump(old('name'))}} --}}
				    <label>Название:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Введите название сайта" name="name" value="{{(old('name'))?old('name'):config('configuration.name')}}">

				    <label>Слоган:</label>
				    {{-- <input type="text" id="" class="form-control mb-4" placeholder="Введите cлоган сайта" name="slogan" value="{{old('slogan')}}"> --}}



				    <input type="text" id="" class="form-control mb-4" placeholder="Введите cлоган сайта" name="slogan" value="{{ (old('slogan')) ? old('slogan')  : config('configuration.slogan')}}">

				    

				    <label>O Нас:</label>
				    <div class="form-group">
				        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Информация о нас" name="about_us">{{(old('about_us'))?old('about_us'):config('configuration.about_us')}}</textarea>
				    </div>

				   	<label>Мета-тег Description:</label>
				    <div class="form-group">
				        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Введите описание для поисковых систем" name="meta_description">{{old('meta_description')}}</textarea>
				    </div>

<!-- 				    <label></label>
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
					</div>	 -->		     

				    <p class="h4 mb-2">Контакты</p>
				    <!-- Adress -->
				    <label>Адресс:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Адресс" name="adress" value="{{old('adress')}}">

				    <!-- Telephone -->
				    <label>Телефоны:</label>
				    <input type="text" id="" class="form-control mb-4" placeholder="Телефон 1" name="tel_1" value="{{old('tel_1')}}">
				    <input type="text" id="" class="form-control mb-4" placeholder="Телефон 2" name="tel_2" value="{{old('tel_2')}}">

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
});
</script>