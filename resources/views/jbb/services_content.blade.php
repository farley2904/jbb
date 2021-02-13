<section class="well-md text-center">
	<div class="container">

		<h2 class="section-head wow fadeInUp">{{$title}}</h2>

		@if($services_cat)

			<div class="row" >
				@foreach($services_cat as $k=>$cat)
					<h3 >{{$cat->name}}</h3>
					<div class="service-table col-lg-preffix-1 wow fadeInUp">
					<table>
					  <thead>
					    <tr>
					      <th>Услуга</th>
					      <th>Цена</th>
					    </tr>
					  </thead>
						<tbody>

						@if($cat->services)
							@foreach($cat->services as $service)
							    <tr>
							      <td data-label="Услуга">{{$service->name}}</td>
							      <td data-label="Цена">{{$service->price}} грн.</td>
							    </tr>			
							@endforeach
						@endif
						</tbody>
		            </table>
		        </div>
				@endforeach
			</div>

		@endif

	</div>	
</section>





