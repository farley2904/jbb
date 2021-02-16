@if($paginator->lastPage()>1)
	<section>
		<ul class="pagination justify-content-center">

			@if($paginator->currentPage() !==1 )
			<li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->currentPage()-1) }}" title="Назад" >&laquo;</a></li>
			@endif

			@for($i=1; $i <= $paginator->lastPage(); $i++)
				@if( $paginator->currentPage() == $i )
				<li class="page-item active"><span class="page-link">{{ $i }}</span></li>
				@else
				<li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}" title="">{{ $i }}</a></li>
				@endif
			@endfor

			@if($paginator->currentPage() !== $paginator->lastPage() )
			<li class="page-item"><a  class="page-link" href="{{ $paginator->url($paginator->currentPage()+1) }}" title="Вперед">&raquo;</a></li>
			@endif
	        
		</ul>
	</section>
@endif         
