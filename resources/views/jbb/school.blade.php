@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection

@section ('slider')
	{{-- {!! $slider !!} --}}
@endsection

@section ('content')
<section>
	<div class="container">
	{!! $content !!}

	</div>
</section>
@endsection

@section ('footer')
	{!! $footer !!}
@endsection



