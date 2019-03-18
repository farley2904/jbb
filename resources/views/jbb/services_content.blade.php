<section class="well-md text-center">
	<div class="container">

		<h1 class="section-head wow fadeInUp">{{$title}}</h1>

		@if($services_cat)
			<div class="row" >
				@foreach($services_cat as $k=>$cat)
					<h3 >{{$cat->name}}</h3>
					<div class=" col-lg-preffix-1 wow fadeInLeft">
						@if($cat->services)
							@foreach($cat->services as $service)			
								{{$service->name}} - {{$service->price}} грн.
							@endforeach
						@endif
		            </div>
				@endforeach
			</div>
		@endif

	</div>	
</section>





