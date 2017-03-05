@extends('frontend\layout\template')

@section('title','template')

@section('content')
<div class="container">
	<div class="women_main">
		<!-- start sidebar -->
		<div class="col-md-3 s-d">
			<div class="w_sidebar">
				<div class="w_nav1">
					<h4>Semua</h4>
					<ul>
						<li><a href="#">{{config('settings.special_section_name')}}</a></li>
					</ul>
				</div>
				<h3>Filter Berdasarkan</h3>
				<section class="sky-form">
					<h4>Gender</h4>
					<div class="row1 scroll-pane" style="height: 100px">
						<div class="col col-4">
							@foreach($result['header']['source']['gender'] as $key=>$value)
							{{--*/ $match = false /*--}}
							{{--*/ $emptyFilter = empty($result['header']['filters']['gender_id']) /*--}}
							@foreach(empty($result['header']['filters']['gender_id'])?[]:explode('+',$result['header']['filters']['gender_id']) as $filtered)
							@if(($key==$filtered))
							{{--*/ $match = true /*--}}
							@break
							@endif
							@endforeach
							<label class="checkbox"><input type="checkbox" name="checkbox_gender" {{($match || $emptyFilter)?'checked=""':''}} value="{{ $key }}"><i></i>{{ $value }}</label>
							@endforeach
						</div>
					</div>
				</section>
				<section class="sky-form">
					<h4>Kategori</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							@foreach($result['header']['source']['category'] as $key=>$value)
							{{--*/ $match = false /*--}}
							{{--*/ $emptyFilter = empty($result['header']['filters']['category_id']) /*--}}
							@foreach(empty($result['header']['filters']['category_id'])?[]:explode('+',$result['header']['filters']['category_id']) as $filtered)
							@if(($key==$filtered))
							{{--*/ $match = true /*--}}
							@break
							@endif
							@endforeach
							<label class="checkbox"><input type="checkbox" name="checkbox_kategori" {{($match || $emptyFilter)?'checked=""':''}} value="{{ $key }}"><i></i>{{ $value }}</label>
							@endforeach
						</div>
					</div>
				</section>
				<section class="sky-form">
					<h4>brand</h4>
					<div class="row1 scroll-pane">
						<div class="col col-4">
							@foreach($result['header']['source']['brand'] as $key=>$value)
							{{--*/ $match = false /*--}}
							{{--*/ $emptyFilter = empty($result['header']['filters']['brand_id']) /*--}}
							@foreach(empty($result['header']['filters']['brand_id'])?[]:explode('+',$result['header']['filters']['brand_id']) as $filtered)
							@if(($key==$filtered))
							{{--*/ $match = true /*--}}
							@break
							@endif
							@endforeach
							<label class="checkbox"><input type="checkbox" name="checkbox_brand" {{($match || $emptyFilter)?'checked=""':''}} value="{{ $key }}"><i></i>{{ $value }}</label>
							@endforeach
						</div>
					</div>
				</section>


			</div>
		</div>
		<!-- start content -->
		<div class="col-md-9 w_content">
			<div class="women">
				<a href="#"><h4>Menampilkan - <span>{{sizeof($result['data'])}} dari {{sizeof($result['data'])}} produk</span> </h4></a>
				<ul class="w_nav">
					<li>TAMPILKAN : </li>
					<li><a href="#">populer</a></li> |
					<li><a href="#">terbaru </a></li> |
					<li><a href="#">harga</a></li> ||
					<li>URUTAN : </li>
					<li><a href="#">asc</a></li> |
					<li><a href="#">desc</a></li>
					<div class="clear"></div>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div id="productList">
			<!-- grids_of_4 -->
			{{--*/ $i=0 /*--}}
			@foreach ($result['data'] as $obj)
			@if ($i == 0)

			<div class="grids_of_4">
				@endif
				<div class="grid1_of_4">
					<div class="content_box"><a href="details.html">
						<img src="{{ asset($obj['img_url']) }}" class="img-responsive" alt="" onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';"/>
					</a>
					<h4 class="no-margin"><a href="details.html">{{ $obj['name'] }}</a></h4>

					<div class="grid_1 simpleCart_shelfItem">

						<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. {{ number_format($obj['price'],0,'','.') }}</h6></span></div>
						<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
					</div>
				</div>
			</div>
			{{--*/ $i++ /*--}}
			@if ($i == 4 || $obj == end($result['data']))
			{{--*/ $i = 0 /*--}}
<div class="clearfix"></div>
</div>
@endif
@endforeach
</div>


<div class="clearfix"></div>
<!-- end content -->
</div>
</div>
</div>
@endsection

@section('js-script')
<script>
$(document).ready(function(){
	var category_id = [];
	var gender_id = [];
	$('[name="checkbox_kategori"]:checked').each(function(i){
		category_id[i] = $(this).val();
	});
	$('[name="checkbox_gender"]:checked').each(function(i){
		gender_id[i] = $(this).val();
	});
	// ----------
	$('#link_beranda').removeClass('active');
	$('#link_kategori').addClass('active');
	$('[name="checkbox_gender"]').click(function(){
		var val = [];
		$('[name="checkbox_gender"]:checked').each(function(i){
			val[i] = $(this).val();
		});
		if (val.length == 0) {
			alert("MEH!");
			$(this).prop('checked', true);
		} else {
			gender_id=val;
			var g = gender_id.toString().replace(',',' ');
			var c = category_id.toString().replace(',',' ');
			$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c }, function(result) {
				var html ='';
				var i = 0, rows = result.data.length;
				$.each(result.data, function(key){
					var asset = '{{asset("")}}'+ result.data[key].img_url;
					var asset_2 = '{{asset("")}}'+ 'assets/img/image-not-found.jpg';
					console.log(asset);
					
				});
				$('#productList').html(html);
			}, 'json');
		};
	});
	$('[name="checkbox_kategori"]').click(function(){
		var val = [];
		$('[name="checkbox_kategori"]:checked').each(function(i){
			val[i] = $(this).val();
		});
		if (val.length == 0) {
			alert("MEH!");
			$(this).prop('checked', true);
		} else {
			category_id=val;
		};
	});
	$('[name="checkbox_brand"]').click(function(){
		var val = [];
		$('[name="checkbox_brand"]:checked').each(function(i){
			val[i] = $(this).val();
		});
		if (val.length == 0) {
			alert("MEH!");
			$(this).prop('checked', true);
		};
	});
});
</script>

@endsection
