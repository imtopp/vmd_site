@extends('frontend\layout\template')

@section('title','template')

@section('css-script')
<style>
.selected {
	font-weight:bold;
	color:#ff6978;
}
</style>
@endsection

@section('content')
<div class="container">
	<div class="women_main">
		<div class="col-md-3 s-d">
			<div class="w_sidebar">
				<div class="w_nav1">
					<h3>Tampilkan</h3>
					<ul style="padding: 0 20px;">
						<li><a id="showAll" onmouseover="" style="cursor: pointer;">Semua</a></li>
						<li><a id="showSpecial" onmouseover="" style="cursor: pointer;">{{config('settings.special_section_name')}}</a></li>
					</ul>
				</div>
				<div class="w_nav1">
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
		</div>
		<div class="col-md-9 w_content">
			<div class="women">
				<a href="#"><h4>Menampilkan - <span>{{sizeof($result['data'])}} dari {{sizeof($result['data'])}} produk</span> </h4></a>
				<ul class="w_nav">
					<li>URUTKAN : </li>
					<li><a id="sortPopuler" onmouseover="" style="cursor: pointer;">populer</a></li> |
					<li><a id="sortTerbaru" onmouseover="" style="cursor: pointer;">terbaru </a></li> |
					<li><a id="sortTermurah" onmouseover="" style="cursor: pointer;">termurah</a></li> |
					<li><a id="sortTermahal" onmouseover="" style="cursor: pointer;">termahal</a></li>
					<div class="clear"></div>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div id="productList">
				{{--*/ $i=0 /*--}}
				@foreach ($result['data'] as $obj)
				@if ($i == 0)
				<div class="grids_of_4">
					@endif
					<div class="grid1_of_4">
						<div class="content_box"><a href="details.html">
							<img src="{{ asset($obj['img_url']) }}" class="img-responsive" alt="" onerror="this.onerror=null;this.src='{{ URL::asset('assets/img/image-not-found.jpg') }}';"/>
						</a>
						<h4 class="no-margin">{{ $obj['name'] }}</h4>
						<div class="grid_1 simpleCart_shelfItem">
							<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. {{ number_format($obj['price'],0,'','.') }}</h6></span></div>
							<div class="item_add"><span class="item_price"><a href="{{route('frontend_detail',['product_id'=>$obj['id']])}}">Lihat Detail</a></span></div>
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
	</div>
</div>
</div>
@endsection

@section('js-script')
<script>
$(document).ready(function(){
	var category_id = [];
	var gender_id = [];
	var brand_id = [];
	var sort_by = 'name';
	var special = 'false';
	$('[name="checkbox_kategori"]:checked').each(function(i){
		category_id[i] = $(this).val();
	});
	$('[name="checkbox_gender"]:checked').each(function(i){
		gender_id[i] = $(this).val();
	});
	$('[name="checkbox_brand"]:checked').each(function(i){
		brand_id[i] = $(this).val();
	});
	// ----------
	$('#link_beranda').removeClass('active');
	$('#link_kategori').addClass('active');
	var thisUrl = window.location.href;
	console.log(thisUrl);
	if (~thisUrl.indexOf("is_special")){
		$('#showSpecial').css('font-weight','bold');
		$('#showSpecial').css('color','#ff6978');
	} else {
		$('#showAll').css('font-weight','bold');
		$('#showAll').css('color','#ff6978');
	}
	// ----------
	$('#showAll').click(function(){
		$('#showAll').css('font-weight','bold');
		$('#showAll').css('color','#ff6978');
		$('#showSpecial').css('font-weight','normal');
		$('#showSpecial').css('color','#555555');
		special = 'false';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().	replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b}, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id);
	});
	$('#showSpecial').click(function(){
		$('#showSpecial').css('font-weight','bold');
		$('#showSpecial').css('color','#ff6978');
		$('#showAll').css('font-weight','normal');
		$('#showAll').css('color','#555555');
		special = 'true';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special }, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id,special);
	});
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
			var g = gender_id.toString().replace(/,/g , ' ');
			var c = category_id.toString().replace(/,/g , ' ');
			var b = brand_id.toString().replace(/,/g , ' ');
			$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special }, function(result) {
				replaceHtml(result);
			}, 'json');
		};
		replaceUrl(gender_id,category_id,brand_id,special);
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
			var g = gender_id.toString().replace(/,/g , ' ');
			var c = category_id.toString().replace(/,/g , ' ');
			var b = brand_id.toString().replace(/,/g , ' ');
			$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special }, function(result) {
				replaceHtml(result);
			}, 'json');
		};
		replaceUrl(gender_id,category_id,brand_id,special);
	});

	$('[name="checkbox_brand"]').click(function(){
		var val = [];
		$('[name="checkbox_brand"]:checked').each(function(i){
			val[i] = $(this).val();
		});
		if (val.length == 0) {
			alert("MEH!");
			$(this).prop('checked', true);
		} else {
			category_id=val;
			var g = gender_id.toString().replace(/,/g , ' ');
			var c = category_id.toString().replace(/,/g , ' ');
			var b = brand_id.toString().replace(/,/g , ' ');
			$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special }, function(result) {
				replaceHtml(result);
			}, 'json');
		};
		replaceUrl(gender_id,category_id,brand_id,special);
	});

	$('#sortPopuler').click(function(){
		sort = 'view_count';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special, sort_by : sort, direction : 'desc'}, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id,special,sort,'desc');
	});
	$('#sortTerbaru').click(function(){
		sort = 'input_date';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special, sort_by : sort, direction : 'desc'}, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id,special,sort,'desc');
	});
	$('#sortTermurah').click(function(){
		sort = 'price';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special, sort_by : sort, direction : 'asc'}, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id,special,sort,'asc');
	});
	$('#sortTermahal').click(function(){
		sort = 'price';
		var g = gender_id.toString().replace(/,/g , ' ');
		var c = category_id.toString().replace(/,/g , ' ');
		var b = brand_id.toString().replace(/,/g , ' ');
		$.post( "{{route('frontend_browse_get_product_lists')}}", { gender_id : g, category_id : c, brand_id : b, is_special: special, sort_by : sort, direction : 'desc'}, function(result) {
			replaceHtml(result);
		}, 'json');
		replaceUrl(gender_id,category_id,brand_id,special,sort,'desc');
	});
});
function numberWithDot(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
function replaceHtml(result) {
	var html ='';
	var i = 0, rows = result.data.length;
	$.each(result.data, function(key){
		var asset_img = '{{asset("")}}'+ result.data[key].img_url;
		var asset_img_nf = '{{asset("")}}'+ 'assets/img/image-not-found.jpg';
		var detailUrl = "{{route('frontend_detail',['product_id'=>''])}}" + '/'+result.data[key].id;
		if (i == 0){
			html = html + '<div class="grids_of_4">';
		}
		html = html + '<div class="grid1_of_4">' +
		'<div class="content_box">' +
		'<a href="details.html"><img src="'+ asset_img +'" class="img-responsive" alt="" onerror="this.onerror=null;this.src='+ "'" + asset_img_nf +"'" + ';"/></a>' +
		'<h4 class="no-margin"><a href="details.html"> ' + result.data[key].name + '</a></h4>' +
		'<div class="grid_1 simpleCart_shelfItem">' +
		'<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. ' + numberWithDot(result.data[key].price) +'</h6></span></div>' +
		'<div class="item_add"><span class="item_price"><a href="' + detailUrl + '">Lihat Detail</a></span></div>' +
		'</div>' +
		'</div>' +
		'</div>';
		i=i+1;
		if (i == 4 || key == rows-1) {
			i = 0;
			html = html + '<div class="clearfix"></div></div>';
		}
	});
	$('#productList').html(html);
};
function replaceUrl(gender_id,category_id,brand_id,is_special,sort,direction) {
	var urlChange = '{{asset("")}}' + 'browse?gender_id=' + gender_id.toString().replace(/,/g , '+')  + '&category_id=' + category_id.toString().replace(/,/g , '+')
	+ '&brand_id=' + brand_id.toString().replace(/,/g , '+');
	if (sort) {
		urlChange = urlChange + '&sort_by=' + sort + '&direction=' + direction;
	}
	if (is_special) {
		urlChange = urlChange + '&is_special=true';
	}
	history.pushState(null,null, urlChange);
};
</script>

@endsection
