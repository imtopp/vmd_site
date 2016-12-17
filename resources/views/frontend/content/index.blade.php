@extends('frontend\layout\template')

@section('title','template')

@section('content')
<div class="arriv">
	<div class="container shadow-side">
		<div class="arriv-top">
			<div class="col-md-12 padding-sm">
				<div id="main-slider">
	            	<div class="item">
	                	<img src="{{ asset('assets/img/main-slider1.jpg') }}" alt="" class="img-responsive">
	                </div>
	                <div class="item">
	                	<img class="img-responsive" src="{{ asset('assets/img/main-slider2.jpg') }}" alt="">
	                </div>
	                <div class="item">
	                	<img class="img-responsive" src="{{ asset('assets/img/main-slider3.jpg') }}" alt="">
	                </div>
	                <div class="item">
	                	<img class="img-responsive" src="{{ asset('assets/img/main-slider4.jpg') }}" alt="">
	                </div>
				</div>
				<!-- /#main-slider -->
			</div>
		</div>
		<div class="arriv-bottm">
			<div class="col-md-6">
				<div class="col-md-12 no-padding">
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<img src="{{ asset('assets/img/7.jpg') }}" class="img-responsive" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<img src="{{ asset('assets/img/5.jpg') }}" class="img-responsive" alt="">
						</div>
					</div>
				</div>
				<div class="col-md-12 no-padding">
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<img src="{{ asset('assets/img/6.jpg') }}" class="img-responsive" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<img src="{{ asset('assets/img/4.jpg') }}" class="img-responsive" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="arriv-box of-hide">
						<img src="{{ asset('assets/img/2.jpg') }}" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3>JAS PRIA</h3>
							<div class="crt-btn">
								<a href="category.html">BELANJA SEKARANG</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="arriv-bottm">
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="arriv-box of-hide">
						<img src="{{ asset('assets/img/2.jpg') }}" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3>PRIA</h3>
							<div class="crt-btn">
								<a href="category.html">BELANJA SEKARANG</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="arriv-box of-hide">
						<img src="{{ asset('assets/img/1.jpg') }}" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3>WANITA</h3>
							<div class="crt-btn">
								<a href="category.html">BELANJA SEKARANG</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="special">
	<div class="container shadow-side">
		<h3 class="effect1">Special Offers</h3>
		<div class="specia-top">
			<ul class="grid_2">
		<li>
				<a href="details.html"><img src="{{ asset('assets/img/8.jpg') }}" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Blazer Pria</h5>
					<div class="item_add"><span class="item_price"><h6>Rp. 240.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
				</div>
		</li>
		<li>
				<a href="details.html"><img src="{{ asset('assets/img/9.jpg') }}" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Jam Tangan Pria</h5>
					<div class="item_add"><span class="item_price"><h6>Rp. 600.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
			</div>
		</li>
		<li>
				<a href="details.html"><img src="{{ asset('assets/img/10.jpg') }}" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Kacamata Trendi</h5>
					<div class="item_add"><span class="item_price"><h6>Rp. 140.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
			</div>
		</li>
		<li>
				<a href="details.html"><img src="{{ asset('assets/img/11.jpg') }}" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>T-Shirt</h5>
					<div class="item_add"><span class="item_price"><h6>Rp. 100.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
				</div>
		</li>
		<li>
				<a href="details.html"><img src="{{ asset('assets/img/9.jpg') }}" class="img-responsive" alt=""></a>
				<div class="special-info grid_1 simpleCart_shelfItem">
					<h5>Jam Tangan Pria</h5>
					<div class="item_add"><span class="item_price"><h6>Rp. 600.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
			</div>
		</li>
		<div class="clearfix"> </div>
	</ul>
		</div>
	</div>
</div>
@endsection