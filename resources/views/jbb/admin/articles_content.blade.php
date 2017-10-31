@if($articles)

	@foreach($articles as $k=>$article)

		<article style="margin-bottom:20px;background:#fff;">

		&nbsp; {{ $article->id }} . &nbsp;
			
		<img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img }}" alt="" width="100" height="100">
			

		&emsp; {{ $article->title }} &emsp;

		{!! $article->desc !!}

		</article>

	@endforeach

 
@endif
 
