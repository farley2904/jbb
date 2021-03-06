<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="wide wow-animation">
<head>
<title>{{ $title or config('app.name', 'Jbb') }}</title>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0"/>
<meta name="description" content="{{ (config('configuration.meta_description')) }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{{ URL::current() }}"/>
<link rel="shortcut icon" href="{{ asset(env('THEME')) }}/images/favicon.ico" type="image/x-icon">
{{-- <!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --> --}}
<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/style.css" />
<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/slider.css" />
<script src="{{ asset(env('THEME')) }}/js/jquery.min.js"></script>

<style>
    .page-header:before {
        background:url("{{asset(config('configuration.header_bg'))}}") no-repeat center/cover;
    }
</style>
</head>
    <body>
        <div class="page">
            
            <header class="page-header">

                @if (!Auth::guest())
                <div>

                    <a href="<?= route('setlocale', ['lang' => 'ru']) ?>"<?= \Jbb\Http\Middleware\LocaleMiddleware::getLocale() === null ? 'class="active-lang"' : '' ?>>RU</a>
                    <a href="<?= route('setlocale', ['lang' => 'ua']) ?>"<?= \Jbb\Http\Middleware\LocaleMiddleware::getLocale() === 'ua' ? 'class="active-lang"' : '' ?>>UA</a>
                    
                </div>

                 <a href="{{ route('admin.') }}">@lang('site.in_admin')</a>


                @endif

                @yield('navigation')
                @isset($errors)
                @if (count($errors) > 0)
                    <div class="box error-box">
                            @foreach ($errors->all() as $error)
                                <p style="color:red" >{{ $error }}</p>
                            @endforeach
                    </div>
                @endif
                @endisset
                @if (session('status'))
                    <div class="box success-box">
                        <p style="color:green" >{{ session('status') }}</p>
                    </div>
                @endif
                
                <div class="container">
                    @yield('header')      
                </div>
            </header>

 
            <main class="page-content">
                @yield('content')
            </main>
 
            <footer class="page-footer">
                @yield('footer')
                
            </footer>
        </div>
            <script src="{{ asset(env('THEME')) }}/js/core.min.js"></script>
            <script src="{{ asset(env('THEME')) }}/js/script.js"></script>
            <script src="{{ asset(env('THEME')) }}/js/slider.js"></script>
            <script type="text/javascript">
             $(document).ready(function(){
                $("#m").on("click", function (event) {
                    event.preventDefault();
                    var id  = $(this).attr('href'),
                        top = $(id).offset().top;
                    $('body,html').animate({scrollTop: top}, 3000);
                });
            });
            </script>

    </body>
</html>
