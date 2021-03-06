<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sportify</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script>
	        window.Laravel = {!! json_encode([
	            'csrfToken' => csrf_token(),
	        ]) !!};
	    </script>
    </head>

    <body>
		<div id="app">
			<app-header></app-header>
			<map-view></map-view>
		</div>
		
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
