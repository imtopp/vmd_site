@extends('frontend\layout\template')

@section('title','Detail')

@section('css-file')
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
							@foreach($data['images'] as $val)
							<li>
								<img class="etalage_thumb_image" src="{{ asset($val) }}" class="img-responsive" />
								<img class="etalage_source_image" src="{{ asset($val) }}" class="img-responsive" />
							</li>
							@endforeach
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="desc1 span_3_of_2">
						<h3>{{$data['name']}}</h3>
						<span class="brand">Brand: <a href="#">{{$data['brand_name']}}</a></span>
						<br>
						<span class="code">Kode Produk: {{$data['code']}}</span>
						<div class="price">
							<span class="text">Harga:</span>
							<span class="price-new">Rp. {{ number_format($data['price'],0,'','.') }}</span>
						</div>
						<div class="det_nav1">
							<h4>Ukuran Tersedia:</h4>
							<div class="sky-form col col-4">
								<ul>
									@foreach($data['size'] as $val)
									<li><label class="checkbox"><input type="checkbox" disabled="true" checked="true" name="checkbox"><i></i>{{ $val }}</label></li>
									@endforeach
								</ul>
							</div>
						</div>
						<div style='display: inline-block; margin-top: 30px;'>
							<h4>Dapat dibeli langsung melalui marketplace berikut :</h4>
							@foreach($data['store'] as $key=>$val)
							<div style="float:left;">
								<a href="{{ $val }}"><img src="{{ asset('assets/img/logo-' . $key . '.png') }}" class="img-responsive" style="width:60px;height:60px"/></a>
							</div>
							@endforeach
						</div>
						<div style='display: inline-block; margin-top: 30px;'>
							<h4>Detail</h4>
							<p class="prod-desc">{{$data['description']}}</p>
							<br />
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endsection

@section('js-file')
<script src="{{ asset('assets/js/jquery.etalage.min.js') }}"></script>
@endsection

@section('js-script')
<script>
$(document).ready(function(){
	// template change active page
	$('#link_beranda').removeClass('active');
	$('#link_kategori').removeClass('active');
	// var initialization
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
