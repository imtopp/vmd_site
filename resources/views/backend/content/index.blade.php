@extends('backend\layout\template')

@section('title','template')

@section('content')
<div class="row">
	<div id="divProduct" class="col-xs-12">
		<div class="box box-solid">
			<div class="box-header">
				<h3 class="box-title">Data Produk</h3>
				<div class="pull-right box-tools">
					<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<div id="gridProduct" style="width: 100%; height: 400px; overflow: hidden;"></div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		<div id="divCategory">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Kategori</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div id="gridCategory" style="width: 100%; height: 250px; overflow: hidden;"></div>
				</div>
			</div>
		</div>
		<div id="divBanner">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Banner</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div id="gridBanner" style="width: 100%; height: 250px; overflow: hidden;"></div>
				</div>
			</div>
		</div>
		<div id="divSize">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Size</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div id="gridSize" style="width: 100%; height: 250px; overflow: hidden;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div id="divBrand">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Brand</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div id="gridBrand" style="width: 100%; height: 250px; overflow: hidden;"></div>
				</div>
			</div>
		</div>
		<div id="divHighlight">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Highlight Kategori</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Highlight Kategori 1</div>
							<select id="highlightCategory1"  class="form-control select2" style="width: 100%;"></select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Highlight Kategori 2</div>
							<select id="highlightCategory2"  class="form-control select2" style="width: 100%;"></select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Highlight Kategori 3</div>
							<select id="highlightCategory3"  class="form-control select2" style="width: 100%;"></select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Highlight Kategori 4</div>
							<select id="highlightCategory4"  class="form-control select2" style="width: 100%;"></select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Highlight Kategori 5</div>
							<select id="highlightCategory5"  class="form-control select2" style="width: 100%;"></select>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button id="highlightCategoryBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
		<div id="divStore">
			<div class="box box-solid">
				<div class="box-header">
					<h3 class="box-title">Data Toko</h3>
					<div class="pull-right box-tools">
						<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div id="gridStore" style="width: 100%; height: 250px; overflow: hidden;"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modalProduct" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><label id="productCrudType"></label></h4>
			</div>
			<div class="modal-body" style="height:450px;overflow: auto">
				<label id="productId" style="display: none"></label>
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Nama Produk</div>
								<input type="text" class="form-control" id="productName" placeholder="Nama Produk">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Gender</div>
								<select id="productGender"  class="form-control select2" style="width: 100%;"></select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Brand</div>
								<select id="productBrand"  class="form-control select2" style="width: 100%;"></select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Size</div>
								<select id="productSize"  class="form-control select2" style="width: 100%;"></select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<input id="productSpecial" type="checkbox">
								</div>
								<span class="form-control">Spesial Produk</span>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Kategori</div>
								<select id="productCategory"  class="form-control select2" style="width: 100%;"></select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">Harga</div>
								<input type="text" class="form-control" id="productPrice" placeholder="Harga">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<input id="productShow" type="checkbox">
								</div>
								<span class="form-control">Tampilkan Produk di Website</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div class="box box-primary">
							<div class="box-header with-border">
								<label for="productDesc">Deskripsi</label>
							</div>
							<div class="box-body">
								<textarea id="productDesc" name="productDesc" rows="10" cols="80"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Gambar</div>
						<input type="file" id="productUpload" class="form-control">
					</div>
					<p class="help-block">*ektensi yg diperbolehkan : jpg,jpeg,png</p>
				</div>
			</div>
			<div class="modal-footer">
				<button id="productBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="modalCategory" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><label id="categoryCrudType"></label></h4>
			</div>
			<div class="modal-body">
				<label id="categoryId" style="display: none"></label>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Kategori</div>
						<input type="text" class="form-control" id="categoryName" placeholder="Kategori">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Deskripsi</div>
						<input type="text" class="form-control" id="categoryDesc" placeholder="Deskripsi">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Gambar</div>
						<input type="text" class="form-control" id="categoryImg" placeholder="Deskripsi">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<input id="categoryShow" type="checkbox">
						</div>
						<span class="form-control">Tampilkan di Website</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="categoryBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="modalBrand" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><label id="brandCrudType"></label></h4>
			</div>
			<div class="modal-body">
				<label id="categoryId" style="display: none"></label>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Brand</div>
						<input type="text" class="form-control" id="brandName" placeholder="Brand">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Deskripsi</div>
						<input type="text" class="form-control" id="brandDesc" placeholder="Deskripsi">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Gambar</div>
						<input type="text" class="form-control" id="brandImg" placeholder="Deskripsi">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">
							<input id="brandShow" type="checkbox">
						</div>
						<span class="form-control">Tampilkan di Website</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="brandBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="modalSize" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><label id="sizeCrudType"></label></h4>
			</div>
			<div class="modal-body">
				<label id="sizeId" style="display: none"></label>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Size</div>
							<input type="text" class="form-control" id="sizeName" placeholder="Size">
						</div>
					</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Deskripsi</div>
						<input type="text" class="form-control" id="sizeDesc" placeholder="Deskripsi">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="sizeBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="modalBanner" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			<h4 class="modal-title"><label id="bannerCrudType"></label></h4>
			</div>
			<div class="modal-body">
				<label id="bannerId" style="display: none"></label>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Banner</div>
						<input type="text" class="form-control" id="bannerName" placeholder="Banner">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Gambar</div>
						<input type="file" id="bannerUpload" class="form-control">
					</div>
					<p class="help-block">*ektensi yg diperbolehkan : jpg,jpeg,png</p>
				</div>
			</div>
			<div class="modal-footer">
				<button id="bannerBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
<div id="modalStore" class="modal" data-backdrop="static" >
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title"><label id="storeCrudType"></label></h4>
			</div>
			<div class="modal-body">
				<label id="storeId" style="display: none"></label>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Nama Toko</div>
						<input type="text" class="form-control" id="storeName" placeholder="Nama Toko">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Deskripsi</div>
						<input type="text" class="form-control" id="storeDesc" placeholder="Deskripsi">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-addon">Ikon</div>
						<input type="text" class="form-control" id="storeIcon" placeholder="Ikon">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="storeBtnSubmit" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/backend-index.js') }}"></script>
<script>
	$(function () {
		$(".select2").select2();
		CKEDITOR.replace('productDesc');
		$(".textarea").wysihtml5();
	});
</script>
@endsection