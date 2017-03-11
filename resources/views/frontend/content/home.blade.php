@extends('frontend\layout\template')

@section('title','template')

@section('content')
<div class="arriv">
	<div class="container shadow-side">
		<div class="arriv-top">
			<div class="col-md-12 padding-sm">
				<div id="main-slider">
					@foreach( $banner as $obj)
					<div class="item">
						<img src="{{ asset($obj['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive">
					</div>
					@endforeach

				</div>
				<!-- /#main-slider -->
			</div>
		</div>
		<div class="arriv-bottm">
			<div class="col-md-6">
				<div class="col-md-12 no-padding">
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<a href="{{route('frontend_browse')}}?category_id={{$display_category[0]['id']}}"><img src="{{ asset($display_category[0]['img_url']) }}" class="img-responsive" alt=""></a>
							<div class="arriv-info" style="top: 74%; left: 10%">
								<h3>{{$display_category[0]['name']}}</h3>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<a href="{{route('frontend_browse')}}?category_id={{$display_category[1]['id']}}"><img src="{{ asset($display_category[1]['img_url']) }}" class="img-responsive" alt=""></a>
							<div class="arriv-info" style="top: 74%; left: 10%">
								<h3>{{$display_category[1]['name']}}</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 no-padding">
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<a href="{{route('frontend_browse')}}?category_id={{$display_category[2]['id']}}"><img src="{{ asset($display_category[2]['img_url']) }}" class="img-responsive" alt=""></a>
							<div class="arriv-info" style="top: 74%; left: 10%">
								<h3>{{$display_category[2]['name']}}</h3>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="arriv-box-sm of-hide">
							<a href="{{route('frontend_browse')}}?category_id={{$display_category[3]['id']}}"><img src="{{ asset($display_category[3]['img_url']) }}" class="img-responsive" alt=""></a>
							<div class="arriv-info" style="top: 74%; left: 10%">
								<h3>{{$display_category[3]['name']}}</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="arriv-box of-hide">
						<a href="{{route('frontend_browse')}}?category_id={{$display_category[4]['id']}}"><img src="{{ asset($display_category[4]['img_url']) }}" class="img-responsive" alt="" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%;"></a>
						<div class="arriv-info" style="top: 83%; left: 8%">
							<h3>{{$display_category[4]['name']}}</h3>
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
						<img src="{{config('settings.category_pria_img_url')}}" class="img-responsive" alt="">
						<div class="arriv-info" style="top: 74%; left: 10%">
							<h3>PRIA</h3>
							<div class="crt-btn">
								<a href="{{route('frontend_browse')}}?gender_id=1">LIHAT SEKARANG</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="col-md-12">
					<div class="arriv-box of-hide">
						<img src="{{config('settings.category_wanita_img_url')}}" class="img-responsive" alt="">
						<div class="arriv-info" style="top: 72%; left: 10%">
							<h3>WANITA</h3>
							<div class="crt-btn">
								<a href="{{route('frontend_browse')}}?gender_id=2">LIHAT SEKARANG</a>
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
		<h3 class="effect1">{{config('settings.special_section_name')}}</h3>
		<div class="specia-top">
			<ul class="grid_2">
				<li>
					<a href="details.html"><img src="{{ asset($special_product[0]['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%;"></a>
					<div class="special-info grid_1 simpleCart_shelfItem">
						<h5>{{$special_product[0]['name']}}</h5>
						<div class="item_add"><span class="item_price"><h6>{{$special_product[0]['price']}}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</li>
				<li>
					<a href="details.html"><img src="{{ asset($special_product[1]['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%;"></a>
					<div class="special-info grid_1 simpleCart_shelfItem">
						<h5>{{$special_product[1]['name']}}</h5>
						<div class="item_add"><span class="item_price"><h6>{{$special_product[1]['price']}}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</li>
				<li>
					<a href="details.html"><img src="{{ asset($special_product[2]['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%;"></a>
					<div class="special-info grid_1 simpleCart_shelfItem">
						<h5>{{$special_product[2]['name']}}</h5>
						<div class="item_add"><span class="item_price"><h6>{{$special_product[2]['price']}}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</li>
				<li>
					<a href="details.html"><img src="{{ asset($special_product[3]['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive" style="max-width: 100%; max-height: 100%; min-width: 100%; min-height: 100%;"></a>
					<div class="special-info grid_1 simpleCart_shelfItem">
						<h5>{{$special_product[3]['name']}}</h5>
						<div class="item_add"><span class="item_price"><h6>{{$special_product[3]['price']}}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</li>
				<li>
					<a href="details.html"><img src="{{ asset($special_product[4]['img_url']) }}" alt=" " onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';" class="img-responsive" style="max-height: 100%; min-height: 100%;"></a>
					<div class="special-info grid_1 simpleCart_shelfItem">
						<h5>{{$special_product[4]['name']}}</h5>
						<div class="item_add"><span class="item_price"><h6>{{$special_product[4]['price']}}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</li>
				<div class="clearfix"> </div>
			</ul>
			<br />
			<div class="crt-btn" style="text-align: center;">
				<a href="category.html"><h5>see more</h5></a>
			</div>

		</div>

	</div>
</div>
@endsection

@section('js-script')
<script>
$(document).ready(function(){
	$('#link_beranda').addClass('active');
	$('#link_kategori').removeClass('active');
	$.post("{{route('frontend_category_menu')}}",function(obj) {
		$.each(obj,function(key,value) {
			var li = '<li><a href="' + "{{route('frontend_browse')}}?" + 'category_id=' + key + '">' + value + '</a></li>';
			$('#dropdown_category').append(li);
		});
	});
});
</script>

@endsection
