@if(count($slider)>0)
@foreach($slider as $slide)
<span class="icon icon-md wow fadeInUp"><a href="{{ url('/') }}" class=""><img src="{{ asset(env('THEME')) }}/images/{{ $slide->img }}" title="Jbb" alt="" /></a></span>
@endforeach
@endif



