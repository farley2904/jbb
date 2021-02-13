<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title or config('app.name', 'JBB') }}</title>

    <link rel="shortcut icon" href="{{ asset(env('THEME')) }}/images/favicon.ico" type="image/x-icon">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('mdb/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="{{ asset('mdb/css/mdb.min.css') }}" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="{{ asset('mdb/css/style.css') }}" rel="stylesheet">

	<link href="{{ asset('css/colorbox.css') }}" rel="stylesheet">

	<script type="text/javascript" src="{{ asset('mdb/js/jquery-3.3.1.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>

	<script type="text/javascript" src="{{ asset('js/jquery.colorbox-min.js') }}"></script>   

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="grey lighten-3">
	<header>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
			<div class="container-fluid">
				<a href="{{ route('home') }}" class="navbar-brand waves-effect">
					<strong class="blue-text">{{ config('app.name', 'Jbb') }}</strong>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expended="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarContent">
					@yield('navigation')

					@if(Auth::user())
						<div class="dropdown">
							<!--Trigger-->
							<button class="btn btn-outline-info waves-effect dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
							  aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</button>
							<!--Menu-->
							<div class="dropdown-menu dropdown-primary">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</div>
						</div>
                    @endif
				</div> 
			</div>
		</nav>
	</header>

	<main class="pt-5 max-lg-5">
		<div class="container-fluid mt-5">

			@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
					<div class="card mb-4 wow fadeIn">
						<div class="card-body">
			                <span style="color:red" >{{ $error }}</span>
			        	</div>
			        </div>
		        @endforeach
		    @endif

		    @if (session('status'))
		     	<div class="card mb-4 wow fadeIn">
					<div class="card-body">
	            		<span style="color:green" >{{ session('status') }}</span>
	        		</div>
	        	</div>
	    	@endif

		    @if (session('error'))
		        <div class="card mb-4 wow fadeIn">
					<div class="card-body">
		            {{ session('error') }}
		        	</div>
		        </div>
		    @endif

			<section class="card mb-4 wow fadeIn">
				<div class="card-body">
					@yield('content')
				</div>
			</section>
		</div>
	</main>

    @yield('footer')

	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="{{ asset('mdb/js/popper.min.js') }}"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="{{ asset('mdb/js/mdb.min.js') }}"></script>

	<script src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>

	<script src=" {{ asset('/vendor/laravel-filemanager/js/lfm.js') }}"></script>



</body>
</html>
