@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection


@section ('slider')
	{!! $slider !!}
@endsection

@section ('header')
	{!! $logo !!}
	{!! $header !!}
@endsection

@section ('content')
	{!! $hours !!}
	{!! $contact_form !!}
@endsection

@section ('footer')
	{!! $footer !!}
@endsection

