@if($articles)

	@foreach($articles as $k=>$article)
		<article class="row text-sm-left news-post">
			<div class="col-sm-6 {{ ($k%2==0) ? '' : 'col-md-preffix-1 col-sm-push-2' }} wow fadeInUp">
				<div class="content">
					<div class="content__head">
						<span class="line">
							<time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('F d, Y') }}</time>
							<!-- <span class="icon icon-xs icon-primary material-icons-chat_bubble"></span> -->
							{{-- count($article->comments) ? count($article->comments) : '0' --}}
						</span>
					</div>
					<div class="image-wrap {{ ($k%2==0) ? 'shadow-right' : 'shadow-left' }}">
						<img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img }}" alt="" width="570" height="570">
					</div>
				</div>
			</div>
			<div class="col-sm-preffix-1 col-sm-5 col-md-4 inset-1 wow 	{{ ($k%2==0) ? 'fadeInRight' : 'col-sm-push-1 fadeInLeft' }}  ">
				<div class="{{ ($k%2==0) ? 'line-right' : 'line-left' }}">
					<h4><!-- <a href="{{-- route('articles.show',['alias'=>$article->alias]) --}}"> -->{{ $article->title }}<!-- </a> --></h4>
					{!! $article->desc !!}
					<!-- <a href="{{-- route('articles.show',['alias'=>$article->alias]) --}}" class="link">{{-- trans('site.read_more') --}}</a> -->
				</div>
			</div>
		</article>
	@endforeach
	
@if($articles instanceof \Illuminate\Pagination\LengthAwarePaginator )			
	{{ $articles->links(env('THEME').'.pagination') }}
@endif
 
@endif
 
