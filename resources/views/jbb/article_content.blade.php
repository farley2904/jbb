@if($article)
<article>
	<div class="wow fadeInUp">
		<h4>{{ $article->title }}</h4>
		{{-- asset(env('THEME')).Config::get('settings.path').$article->img --}}
	</div>
	<div class="col-sm-preffix-1 wow fadeInRight">
		{!! $article->text !!}
		{{-- <time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('F d, Y') }}</time> --}}
	</div>
</article>
@endif
				               