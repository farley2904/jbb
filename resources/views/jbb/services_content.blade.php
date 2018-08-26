<section class="well-md text-center">
	<div class="container">
		<h1 class="section-head wow fadeInUp">Услуги и цены</h1>
		@if($services_cat)
			@foreach($services_cat as $k=>$cat)
				<h2 class="wow fadeInLeft">{{$cat->name}}</h2>
				@if($cat->services)
					@foreach($cat->services as $service)
						<div class="row text-sm-left">
							<div class="col-sm-preffix-1 col-sm-6 wow fadeInUp">	
								<h4>{{$service->name}}</h4>	
							</div>
							<div class="col-sm-preffix-2 col-sm-5 col-md-2 wow fadeInRight">
								<div class="line-right">
									<p class="heading-4 offset-1">{{$service->price}} грн.</p>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			@endforeach
		@endif
	</div>	
</section>













