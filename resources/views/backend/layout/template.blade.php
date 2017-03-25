<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="{{ asset('assets/plugins/w2ui/w2ui-1.4.3.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="index2.html" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Admin</b></span>
					</a>
					<!-- Header Navbar: style can be found in header.less -->
					<nav class="navbar navbar-static-top" role="navigation">
						<!-- Sidebar toggle button-->
						<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</a>
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<li class="dropdown user user-menu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
										<span class="hidden-xs">{{isset(Auth::user()->username)?Auth::user()->username:""}}</span>
									</a>
									<ul class="dropdown-menu">
										<!-- User image -->
										<li class="user-header">
											<img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
											<p>{{isset(Auth::user()->username)?Auth::user()->username:""}}</p>
										</li>
										<!-- Menu Footer-->
										<li class="user-footer">
											<div class="pull-right">
												<a href="{{route('backend_logout')}}" class="btn btn-default btn-flat">Sign out</a>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</nav>
				</header>
				<!-- Left side column. contains the logo and sidebar -->
				<aside class="main-sidebar">
					<!-- sidebar: style can be found in sidebar.less -->
					<section class="sidebar">
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu">
							<li class="header">MAIN NAVIGATION</li>
								<li><a href="#divProduct"><i class="fa fa-circle-o"></i> Produk</a></li>
								<li><a href="#divCategory"><i class="fa fa-circle-o"></i> Kategori</a></li>
								<li><a href="#divBrand"><i class="fa fa-circle-o"></i> Brand</a></li>
								<li><a href="#divBanner"><i class="fa fa-circle-o"></i> Banner</a></li>
								<li><a href="#divHighlight"><i class="fa fa-circle-o"></i> Highlight Category</a></li>
								<li><a href="#divSize"><i class="fa fa-circle-o"></i> Size</a></li>
								<li><a href="#divStore"><i class="fa fa-circle-o"></i> Toko</a></li>
							</li>
						</ul>
					</section>
					<!-- /.sidebar -->
				</aside>

				<!-- Content Wrapper. Contains page content -->
				<div class="content-wrapper">
					<!-- Content Header (Page header) -->
					<!-- Main content -->
					<section class="content">
						@yield('content')
					</section>
				</div>
				<footer class="main-footer">
					<strong>Copyright &copy;</strong> | All rights reserved.
				</footer>
			</div>

		<script src="{{ asset('assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/w2ui/w2ui-1.4.3.js') }}"></script>
		<script src="{{ asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
		<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
		<script src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
		<script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
		<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
		@yield('script')
	</body>
</html>
