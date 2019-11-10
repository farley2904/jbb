
<section class="well-md text-center">


<div class="container" data-lightbox="gallery">
 <div class="btn-group">

		@foreach($filters as $filter)
			<a href="{{ route('portfoliosFilter',['filter_alias' => $filter->alias]) }}">

			
				<div class="p-filter btn btn-sm btn-default{{ (URL::current() == route('portfoliosFilter',['filter_alias' => $filter->alias])) ? "-active" : '' }}">{{ $filter->title }}</div>
			</a>
		@endforeach
    </div>

<h1 class="section-head-left">{{ $title }}</h1>

@if($portfolios)

@foreach($portfolios->chunk(2) as $chunk)

<div class="row text-sm-left">

@foreach($chunk as $k=>$portfolio)

<div class="col-sm-6 wow {{ ($k%2==0) ? 'fadeInRight' : 'fadeInLeft' }}">
<div class="image-wrap {{ ($k%2==0) ? 'shadow-right postfix-1' : 'shadow-left preffix-1' }} ">

<a href="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->path }}" class="thumb thumb--effect-apollo" data-lightbox="image">

<img src="{{ asset(env('THEME')) }}/images/portfolios/{{ $portfolio->img->lg }}" data-srcset-base="{{ asset(env('THEME')) }}/images/portfolios/" data-srcset-ext="_{{ $portfolio->img->path }}" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="540" height="540">

<div class="thumb__overlay"></div>
</a>
</div>
</div>

@endforeach

</div>


@endforeach

@endif
</div>
</section>
