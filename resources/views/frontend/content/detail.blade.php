@extends('frontend\layout\template')

@section('title','template')

@section('style')
<link href="{{ asset('assets/css/etalage.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
<div class="container">
	<div class="women_main">
		<div class="row single">
			<div class="col-md-9 det shadow-side">
				<div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
									<img class="etalage_thumb_image" src="{{ asset('assets/img/d1.jpg') }}" class="img-responsive" />
									<img class="etalage_source_image" src="{{ asset('assets/img/d1.jpg') }}" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{ asset('assets/img/d2.jpg') }}" class="img-responsive" />
								<img class="etalage_source_image" src="{{ asset('assets/img/d2.jpg') }}" class="img-responsive" title="" />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{ asset('assets/img/d3.jpg') }}" class="img-responsive"  />
								<img class="etalage_source_image" src="{{ asset('assets/img/d3.jpg') }}"class="img-responsive"  />
							</li>
							<li>
								<img class="etalage_thumb_image" src="{{ asset('assets/img/d4.jpg') }}" class="img-responsive"  />
								<img class="etalage_source_image" src="{{ asset('assets/img/d4.jpg') }}"class="img-responsive"  />
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="desc1 span_3_of_2">
						<h3>Simple Blue Navy Hoody</h3>
						<span class="brand">Brand: <a href="#">Indihood</a></span>
						<br>
						<span class="code">Kode Produk: SBNH</span>
						<p>Dibuat dari bahan berkualitas</p>
						<div class="price">
							<span class="text">Harga:</span>
							<span class="price-new">Rp. 110.000</span><span class="price-old">Rp. 125.000</span>
						</div>
						<div class="det_nav1">
							<h4>Ukuran Tersedia:</h4>
							<div class="sky-form col col-4">
								<ul>
									<li><label class="checkbox"><input type="checkbox" disabled="true" checked="true" name="checkbox"><i></i>L</label></li>
									<li><label class="checkbox"><input type="checkbox" disabled="true" checked="true" name="checkbox"><i></i>S</label></li>
									<li><label class="checkbox"><input type="checkbox" disabled="true" checked="true" name="checkbox"><i></i>M</label></li>
									<li><label class="checkbox"><input type="checkbox" disabled="true" name="checkbox"><i></i>XL</label></li>
								</ul>
							</div>
						</div>
						<br/>
						<h4>Berminat?</h4>
						<p>Silahkan Hubungi Kontak berikut:</p>
						<p>No. Kontak 1 : +628x xxx xxx xxx</p>
						<br/>
						<h4>Bisa juga kunjungi toko kami di marketplace berikut:</h4>
						<a href="www.bukalapak.com">Bukalapak</a><br/>
						<a href="www.blibli.com">BliBli</a><br/>
						<a href="www.tokopedia.com">Tokopedia</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="single-bottom1">
					<h6>Details</h6>
					<p class="prod-desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- end content -->
	</div>
</div>
@endsection

@section('js-file')
<script src="{{ asset('assets/js/jquery.etalage.min.js') }}"></script>
@endsection

@section('js-script')
<script>
$(document).ready(function(){
	$('#etalage').etalage({
		thumb_image_width: 300,
		thumb_image_height: 400,
		source_image_width: 900,
		source_image_height: 1200,
		show_hint: true,
		click_callback: function(image_anchor, instance_id){
			alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
		}
	});
});
</script>

@endsection
