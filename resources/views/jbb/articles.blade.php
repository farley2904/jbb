@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection

@section ('slider')
	{!! $slider !!}
@endsection

@section ('content')
	<section class="text-center">
<div class="container">

<h1 class="section-head-left">{!! $title !!}</h1>
	{!! $content !!}

	</div>
</section>
@endsection

@section ('footer')
	{!! $footer !!}
@endsection



