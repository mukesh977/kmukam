<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	@yield('before-head')
	
	<link rel="icon" href="{{ asset('images/khabarmukam/favicon.png') }}">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/fontawesome-new/css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Karma:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.css') }}" media="screen">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-25B8YXHZGV"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-25B8YXHZGV');
    </script>

	@yield('after-head')
	
</head>