@if($menu)
<div class="rd-navbar-wrap">
	<nav class="rd-navbar" data-rd-navbar-lg="rd-navbar-fullwidth">
		<div class="rd-navbar-inner">
		 
			<div class="rd-navbar-panel">
			 
				<button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar"><span></span></button>
				 
				 
				<div class="rd-navbar-brand wow fadeInUp">
					<a href="{{ url(Jbb\Http\Middleware\LocaleMiddleware::getLocale() . '/') }}" class="rd-navbar-brand__name heading-2">{{ config('app.name', 'Jbb') }}</a>
				</div>
			 
			</div>
			 
			<div class="rd-navbar-nav-wrap">
				<ul class="rd-navbar-nav">
				@include(env('THEME').'.customMenuItems',['items'=>$menu->roots()])
			 	</ul>
			</div>
		</div>
	</nav>
</div>

@endif


