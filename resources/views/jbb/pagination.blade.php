<section class="pagination">
	        	@if($paginator->lastPage()>1)
	        	<ul>

	        		@if($paginator->currentPage() !==1 )
	        		<li><a href="{{ $paginator->url($paginator->currentPage()-1) }}" title="Назад" >&laquo;</a></li>
	        		@endif

	        		@for($i=1; $i <= $paginator->lastPage(); $i++)
	        			@if( $paginator->currentPage() == $i )
	        			<li><a title="" class="pag-active" >{{ $i }}</a></li>
	        			@else
	        			<li><a href="{{ $paginator->url($i) }}" title="">{{ $i }}</a></li>
	        			@endif
	        		@endfor

	        		@if($paginator->currentPage() !== $paginator->lastPage() )
	        		<li><a href="{{ $paginator->url($paginator->currentPage()+1) }}" title="Вперед">&raquo;</a></li>
	        		@endif
                    
	        	</ul>
	        	@endif         
</section>