@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection

@section ('header')
	{!! $header !!}
@endsection

@section ('content')
	{!! $hours !!}
	{!! $contact_form !!}
@endsection

@section ('footer')
	{!! $footer !!}
@endsection

