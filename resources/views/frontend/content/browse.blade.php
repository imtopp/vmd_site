@extends('frontend\layout\template')

@section('title','Browse')

@section('content')
<div class="container">
	<div class="women_main">
		<div class="col-md-3 s-d">
			<div class="w_sidebar">
				<div class="w_nav1">
					<h3>Tampilkan</h3>
					<ul style="padding: 0 20px;">
						<li><a id="showAll" onmouseover="" style="cursor: pointer;{{empty($result['header']['filters']['is_special'])?'font-weight: bold;color: #ff6978;':''}}">Semua</a></li>
						<li><a id="showSpecial" onmouseover="" style="cursor: pointer;{{!empty($result['header']['filters']['is_special'])?'font-weight: bold;color: #ff6978;':''}}">{{config('settings.special_section_name')}}</a></li>
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
				<a href="#"><h4>Menampilkan - <span id="jumlahData">{{sizeof($result['data'])}} dari {{sizeof($result['data'])}} produk</span> </h4></a>
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
	// template change active page
	$('#link_beranda').removeClass('active');
	$('#link_kategori').addClass('active');
	// var initialization
	var search = '';
	var category = [];
	var gender = [];
	var brand = [];
	var sort = '';
	var direction = 'asc';
	var special = 'false';
	// checkbox items
	var genderLen = $('[name="checkbox_gender"]').length;
	var categoryLen = $('[name="checkbox_kategori"]').length;
	var brandLen = $('[name="checkbox_brand"]').length;
	// search text
	$('#searchInput').val("{{!empty($result['header']['filters']['search_text'])? $result['header']['filters']['search_text']:''}}");
	search = $('#searchInput').val();
	// get checked filter
	$('[name="checkbox_kategori"]:checked').each(function(i){
		category[i] = $(this).val();
	});
	$('[name="checkbox_gender"]:checked').each(function(i){
		gender[i] = $(this).val();
	});
	$('[name="checkbox_brand"]:checked').each(function(i){
		brand[i] = $(this).val();
	});
	// display all items or special offer items only
	$('#showAll').click(function(){
		$('#showAll').css({
			'font-weight' : 'bold',
			'color' : '#ff6978'
		});
		$('#showSpecial').css({
			'font-weight' : 'normal',
			'color' : '#555555'
		});
		special = 'false';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('#showSpecial').click(function(){
		$('#showSpecial').css({
			'font-weight' : 'bold',
			'color' : '#ff6978'
		});
		$('#showAll').css({
			'font-weight' : 'normal',
			'color' : '#555555'
		});
		special = 'true';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	// filter by checkbox
	$('[name="checkbox_gender"]').click(function(){
		gender = [];
		if ($('[name="checkbox_gender"]:checked').length == 0) {
			alert("!");
			$(this).prop('checked', true);
		}
		$('[name="checkbox_gender"]:checked').each(function(i){
			gender[i] = $(this).val();
		});
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('[name="checkbox_kategori"]').click(function(){
		category = [];
		if ($('[name="checkbox_kategori"]:checked').length == 0) {
			alert("!");
			$(this).prop('checked', true);
		}
		$('[name="checkbox_kategori"]:checked').each(function(i){
			category[i] = $(this).val();
		});
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('[name="checkbox_brand"]').click(function(){
		brand = [];
		if ($('[name="checkbox_brand"]:checked').length == 0) {
			alert("!");
			$(this).prop('checked', true);
		}
		$('[name="checkbox_brand"]:checked').each(function(i){
			brand[i] = $(this).val();
		});
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	// sort products based on
	$('#sortPopuler').click(function(){
		sort = 'view_count';
		direction = 'desc';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('#sortTerbaru').click(function(){
		sort = 'input_date';
		direction = 'desc';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('#sortTermurah').click(function(){
		sort = 'price';
		direction = 'asc';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	$('#sortTermahal').click(function(){
		sort = 'price';
		direction = 'desc';
		generateData();
		$.post( "{{route('frontend_browse_get_product_lists')}}", data, function(result) { replaceHtml(result); }, 'json');
		replaceUrl();
	});
	// generate data
	function generateData() {
		data = {};
		if (gender.length < genderLen && gender.length > 0) {
			data.gender_id = gender.toString().replace(/,/g , ' ');
		}

		if (category.length < categoryLen && category.length > 0) {
			data.category_id = category.toString().replace(/,/g , ' ');
		}

		if (brand.length < brandLen && brand.length > 0) {
			data.brand_id = brand.toString().replace(/,/g , ' ');
		}

		if (sort != '') {
			data.sort_by = sort;
			data.direction = direction;
		}

		if (special == 'true') {
			data.special = 'true'
		}

		if (search!='') {
			data.search_text = search;
		}
	}
	// replace html to show peoducts
	function replaceHtml(result) {
		var html ='';
		var i = 0, rows = result.data.length;
		$.each(result.data, function(key){
			var asset_img = '{{asset("")}}'+ result.data[key].img_url;
			var asset_img_nf = '{{asset("")}}'+ 'assets/img/image-not-found.jpg';
			var detailUrl = "{{route('frontend_detail',['product_id'=>''])}}" + '/'+result.data[key].id;
			if (i == 0){
				html += '<div class="grids_of_4">';
			}
			html += '<div class="grid1_of_4">' +
			'<div class="content_box">' +
			'<a href="details.html"><img src="'+ asset_img +'" class="img-responsive" alt="" onerror="this.onerror=null;this.src='+ "'" + asset_img_nf +"'" + ';"/></a>' +
			'<h4 class="no-margin"><a href="details.html"> ' + result.data[key].name + '</a></h4>' +
			'<div class="grid_1 simpleCart_shelfItem">' +
			'<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. ' + numberWithDot(result.data[key].price) +'</h6></span></div>' +
			'<div class="item_add"><span class="item_price"><a href="' + detailUrl + '">Lihat Detail</a></span></div>' +
			'</div>' +
			'</div>' +
			'</div>';
			i++;
			if (i == 4 || key == rows-1) {
				i = 0;
				html += '<div class="clearfix"></div></div>';
			}
		});
		var html2 = rows + ' dari '+ rows + ' produk'
		$('#jumlahData').html(html2);
		$('#productList').html(html);
	};
	// replace current page's url without reload
	function replaceUrl() {
		var urlChange = '{{asset("")}}browse';
		if (gender.length !=  genderLen || category.length !=  $('[name="checkbox_kategori"]').length || brand.length !=  $('[name="checkbox_brand"]').length || sort != '' || special=='true' || search!='') {
			urlChange += '?';
		}

		if (gender.length < genderLen && gender.length != 0) {
			urlChange += 'gender_id=' + gender.toString().replace(/,/g , '+');
		}

		if (category.length <  $('[name="checkbox_kategori"]').length && category.length != 0) {
			if (gender.length !=  $('[name="checkbox_gender"]').length) {
				urlChange += '&';
			}
			urlChange += 'category_id=' + category.toString().replace(/,/g , '+');
		}

		if (brand.length <  $('[name="checkbox_brand"]').length && brand.length != 0) {
			if (gender.length !=  $('[name="checkbox_gender"]').length || category.length !=  $('[name="checkbox_kategori"]').length) {
				urlChange += '&';
			}
			urlChange += 'brand_id=' + brand.toString().replace(/,/g , '+');
		}

		if (sort != '') {
			if (gender.length !=  genderLen || category.length !=  $('[name="checkbox_kategori"]').length || brand.length !=  $('[name="checkbox_brand"]').length) {
				urlChange += '&';
			}
			urlChange += 'sort_by=' + sort + '&direction=' + direction;
		}

		if (special=='true') {
			if (gender.length !=  genderLen || category.length !=  $('[name="checkbox_kategori"]').length || brand.length !=  $('[name="checkbox_brand"]').length || sort != '') {
				urlChange += '&'
			}
			urlChange += 'is_special=true';
		}

		if (search!='') {
			if (gender.length !=  genderLen || category.length !=  $('[name="checkbox_kategori"]').length || brand.length !=  $('[name="checkbox_brand"]').length || sort != '' || special == 'true') {
				urlChange += '&'
			}
			urlChange += 'search_text='+search;
		}

		history.pushState(urlChange,null, urlChange);
	};
});
// price number formating
function numberWithDot(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
</script>

@endsection
