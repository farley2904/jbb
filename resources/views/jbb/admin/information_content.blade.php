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
			     <!-- elfinder popup -->
			    <div class="mb-2">
			    	<a  href="" class="popup_selector" data-inputid="feature_image">Загрузить логотип</a>
			    	<img src="" alt="" >
					<input type="text" id="feature_image" class="form-control mb-4" name="feature_image" value="{{old('feature_image')}}">
			    </div>


			    <!-- Site name -->
			    <label>Название</label>
			    <input type="text" id="" class="form-control mb-4" placeholder="Введите название сайта" name="name" value="{{old('name')}}">

			    <label>Краткое описание</label>
			    <input type="text" id="" class="form-control mb-4" placeholder="Введите краткое описание" name="description" value="{{old('description')}}">

			    <label>O Нас</label>
			    <div class="form-group">
			        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Информация о нас" name="about_us">{{old('about_us')}}</textarea>
			    </div>

			   	<label>Мета-тег Description:</label>
			    <div class="form-group">
			        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Введите описание для поисковых систем" name="meta_description">{{old('meta_description')}}</textarea>
			    </div>
			     

			    <p class="h4 mb-2">Контакты</p>
			    <!-- Adress -->
			    <input type="text" id="" class="form-control mb-4" placeholder="Адресс" name="adress" value="{{old('adress')}}">

			    <!-- Telephone -->
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
			  	!!!УКРАЇНСЬКА!!!
			  	<!-- Default switch -->
				<div class="custom-control custom-switch mb-4">
				  <input type="checkbox" class="custom-control-input" id="customSwitches">
				  <label class="custom-control-label" for="customSwitches"></label>
				</div>
			  </div>
			</div>

		    <!-- Update -->
		    <button class="btn btn-success" type="submit">Обновить</button>

		</form>

	</div>
</div>
