

<section class="well-md text-center">
<div class="container">
<div class="row text-sm-left">
<div class="col-sm-6 wow fadeInUp"> <!-- inset-1 -->
<div class="content">
<div class="content__head">
<span class="line"></span>
</div>
<div class="image-wrap shadow-right">
<img src="{{ asset(env('THEME')) }}/images/lg_image-jbb.jpg" data-srcset-base="{{ asset(env('THEME')) }}/images/" data-srcset-ext="_image-jbb.jpg" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="570" height="570">
</div>
</div>
</div>
<div class="col-sm-preffix-1 col-sm-5 col-md-4  wow fadeInRight">
<div class="line-right">
{{-- <h2>{{ trans('site.about') }}</h2> --}}
<p class="wow fadeInUp" data-wow-delay="0.1s">Студия красоты и дизайна бровей Just Be Beautiful рада приветствовать Вас,our princesses! 
Наша студия стремится к качественным услугам и исключительному обслуживанию клиентов в спокойной дружеской атмосфере.</p>
<p class="wow fadeInUp" data-wow-delay="0.2s">Приходите и попробуйте! Убедитесь, что Вы находитесь в правильном месте. Не упустите свой шанс выглядеть лучше!</p>
<a href="{{ url('about_us') }}" class="link wow fadeInUp" data-wow-delay="0.3s">Узнать больше</a>
</div>
</div>
</div>
</div>
</section>
 
 
<section class="well-md text-center">
<div class="container">

<!-- <h1 class="section-head-right">График работы</h1> -->
<div class="row text-sm-left">
<div class="col-sm-6 col-sm-push-2 wow fadeInUp">
<div class="content">
<div class="content__head">
<span class="line"></span>
</div>
<div class="image-wrap shadow-left">
<img src="{{ asset(env('THEME')) }}/images/lg_hours.jpg" data-srcset-base="{{ asset(env('THEME')) }}/images/" data-srcset-ext="_hours.jpg" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="570" height="570">
</div>
</div>
</div>
<div class="col-sm-preffix-1 col-sm-5 col-sm-push-1 wow fadeInLeft">
<div class="line-left">
<h3>График работы:</h3>
<h4 class="wow fadeInUp">Пн - Сб</h4>
<p class="wow fadeInUp" data-wow-delay="0.1s">9:00 - 21:00</p>
<h4 class="wow fadeInUp" data-wow-delay="0.2s">Вс</h4>
<p class="wow fadeInUp" data-wow-delay="0.3s">10:00 - 20:00</p>
</div>
</div>
</div>
</div>
</section>
 
 
<section class="well-md text-center">
<div class="container">

<!-- <h1 class="section-head-left">Why us</h1> -->
<div class="row text-sm-left">
<div class="col-sm-6 wow fadeInUp">
<div class="content">
<div class="content__head">
<span class="line"><!-- Kратко о нашем спектре услуг: --></span>
</div>
<div class="image-wrap shadow-right">
<img src="{{ asset(env('THEME')) }}/images/lg_services.jpg" data-srcset-base="{{ asset(env('THEME')) }}/images/" data-srcset-ext="_services.jpg" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="570" height="570">
</div>
</div>
</div>
<!-- <div class="col-sm-preffix-1 col-sm-5 col-md-4 inset-1 wow fadeInRight"> -->
<div class="col-sm-preffix-1 col-sm-5 col-md-5 inset-1 wow fadeInRight">
<div class="line-right">
<h4>Kратко о нашем спектре услуг:</h4>
<p class="wow fadeInUp">
<span>- моделирование/ окрашивание/ ламинирование бровей;</span><br>
<span>- наращивание/ ламинирование/ биозавивка/ окрашивание ресниц;</span><br>
<span>- экспресс/ дневной/ вечерний/ свадебный makeup;</span><br>
<span>- различные плетения и экспресс прически;</span><br>
<span>- грим.</span><br>
<span>- моделирование/ окрашивание/ ламинирование бровей;</span><br>
 </p>
<p class="wow fadeInUp" data-wow-delay="0.1s">А еще мы проводим обучение для будущих мастеров бровистов, визажистов и лешмейкеров. С программой обучения можно ознакомится в разделе Обучение.</p>
<!-- <a href="{{ url('about_us') }}" class="link wow fadeInUp" data-wow-delay="0.2s">Узнать больше</a> -->
</div>
</div>
</div>
</div>
</section>
 
 
<section class="well-md text-center">
<div class="container">
<div class="row text-sm-left">
<div class="col-sm-6 col-sm-preffix-1 col-sm-push-2 wow fadeInUp">
<div class="content">
<div class="content__head">
<span class="line"></span>
</div>
<div class="image-wrap shadow-left">
<img src="{{ asset(env('THEME')) }}/images/lg_price.jpg" data-srcset-base="{{ asset(env('THEME')) }}/images/" data-srcset-ext="_price.jpg" data-srcset="sm 1101w, md 1369w, lg 1400w" alt="" width="570" height="570">
</div>
</div>
</div>
<div class="col-sm-5 inset-1 col-sm-push-1 wow fadeInLeft">
<div class="line-left">
<h4>Прайс-лист</h4>
<div class="pricing-table wow fadeInUp">
	@foreach($services as $service)
		<div><span>{{$service->name}}</span><span>{{$service->price}}</span></div>
	@endforeach
</div>
<a href="{{ url('services') }}" class="link wow fadeInUp" data-wow-delay="0.1s">Узнать больше</a>
</div>
</div>
</div>
</div>
</section>
 
