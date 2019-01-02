
@if(count($slider)>0)
 <div id="block-for-slider">
        <div id="viewport">
            <ul id="slidewrapper">
            	@foreach($slider as $slide)
	                <li class="slide"><img src="{{ asset(env('THEME')) }}/images/sliders/{{ $slide->img }}" title="Jbb" alt="" /></li>
                @endforeach
            </ul>

             <div id="prev-next-btns">
                <div id="prev-btn"></div>
                <div id="next-btn"></div>
            </div>
            <ul id="nav-btns">
            	@foreach($slider as $slide)
	                <li class="slide-nav-btn"></li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
{{-- <!-- <span class="wow fadeInUp"><a href="{{ url('/') }}" class=""><img src="{{ asset(env('THEME')) }}/images/slides{{ $slide->img }}" title="Jbb" alt="" /></a></span> --> --}}