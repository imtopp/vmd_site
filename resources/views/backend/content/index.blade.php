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
									<div class="overlay" id="loaderPr" >
										<i class="fa fa-spinner fa-spin"></i>
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
										<div class="overlay" id="loaderCt">
											<i class="fa fa-spinner fa-spin"></i>
										</div>
									</div>
								</div>
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
										<div class="overlay" id="loaderBr">
											<i class="fa fa-spinner fa-spin"></i>
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
										<div class="overlay" id="loaderBn">
											<i class="fa fa-spinner fa-spin"></i>
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
										<div class="overlay" id="loaderSz">
											<i class="fa fa-spinner fa-spin"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<style>
									.input-group-addon{
										padding:4px 10px !important;
									}
									button.btn{
										padding:5px !important;
										min-width:25px;
									}
								</style>
								<div id="divHighlight">
									<div class="box box-solid">
										<div class="box-header">
											<h3 class="box-title">Data Display Category</h3>
											<div class="pull-right box-tools">
												<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
													<i class="fa fa-minus"></i>
												</button>
											</div>
										</div>
										<div class="box-body">
											<form id="formDisplay1">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Display Kategori 1
														</div>
														<input type="text" class="form-control" id="displayCategory1Id" style="display: none" name="id">
														<select id="displayCategory1" name="category_id" class="form-control select2" style="width: 100%;">
														</select>
														<div class="input-group-addon">
															<button id="displayCategory1BtnSubmit" onclick="updateDC(1);" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formDisplay2">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Display Kategori 2
														</div>
														<input type="text" class="form-control" id="displayCategory2Id" style="display: none" name="id">
														<select id="displayCategory2" name="category_id" class="form-control select2" style="width: 100%;">
														</select>
														<div class="input-group-addon">
															<button id="displayCategory2BtnSubmit" onclick="updateDC(2);" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formDisplay3">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Display Kategori 3
														</div>
														<input type="text" class="form-control" id="displayCategory3Id" style="display: none" name="id">
														<select id="displayCategory3" name="category_id" class="form-control select2" style="width: 100%;">
														</select>
														<div class="input-group-addon">
															<button id="displayCategory3BtnSubmit" onclick="updateDC(3);" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formDisplay4">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Display Kategori 4
														</div>
														<input type="text" class="form-control" id="displayCategory4Id" style="display: none" name="id">
														<select id="displayCategory4" name="category_id" class="form-control select2" style="width: 100%;">
														</select>
														<div class="input-group-addon">
															<button id="displayCategory4BtnSubmit" onclick="updateDC(4);" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formDisplay5">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Display Kategori 5
														</div>
														<input type="text" class="form-control" id="displayCategory5Id" style="display: none" name="id">
														<select id="displayCategory5" name="category_id" class="form-control select2" style="width: 100%;">
														</select>
														<div class="input-group-addon">
															<button id="displayCategory5BtnSubmit" onclick="updateDC(5);" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="overlay" id="loaderDc">
											<i class="fa fa-spinner fa-spin"></i>
										</div>
									</div>
								</div>
								<div id="divConfig">
									<div class="box box-solid">
										<div class="box-header">
											<h3 class="box-title">Konfigurasi Aplikasi</h3>
											<div class="pull-right box-tools">
												<button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
													<i class="fa fa-minus"></i>
												</button>
											</div>
										</div>
										<div class="box-body">
											<form id="formConAppName">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Nama Aplikasi
														</div>
														<input type="text" class="form-control" id="conAppNameId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conAppName" name="value" placeholder="Nama Aplikasi">
														<div class="input-group-addon">
															<button id="conAppNameBtnSubmit" onclick="updateCon('app_name');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootInstagram">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Instagram
														</div>
														<input type="text" class="form-control" id="conFootInstagramId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootInstagram" name="value" placeholder="Url Profil Instagram">
														<div class="input-group-addon">
															<button id="conFootInstagramBtnSubmit" onclick="updateCon('footer_instagram');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootPath">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Path
														</div>
														<input type="text" class="form-control" id="conFootPathId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootPath" name="value" placeholder="Url Profil Path">
														<div class="input-group-addon">
															<button id="conFootPathBtnSubmit" onclick="updateCon('footer_path');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootFb">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Facebook
														</div>
														<input type="text" class="form-control" id="conFootFbId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootFb" name="value" placeholder="Url Profil Facebook">
														<div class="input-group-addon">
															<button id="conFootFbBtnSubmit" onclick="updateCon('footer_facebook');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootAddress">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Alamat
														</div>
														<input type="text" class="form-control" id="conFootAddressId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootAddress" name="value" placeholder="Alamat">
														<div class="input-group-addon">
															<button id="conFootAddressBtnSubmit" onclick="updateCon('footer_address');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootPhone">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Telepon
														</div>
														<input type="text" class="form-control" id="conFootPhoneId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootPhone" name="value" placeholder="No. Telepon">
														<div class="input-group-addon">
															<button id="conFootPhoneBtnSubmit" onclick="updateCon('footer_phone');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootWA">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															WhatsApp
														</div>
														<input type="text" class="form-control" id="conFootWAId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootWA" name="value" placeholder="No. WhatsApp">
														<div class="input-group-addon">
															<button id="conFootWABtnSubmit" onclick="updateCon('footer_whatsapp');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootBBM">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															BBM
														</div>
														<input type="text" class="form-control" id="conFootBBMId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootBBM" name="value" placeholder="Pin BBM">
														<div class="input-group-addon">
															<button id="conFootBBMBtnSubmit" onclick="updateCon('footer_bbm');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConFootEmail">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Email
														</div>
														<input type="text" class="form-control" id="conFootEmailId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conFootEmail" name="value" placeholder="Email">
														<div class="input-group-addon">
															<button id="conFootEmailBtnSubmit" onclick="updateCon('footer_email');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConSpecialSection">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Special Section Name
														</div>
														<input type="text" class="form-control" id="conSpecialSectionId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conSpecialSection" name="value" placeholder="Special Section Name">
														<div class="input-group-addon">
															<button id="conSpecialSectionBtnSubmit" onclick="updateCon('special_section_name');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConUserName">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Username
														</div>
														<input type="text" class="form-control" id="conUserNameId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conUserName" name="value" placeholder="Nama Pengguna">
														<div class="input-group-addon">
															<button id="conUserNameBtnSubmit" onclick="updateCon('username');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConPassword">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Password
														</div>
														<input type="text" class="form-control" id="conPasswordId" name="id" style="display: none;">
														<input type="password" class="form-control" id="conPassword" name="value" placeholder="Kata Sandi Pengguna">
														<div class="input-group-addon">
															<i class="fa fa-eye" onmouseenter="$('#conPassword').prop('type','text');" onmouseleave="$('#conPassword').prop('type','password');"></i>
															<button id="conPasswordBtnSubmit" onclick="updateCon('password');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConEmailRecovery">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Email Recovery
														</div>
														<input type="text" class="form-control" id="conEmailRecoveryId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conEmailRecovery" name="value" placeholder="Email Recovery">
														<div class="input-group-addon">
															<button id="conEmailRecoveryBtnSubmit" onclick="updateCon('email_recovery');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConMaxBannerCount">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Maks. Jumlah Banner
														</div>
														<input type="text" class="form-control" id="conMaxBannerCountId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conMaxBannerCount" name="value" placeholder="maks. Jumlah Banner">
														<div class="input-group-addon">
															<button id="conMaxBannerCountBtnSubmit" onclick="updateCon('max_banner_count');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
											</form>
											<form id="formConCategoryPriaImgUrl">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Gambar Kategori Pria
														</div>
														<input type="text" class="form-control" id="conCategoryPriaImgUrlId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conCategoryPriaImgUrl" name="value" placeholder="Gambar Kategori Pria">
														<div class="input-group-addon">
															<button id="conCategoryPriaImgUrlBtnEdit" onclick="$('#modalConCategoryPriaImgUrl').modal('show');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-search"></i>
															</button>
															<button id="conCategoryPriaImgUrlBtnEdit" onclick="updateCon('category_pria_img_url');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
												<div id="modalConCategoryPriaImgUrl" class="modal" data-backdrop="static" >
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
																<h4 class="modal-title">Gambar Kategori Pria</h4>
															</div>
															<div class="modal-body">
																<center>
																	<img alt="img" id="conCategoryPriaImgUrlImg" class="img-responsive pad" style="min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de;">
																</center>
															</div>
														</div>
													</div>
												</div>
											</form>
											<form id="formConCategoryWanitaImgUrl">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-addon">
															Gambar Kategori Wanita
														</div>
														<input type="text" class="form-control" id="conCategoryWanitaImgUrlId" name="id" style="display: none;">
														<input type="text" class="form-control" id="conCategoryWanitaImgUrl" name="value" placeholder="Gambar Kategori Wanita">
														<div class="input-group-addon">
															<button id="conCategoryWanitaImgUrlBtnEdit" onclick="$('#modalConCategoryWanitaImgUrl').modal('show');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-search"></i>
															</button>
															<button id="conCategoryWanitaImgUrlBtnEdit" onclick="updateCon('category_wanita_img_url');" type="button" class="btn btn-primary btn-sm">
																<i class="fa fa-save"></i>
															</button>
														</div>
													</div>
												</div>
												<div id="modalConCategoryWanitaImgUrl" class="modal" data-backdrop="static" >
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<center>
																	<img alt="img" id="conCategoryWanitaImgUrlImg" class="img-responsive pad" style="min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de;">
																</center>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="overlay" id="loaderCon">
											<i class="fa fa-spinner fa-spin"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					
			<div id="modalProduct" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<form id="formProduct">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="productCrudType"></label></h4>
							</div>
							<div class="modal-body" style="height:450px;overflow: auto">
								<input type="text" class="form-control" id="productId" style="display: none" name="id">
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Kode Produk
												</div>
												<input type="text" class="form-control" id="productCode" name="code" placeholder="Kode Produk">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Gender
												</div>
												<select id="productGender" name="gender_id"  class="form-control select2" style="width: 100%;">
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Brand
												</div>
												<select id="productBrand" name="brand_id"  class="form-control select2" style="width: 100%;">
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													<input name="is_special_product" id="productSpecial" type="checkbox">
												</div>
												<span class="form-control">Spesial Produk</span>
											</div>
										</div>
										<div class="input-group">
											<div class="input-group-addon bg-gray">
												Default Image
											</div>
											<select id="productImgDefault" name="primary_img_id" class="form-control select2" style="width: 100%;">
											</select>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Nama Produk
												</div>
												<input type="text" class="form-control" id="productName" name="name" placeholder="Nama Produk">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Kategori
												</div>
												<select id="productCategory" name="category_id" class="form-control select2" style="width: 100%;">
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													Harga
												</div>
												<input type="text" class="form-control" name="price" id="productPrice" placeholder="Harga">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="input-group-addon bg-gray">
													<input id="productShow" name="show_flag" type="checkbox">
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
												<textarea name="description" id="productDesc" name="productDesc" rows="10" cols="80"></textarea>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="productBtnSubmit" onclick="submitForm('pr')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Product Image-->
			<div id="modalProductImage" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formProductImage">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="productImageCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text" class="form-control" id="productIdSubImage" style="display: none" name="product_id">
								<input type="text" class="form-control" id="productImageId" style="display: none" name="id">
								<div class="form-group" id="productImageFile">
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											<input id="productImageShow" name="show_flag" type="checkbox">
										</div>
										<span class="form-control">Tampilkan Produk di Website</span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="productImageBtnSubmit" onclick="submitForm('prImg')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Product Size-->
			<div id="modalProductSize" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formProductSize">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="productSizeCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text" class="form-control" id="productIdSubSize" style="display: none" name="product_id">
								<input type="text" class="form-control" id="productSizeId" style="display: none" name="id">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Size
										</div>
										<select id="productSize" name="size_id"  class="form-control select2" style="width: 100%;">
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											<input id="productSizeShow" name="show_flag" type="checkbox">
										</div>
										<span class="form-control">Tampilkan Produk di Website</span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="productSizeBtnSubmit" onclick="submitForm('prSz')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Product Store-->
			<div id="modalProductStore" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formProductStore">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="productStoreCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text" class="form-control" id="productIdSubStore" style="display: none" name="product_id">
								<input type="text" class="form-control" id="productStoreId" style="display: none" name="id">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Size
										</div>
										<select id="productStore" name="store_id"  class="form-control select2" style="width: 100%;">
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Url
										</div>
										<input type="text" class="form-control" name="url" id="productStoreUrl" placeholder="Store Url">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											<input id="productStoreShow" name="show_flag" type="checkbox">
										</div>
										<span class="form-control">Tampilkan Produk di Website</span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="productStoreBtnSubmit" onclick="submitForm('prSt')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Category-->
			<div id="modalCategory" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formCategory">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="categoryCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text"  id="categoryId" name="id" style="display: none">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Kategori
										</div>
										<input type="text" class="form-control" name="name" id="categoryName" placeholder="Kategori">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Deskripsi
										</div>
										<input type="text" class="form-control" name="description" id="categoryDesc" placeholder="Deskripsi">
									</div>
								</div>
								<div class="form-group" id="categoryImageFile">
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											<input id="categoryShow" name="show_flag" type="checkbox">
										</div>
										<span class="form-control">Tampilkan di Website</span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="categoryBtnSubmit" onclick="submitForm('ct')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!--Modal Brand-->
			<div id="modalBrand" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formBrand">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="brandCrudType"></label></h4>
							</div>
							<div class="modal-body">
									<input type="text" id="brandId" style="display: none" name="id">
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon bg-gray">
												Brand
											</div>
											<input type="text" class="form-control" id="brandName" name="name" placeholder="Brand">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon bg-gray">
												Deskripsi
											</div>
											<input type="text" class="form-control" id="brandDesc" name="description" placeholder="Deskripsi">
										</div>
									</div>
									<div class="form-group" id="brandImageFile">
									</div>
									<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											<input id="brandShow" type="checkbox" name="show_flag" >
										</div>
										<span class="form-control">Tampilkan di Website</span>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="brandBtnSubmit" onclick="submitForm('br')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
			<!--Modal Size-->
			<div id="modalSize" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formSize">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="sizeCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text" id="sizeId" name="id" style="display: none">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Size
										</div>
										<input type="text" class="form-control"name="name" id="sizeName" placeholder="Size">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Deskripsi
										</div>
										<input type="text" class="form-control" name="description" id="sizeDesc" placeholder="Description">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button id="sizeBtnSubmit" onclick="submitForm('sz')" type="button" class="btn btn-primary">Simpan</button>
							</div>
						</form>	
					</div>
				</div>
			</div>

			<!--Modal Banner-->
			<div id="modalBanner" class="modal" data-backdrop="static" >
				<div class="modal-dialog modal-md">
					<div class="modal-content">
						<form id="formBanner">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title"><label id="bannerCrudType"></label></h4>
							</div>
							<div class="modal-body">
								<input type="text" id="bannerId" name="id" style="display: none">
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Banner
										</div>
										<input type="text" class="form-control" name="name" id="bannerName" placeholder="Banner">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon bg-gray">
											Deskripsi
										</div>
										<input type="text" class="form-control" name="description" id="bannerDesc" placeholder="Deskripsi">
									</div>
								</div>
								<div class="form-group" id="bannerImageFile">
								</div>
									<div class="form-group">
										<div class="input-group">
											<div class="input-group-addon bg-gray">
												<input id="bannerShow" name="show_flag" type="checkbox">
											</div>
											<span class="form-control">Tampilkan di Website</span>
										</div>
									</div>
							</div>
							<div class="modal-footer">
							<button id="bannerBtnSubmit" onclick="submitForm('bn')" type="button" class="btn btn-primary">Simpan</button>
						</div>
						</form>
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