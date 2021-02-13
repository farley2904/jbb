<span class="icon icon-md wow fadeInUp">
    <a href="{{ route('home') }}" class="">
        <img src="{{ asset(config('configuration.logo_img')) }}" title="Jbb" alt="" />
    </a>
</span>

<div class="rd-navbar-brand wow fadeInUp ">
    <a href="{{ url('/') }}" class="rd-navbar-brand__name heading-2">{{config('configuration.name')}}</a>
    <p class="rd-navbar-brand__slogan">{{(App::isLocale('ru'))?config('configuration.slogan'):config('configuration.slogan_ua')}}</p>
</div>