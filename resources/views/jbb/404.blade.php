@extends(env('THEME').'.layouts.site')

@section('navigation')
	{!! $navigation !!}
@endsection

@section('content')
<p style="color: purple;text-align: center" >Данной страницы не существует ;)</p>
@endsection

@section('footer')
	@include(env('THEME').'.footer')
@endsection