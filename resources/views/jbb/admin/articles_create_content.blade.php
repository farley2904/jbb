{!! Form::open(['url' => (isset($article->id)) ? route('admin.articles.update',['articles'=>$article->alias]) : route('admin.articles.store'),'method'=>'POST','enctype'=>'multipart/form-data','role'=>'form' ]) !!}
	<div class="row">
	 	<div class="form-group col-md-6">	
			<label>
				<span class="">Название:</span><br />
				<span class="label">Заголовок материала</span><br />
			</label>
			{!! Form::text('title',isset($article->title) ? $article->title  : old('title'), ['placeholder'=>'Введите название страницы','class'=>'form-control ']) !!}
		</div>
		<div class="form-group col-md-6">
			<label>
				<span class="">Ключевые слова:</span><br />
				<span class="label">Заголовок материала</span><br />
			</label>		
			{!! Form::text('keywords', isset($article->keywords) ? $article->keywords  : old('keywords'), ['placeholder'=>'Введите название страницы','class'=>'form-control']) !!}	 	 
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-6">	 
			<label>
				<span class="">Мета описание:</span>
				<br />
				<span class="label">Заголовок материала</span><br />
			</label>		
			{!! Form::text('meta_desc', isset($article->meta_desc) ? $article->meta_desc  : old('meta_desc'), ['placeholder'=>'Введите название страницы','class'=>'form-control']) !!}		 	 	 
		</div>
		<div class="form-group col-md-6"> 
			<label>
				<span class="">Псевдоним:</span>
				<br />
				<span class="label">введите псевдоним</span><br />
			</label>
			
			{!! Form::text('alias', isset($article->alias) ? $article->alias  : old('alias'), ['placeholder'=>'Введите псевдоним страницы','class'=>'form-control']) !!}
		</div>	 
	</div>	
	<div class="row">
		<div class="form-group col-md-12"> 	 
			<label>
				 <span class="">Краткое описание:</span>
			</label>
			
			{!! Form::textarea('desc', isset($article->desc) ? $article->desc  : old('desc'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
		</div>
			
			
		<div class="form-group col-md-12">	
			<label>
				 <span class="">Описание:</span>
			</label>
			
			{!! Form::textarea('text', isset($article->text) ? $article->text  : old('text'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
		</div>
	</div>		
		
	@if(isset($article->img->path))
		<div class="row">		
			<div class="form-group col-md-6">			
				<label>
					 <span class="">Изображения материала:</span>
				</label>
				
				{{ Html::image(asset(config('settings.theme')).'/images/articles/'.$article->img->path,'',['style'=>'width:400px']) }}
				{!! Form::hidden('old_image',$article->img->path) !!}
			</div>		
		</div>			
	@endif
		
	<div class="row">		
		<div class="form-group col-md-6">	
			<label>
				<span class="">Изображение:</span><br />
				<span class="label">Изображение материала</span><br />
			</label>
				{!! Form::file('image', ['id' => 'file']) !!}
		</div>		 		
		<div class="form-group col-md-6">	
			<label>
				<span class="">Категория:</span><br />
				<span class="label">Категория материала</span><br />
			</label>
				{!! Form::select('category_id', $categories,isset($article->category_id) ? $article->category_id  : '',['class'=>'form-control']) !!}
		</div>		 
	</div>			 
		
	@if(isset($article->id))
		<input type="hidden" name="_method" value="PUT">				
	@endif
			
	{!! Form::button('Сохранить', ['class' => 'btn btn-success','type'=>'submit']) !!}			
		

{!! Form::close() !!}