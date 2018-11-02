{{-- {!! Html::link(route('admin.articles.create'),'<i class="fa fa-add"></i>',['class' => 'btn btn-success waves-effect waves-light pull-right mb-4']) !!} --}}
{!! Html::decode(link_to_route('admin.articles.create', '<i class="fa fa-plus"></i>', array(), ['class' => 'btn btn-success waves-effect waves-light pull-right mb-4'])) !!}

<table class="table table-hover table-responsive-sm">
	<thead class="blue lighten-4">
		<tr>
			<th>#</th>
			<th>Заголовок</th>
			<th>Описание</th>
			<th>Изображение</th>
			<th>Добавлен</th>
			<th>Категория</th>
			<th>Действие</th>
		</tr>
	</thead>
	<tbody>
		@if($articles)
		@foreach($articles as $k=>$article)
		<tr >
			<td scope="row">{{ count($articles)-$k }}</td>
			<td>
				{!! Html::link(route('admin.articles.edit',['articles'=>$article->alias,]),$article->title,['class' => 'text-primary']) !!}
			</td>
			{{-- <td>{!!str_limit($article->text,200)!!}</td> --}}
			<td>{!! $article->desc !!}</td>
			<td>{!! Html::image(asset(env('THEME')).'/images/articles/'.$article->img,'alt',['width'=>'100','height'=>'100']) !!}</td>
			<td>{{$article->created_at}}</td>
			<td>{{$article->category->title}}</td>
			<td>
				{!! Form::open(['url' => route('admin.articles.destroy',['articles'=>$article->alias]),'method'=>'POST']) !!}

				{{ method_field('DELETE') }}

				{!! Form::button('<i class="fa fa-remove"></i>', ['class' => 'btn btn-danger waves-effect waves-light','type'=>'submit']) !!}

				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
		@endif

	</tbody>
	
</table>

{{ $articles->links() }}

 
