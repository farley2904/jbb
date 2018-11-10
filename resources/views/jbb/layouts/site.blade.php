<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="wide wow-animation">
<head>
<title>{{ $title or config('app.name', 'Jbb') }}</title>
<meta name="format-detection" content="telephone=no"/>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0"/>
<link rel="icon" href="{{ asset(env('THEME')) }}/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ asset(env('THEME')) }}/css/style.css" />
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

                @if (!Auth::guest())



                @endif

                @yield('navigation')
                
                <div class="container">
                @yield('slider')

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
            <script src="{{ asset(env('THEME')) }}/js/jquery.min.js"></script>
            <script src="{{ asset(env('THEME')) }}/js/core.min.js"></script>
            <script src="{{ asset(env('THEME')) }}/js/script.js"></script>
    </body>
</html>