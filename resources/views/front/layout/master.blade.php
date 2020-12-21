<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="en">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>seCan</title>
    <meta name="author" content="seCan">
    <meta name="keywords" content="">
    <meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <!-- css -->    
    <link rel="stylesheet" href="{{ elixir('css/secan_plugins.css') }}">

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-38845024-11"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-38845024-11');
	</script> -->
	
</head>

<body class="@yield('body-class','')" id="body">		
	@include('front.partials.header') 
	
	<!-- content -->
	@yield('content')

	@include('front.partials.footer')
</body>

<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- main -->
<script src="{{ elixir('js/secan_plugins.js')}}"></script>
<script>
	
</script>
<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
@yield('scripts')

</html>