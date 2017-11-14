<table class="table table-striped table-bordered table-hover">
	<thead class="thead-inverse">
		<tr>
			<th>ID</th>
			<th>Заголовок</th>
			<th>Описание</th>
			<th>Изображение</th>
			<th>Псевдоним</th>
			<th>Категория</th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody>
		@if($articles)
		@foreach($articles as $k=>$article)
		<tr >
			<td>{{ $article->id }}</td>
			<td>{{ $article->title }}</td>
			<td>{{ $article->desc }}</td>
			<td>
					<!-- <img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img }}" alt="" width="100" height="100"> -->
					{!! Html::image(asset(env('THEME')).'/images/articles/'.$article->img,'alt',['width'=>'100','height'=>'100']) !!}
			</td>
			<td>{{$article->alias}}</td>
			<td>{{$article->category->title}}</td>
			<td>
				<!-- <button type="button" class="btn btn-warning btn-block center-block">Изменить</button> -->

				{!! Html::link(route('admin.articles.edit',['articles'=>$article->alias]),'Изменить',['class'=>'btn btn-warning btn-block center-block','type'=>'button']) !!}

				</br>

				{!! Form::open(['url' => route('admin.articles.destroy',['articles'=>$article->alias]),'method'=>'POST']) !!}

				{{ method_field('DELETE') }}

				{!! Form::button('Удалить', ['class' => 'btn btn-danger btn-block center-block','type'=>'submit']) !!}

				{!! Form::close() !!}
		</td>

		</tr>
		@endforeach
		@endif

	</tbody>
	
</table>

{!! Html::link(route('admin.articles.create'),'Добавить новый материал',['class' => 'btn btn-success btn-lg','type'=>'button']) !!}

 
