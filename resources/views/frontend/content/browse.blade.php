@extends('frontend\layout\template')

@section('title','template')

@section('content')

<div class="women_main">
	<!-- start sidebar -->
	<div class="col-md-3 s-d">
		<div class="w_sidebar">
			<div class="w_nav1">
				<h4>Semua</h4>
				<ul>
					<li><a href="#">Terbaru</a></li>
					<li><a href="#">Pria</a></li>
					<li><a href="#">Wanita</a></li>
					<li><a href="#">{{config('settings.special_section_name')}}</a></li>
				</ul>
			</div>
			<h3>Filter Berdasarkan</h3>
			<section class="sky-form">
				<h4>Gender</h4>
				<div class="row1 scroll-pane" style="height: 100px">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Pria</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Wanita</label>
					</div>
				</div>
			</section>
			<section class="sky-form">
				<h4>Kategori</h4>
				<div class="row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kategori 1</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kategori 2</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kategori 3</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kategori 4</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kategori 5</label>
					</div>
				</div>
			</section>
			<section class="sky-form">
				<h4>brand</h4>
				<div class="row1 scroll-pane">
					<div class="col col-4">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>brand 1</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>brand 2</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>brand 3</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>brand 4</label>
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>brand 5</label>
					</div>
				</div>
			</section>


		</div>
	</div>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4>Menampilkan - <span>12 produk</span> </h4></a>
			<ul class="w_nav">
				<li>Urutkan : </li>
				<li><a class="active" href="#">populer</a></li> |
				<li><a href="#">terbaru </a></li> |
				<li><a href="#">diskon</a></li> |
				<li><a href="#">harga: terendah Tertinggi </a></li>
				<div class="clear"></div>
			</ul>
			<div class="clearfix"></div>
		</div>
		<!-- grids_of_4 -->
		<div class="grids_of_4">
			<div class="grid1_of_4">
				<div class="content_box"><a href="details.html">
					<img src="{{ asset('assets/img/w1.jpg') }}" class="img-responsive" alt=""/>
				</a>
				<h4 class="no-margin"><a href="details.html">Jam Tangan 1</a></h4>

				<div class="grid_1 simpleCart_shelfItem">

					<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 990.000</h6></span></div>
					<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
				</div>
			</div>
		</div>
		<div class="grid1_of_4">
			<div class="content_box"><a href="details.html">
				<img src="{{ asset('assets/img/w2.jpg') }}" class="img-responsive" alt=""/>
			</a>
			<h4 class="no-margin"><a href="details.html">Jam Tangan 2</a></h4>

			<div class="grid_1 simpleCart_shelfItem">

				<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 760.000</h6></span></div>
				<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
			</div>
		</div>
	</div>
	<div class="grid1_of_4">
		<div class="content_box"><a href="details.html">
			<img src="{{ asset('assets/img/w3.jpg') }}" class="img-responsive" alt=""/>
		</a>
		<h4 class="no-margin"><a href="details.html">Jam Tangan 3</a></h4>

		<div class="grid_1 simpleCart_shelfItem">

			<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 580.000</h6></span></div>
			<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
		</div>
	</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w4.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Jam Tangan 4</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 1.120.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="clearfix"></div>
</div>


<div class="grids_of_4">
	<div class="grid1_of_4">
		<div class="content_box"><a href="details.html">
			<img src="{{ asset('assets/img/w5.jpg') }}" class="img-responsive" alt=""/>
		</a>
		<h4 class="no-margin"><a href="details.html">Kacamata 1</a></h4>

		<div class="grid_1 simpleCart_shelfItem">

			<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 109.000</h6></span></div>
			<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
		</div>
	</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w6.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Kacamata 2</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 95.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w7.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Kacamata 3</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 68.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w8.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Kacamata 4</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 74.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="grids_of_4">
	<div class="grid1_of_4">
		<div class="content_box"><a href="details.html">
			<img src="{{ asset('assets/img/w9.jpg') }}" class="img-responsive" alt=""/>
		</a>
		<h4 class="no-margin"><a href="details.html">Boots 1</a></h4>

		<div class="grid_1 simpleCart_shelfItem">

			<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 800.000</h6></span></div>
			<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
		</div>
	</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w10.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Boots 2</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 650.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w11.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Boots 3</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 900.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="grid1_of_4">
	<div class="content_box"><a href="details.html">
		<img src="{{ asset('assets/img/w12.jpg') }}" class="img-responsive" alt=""/>
	</a>
	<h4 class="no-margin"><a href="details.html">Boots 4</a></h4>

	<div class="grid_1 simpleCart_shelfItem">

		<div class="item_add"><span class="item_price"><h6 class="no-margin">Rp. 750.000</h6></span></div>
		<div class="item_add"><span class="item_price"><a href="details.html">Lihat Detail</a></span></div>
	</div>
</div>
</div>
<div class="clearfix"></div>
</div>
<!-- end grids_of_4 -->
<div class="pull-right">
	<button type="button" class="btn btn-default" aria-label="Left Align">1</button>
	<button type="button" class="btn btn-default" aria-label="Left Align">2</button>
	<button type="button" class="btn btn-default" aria-label="Left Align">3</button>
	<button type="button" class="btn btn-default" aria-label="Left Align">></button>

</div>
</div>

<div class="clearfix"></div>
<!-- end content -->
</div>
</div>
@endsection

@section('js-script')
<script>
$(document).ready(function(){

});
</script>

@endsection
