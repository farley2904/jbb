@foreach($items as $item)


	<li {{ (URL::current() == $item->url()) ? "class=active" : '' }} >
		<a href="{{ $item->url() }}">{{ $item->title }}</a>
		

		@if( $item->id == 1 && isset($services))
			<ul class="rd-navbar-megamenu">
			<li>
			<h4>Прайс-лист</h4>
			<div class="pricing-table">
			@foreach($services as $service)
				<div><span>{{$service->name}}</span><span>{{$service->price}}</span></div>
			@endforeach
			</div>
			</li>
			<li>
			<h4>Just Be Beautiful</h4>
			<p> Студия красоты и дизайна бровей Just Be Beautiful рада приветствовать Вас,our princesses! 
			Наша студия стремится к качественным услугам и исключительному обслуживанию клиентов в спокойной дружеской атмосфере.</p>
			<p> So, come and try! Убедитесь, что Вы находитесь в правильном месте. Не упустите свой шанс выглядеть лучше!</p>
			</li>
			<li>
			<div class="row">
			<div class="col-sm-4">
			<h4>Пн - Сб</h4>
			<p>9:00 - 21:00</p>
			<h4>Вс</h4>
			<p>10:00 - 20:00</p>
			</div>
			<div class="col-sm-6">
			<div class="image-wrap">
			<img src="{{ asset(env('THEME')) }}/images/logo_pink.png" alt="" width="570" height="570">
			</div>
			</div>
			<div class="col-sm-2 relative">
			<h1 class="section-head-right">График  работы</h1>
			</div>
			</div>
			</li>
			</ul>
		@endif


		@if($item->hasChildren())
			<ul class="rd-navbar-dropdown">
				@include(env('THEME').'.customMenuItems',['items'=>$item->children()])
			</ul>
		@endif

	</li>
@endforeach