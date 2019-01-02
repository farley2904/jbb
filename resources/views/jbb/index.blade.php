@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection

@section ('header')
	{!! $logo !!}
	{!! $header !!}
@endsection

@section ('content')
	{!! $content !!}

	{!! $contact_form !!}

	@if (!Auth::guest())
	{!! $slider !!}
	@endif
@endsection

@section ('footer')
	{!! $footer !!}
@endsection



