<section class="well-md text-center">
<div class="container">
<h1 class="section-head">Обучение</h1>
<!-- <h3 class="section-head-left">Брови</h3> -->

@if($school)

    @foreach($school as $k=>$article)

    <div class="row text-sm-left">

        <div class="col-sm-4 {{ ($k%2==0) ? '' : 'col-md-preffix-1 col-sm-push-2' }} wow fadeInUp">

            <div class="image-wrap {{ ($k%2==0) ? 'shadow-right' : 'shadow-left' }}">

                <img src="{{ asset(env('THEME')).Config::get('settings.path').$article->img }}">

            </div>
        </div>

        <div class="col-sm-preffix-1 col-sm-5 col-md-6 inset-1 {{ ($k%2==0) ? '' : 'col-sm-push-1' }} wow fadeInRight">
            <div class="{{ ($k%2==0) ? 'line-right' : 'line-left' }}">
                <h4>{{ $article->title }}</h4>
                {!! $article->desc !!}
                <a href="#{{-- route('articles.show',['alias'=>$article->alias]) --}}" class="btn btn-lg btn-primary wow fadeInUp" data-hover="{{ trans('site.read_more') }}">{{ trans('site.read_more') }}</a>
            </div>
        </div>

    </div>

    @endforeach
@endif