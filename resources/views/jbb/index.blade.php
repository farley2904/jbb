@extends(env('THEME').'.layouts.site')

@section ('navigation')
	{!! $navigation !!}
@endsection

@section ('slider')
	{!! $slider !!}
@endsection

@section ('header')
	{!! $header !!}
@endsection

@section ('content')
	{!! $content !!}
	{!! $contact_form !!}
@endsection

@section ('footer')
	{!! $footer !!}
@endsection



