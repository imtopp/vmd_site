<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>{{config('settings.app_name')}} | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />

	<link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('assets/css/megamenu.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('assets/css/owl.theme.css') }}" rel="stylesheet" type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>

	@yield('css-file')

	@yield('css-script')

</head>

<body>
	<!-- header_bar-->
	<div class="header_bg_black">
		<div class="container">
			<div class="header">
				<div class="head-t">
					<div class="logo">
						<a href="{{route('frontend_home')}}"><h1>{{config('settings.app_name')}}</h1></a>
					</div>
					<div class="header_right">
						<div class="search">
							<form id="searchForm">
								<input id="searchInput" type="text" value="" placeholder="Cari...">
								<input id="searchButton" type="submit" value="">
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!-- endheader_bar -->
	<!-- header_menu -->
	<div class="header_bg_white effect1" data-spy="affix" data-offset-top="65">
		<div class="container">
			<ul class="megamenu skyblue">
				<li id="link_beranda" class="grid"><a class="color1" href="{{route('frontend_home')}}">Beranda</a></li>
				<li id="link_kategori" class="grid"><a class="color2" href="#">Kategori</a>
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
	<!-- endheader_menu -->

	@yield('content')

	<!-- footer -->
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
	<!-- endfooter -->

	<!-- js_files -->
	<script type='text/javascript' src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/js/bootstrap.min.js') }}"> </script>
	<script type="text/javascript" src="{{ asset('assets/js/megamenu.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/js/menu_jquery.js') }}"></script>
	<script type='text/javascript' src="{{ asset('assets/js/simpleCart.min.js') }}"> </script>

	@yield('js-file')
	<!-- endjs_files -->

	<!-- js_script -->
	<script>
	$(window).on('load',function(){
		$(".megamenu").megamenu();
		$.post("{{route('frontend_category_menu')}}",function(obj) {
			$.each(obj,function(key,value) {
				var li = '<li><a href="' + "{{route('frontend_browse')}}?" + 'category_id=' + key + '">' + value + '</a></li>';
				$('#dropdown_category').append(li);
			});
		});
	});
	addEventListener("load", function() {
		setTimeout(hideURLbar, 0);
	}, false);
	function hideURLbar(){
		window.scrollTo(0,1);
	}
	$(document).ready(function(){
		$( "#searchForm" ).submit(function( event ) {
			event.preventDefault();
			if($('#searchInput').val()){
				var urlChange = '{{asset("")}}' + 'browse?search_text=' + $('#searchInput').val();
				window.location.replace(urlChange);
			};
		});
	});
	</script>

	@yield('js-script')
	<!-- endjs_script -->
</body>
</html>
