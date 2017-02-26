<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary JavaScript plugins) -->
	<script type='text/javascript' src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
	<!-- Custom Theme files -->
	<link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet">
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
	<!-- start menu -->
	<link href="{{ asset('assets/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="{{ asset('assets/js/megamenu.js') }}"></script>
	<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
	<script src="{{ asset('assets/js/menu_jquery.js') }}"></script>
	<script src="{{ asset('assets/js/simpleCart.min.js') }}"> </script>
</head>

<body>
	<!-- header -->
	<div class="header_bg_black">
		<div class="container">
			<div class="header">
				<div class="head-t">
					<div class="logo">
						<a href="index.html"><h1>{{config('settings.app_name')}}</h1></a>
					</div>
					<!-- start header_right -->
					<div class="header_right">
						<div class="search">
							<form>
								<input type="text" value="" placeholder="Cari...">
								<input type="submit" value="">
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<div class="header_bg_white effect1" data-spy="affix" data-offset-top="65">
		<div class="container">
			<!-- start header menu -->
			<ul class="megamenu skyblue">
				<li class="active grid"><a class="color1" href="index.html">Beranda</a></li>
				<li class="grid"><a class="color2" href="#">Kategori</a>
					<div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul id="dropdown_category">
										<li><a href="{{route('frontend_browse')}}">Semua Kategori</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>

	@yield('content')

	<div class="footer effect9">
		<div class="container">
			<div class="col-md-6 our-st">
				<div class="our-left">
					<h4>TOKO</h4>
				</div>
				<div class="clearfix"> </div>
				<li><i class="add"> </i>{{config('settings.footer_address')}}</li>
				<li><i class="phone"> </i>{{config('settings.footer_phone')}}</li>
				<li><a href="mailto:{{config('settings.footer_email')}}"><i class="mail"> </i>{{config('settings.footer_email')}}</a></li>
			</div>
			<div class="col-md-6 our-st">
				<h4>FOLLOW US ON</h4>
				<li>
					<div class="social-ic">
						<ul>
							<li><a href="{{config('settings.footer_facebook')}}"><i class="facebok"> </i></a></li>
							<li><a href="{{config('settings.footer_instagram')}}"><i class="be"> </i></a></li>
							<li><a href="{{config('settings.footer_path')}}"><i class="pp"> </i></a></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</li>
				<li>Copyrights © 2017. All rights reserved</li>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

	@yield('js-file')

	<script>
	$(window).on('load',function(){
		// load category dropdown1
		$.post("{{route('frontend_category_menu')}}",function(obj) {
      $.each(obj,function(key,value) {
        var li = '<li><a href="' + "{{route('frontend_browse')}}?" + 'category_id=' + key + '">' + value + '</a></li>';
        $('#dropdown_category').append(li);
      });
	});
	});
	$(document).ready(function(){
		// main carousel
		$('#main-slider').owlCarousel({
			navigation: true, // Show next and prev buttons
			slideSpeed: 300,
			paginationSpeed: 400,
			autoPlay: true,
			stopOnHover: true,
			singleItem: true,
			afterInit: ''
		});
	});

	</script>

	@yield('js-script')

</body>
</html>
