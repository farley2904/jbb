@if($articles)

	@foreach($articles as $k=>$article)
		@if($article->category->alias == 'news')
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
					<h4><!-- <a href="{{ route('articles.show',['alias'=>$article->alias]) }}"> -->{{ $article->title }}<!-- </a> --></h4>
					{!! $article->desc !!}
					<!-- <a href="{{ route('articles.show',['alias'=>$article->alias]) }}" class="link">{{ trans('site.read_more') }}</a> -->
				</div>
			</div>
		</article>
		@endif
	@endforeach

	        <section class="pagination">
	        	@if($articles->lastPage()>1)
	        	<ul>

	        		@if($articles->currentPage() !==1 )
	        		<li><a href="{{ $articles->url($articles->currentPage()-1) }}" title="Назад" >&laquo;</a></li>
	        		@endif

	        		@for($i=1; $i <= $articles->lastPage(); $i++)
	        			@if( $articles->currentPage() == $i )
	        			<li><a title="" class="pag-active" >{{ $i }}</a></li>
	        			@else
	        			<li><a href="{{ $articles->url($i) }}" title="">{{ $i }}</a></li>
	        			@endif
	        		@endfor

	        		@if($articles->currentPage() !== $articles->lastPage() )
	        		<li><a href="{{ $articles->url($articles->currentPage()+1) }}" title="Вперед">&raquo;</a></li>
	        		@endif
                    
	        	</ul>
	        	@endif         
            </section>
 
@endif
 
