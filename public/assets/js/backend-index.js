/**
 * @author Ilham Mujaddid A
 */

function getData(url){
	var data = {};
	
	$.ajax({
		type: "POST",
		async: false,
		url: url,
		data: data,
		contentType: "application/json; charset=utf-8",
		success: successFunc,
		error: errorFunc
	});
	
	function successFunc(result) {
		data = result;
	}
	
	function errorFunc() {
		alert('error');
	}
	return data;
}

function resetFormProduct() {
	$('#productName').val('');
	$('#productPrice').val('');
	$('#productDesc').val('');
	$("#productSpecial").prop("checked", false);
	$("#productShow").prop("checked", false);
}

function resetFormCategory() {
	$('#categoryName').val('');
	$('#categoryDesc').val('');
	$('#categoryImg').val('');
}

function resetFormBrand() {
	$('#brandName').val('');
	$('#brandDesc').val('');
	$('#brandImg').val('');
}

function resetFormSize() {
	$('#sizeName').val('');
	$('#sizeDesc').val('');
}

function resetFormBanner() {
	$('#bannerName').val('');
}

function resetFormStore() {
	$('#storeName').val('');
	$('#storeDesc').val('');;
	$('#storeIcon').val('');
}

function bindDdlCategory(){
	var data = getData('../data/category.json');
	var el = "";
	for(i=0;i<data.length;i++){
		el+="<option value='"+data[i].id+"'>"+data[i].name+"</option>"
	}
	
	$("#productCategory").html(el);
	$("#highlightCategory1").html(el);
	$("#highlightCategory2").html(el);
	$("#highlightCategory3").html(el);
	$("#highlightCategory4").html(el);
	$("#highlightCategory5").html(el);
}

function bindDdlSize(){
	var data = getData('../data/size.json');
	var el = "";
	for(i=0;i<data.length;i++){
		el+="<option value='"+data[i].id+"'>"+data[i].name+"</option>"
	}
	
	$("#productSize").html(el);
}

function bindDdlBrand(){
	var data = getData('../data/brand.json');
	var el = "";
	for(i=0;i<data.length;i++){
		el+="<option value='"+data[i].id+"'>"+data[i].name+"</option>"
	}
	
	$("#productBrand").html(el);
}

function bindDdlGender(){
	var data = getData('../data/gender.json');
	var el = "";
	for(i=0;i<data.length;i++){
		el+="<option value='"+data[i].id+"'>"+data[i].name+"</option>"
	}
	
	$("#productGender").html(el);
}

function bindGridProduct(){
	var data = getData('../data/product.json');
	$('#gridProduct').w2grid({
		name: 'gridProduct',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Nama Produk', type: 'text' },
			{ field: 'category_id', caption: 'Kategori', type: 'text' },
			{ field: 'gender_id', caption: 'Gender', type: 'text' },
			{ field: 'price', caption: 'Harga', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'brand_id', caption: 'Brand', type: 'text' },
			{ field: 'view_count', caption: 'View Count', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'id', caption: 'productId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Nama Produk', size: '30%', sortable: true },
			{ field: 'category_id', caption: 'Kategori', size: '30%', sortable: true },
			{ field: 'gender_id', caption: 'Gender', size: '30%', sortable: true },
			{ field: 'price', caption: 'Harga', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'brand_id', caption: 'Brand', size: '30%', sortable: true },
			{ field: 'view_count', caption: 'View Count', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#productCrudType').text('Tambah Produk');
			$('#productId').text('0');
			resetFormProduct();
			$("#modalProduct").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var productId = w2ui['gridProduct'].records[index]['id'];
			var productName = w2ui['gridProduct'].records[index]['name'];
			var productCategory = w2ui['gridProduct'].records[index]['category_id'];
			var productBrand = w2ui['gridProduct'].records[index]['brand_id'];
			var productGender = w2ui['gridProduct'].records[index]['gender_id'];
			var productPrice = w2ui['gridProduct'].records[index]['price'];
			var productDesc = w2ui['gridProduct'].records[index]['description'];
			var productShow = w2ui['gridProduct'].records[index]['show_flag'];
			$('#productCrudType').text('Ubah Produk');
			$('#productId').text(productId);
			$('#productName').val(productName);
			$('#productCategory').val(productCategory);
			$('#productBrand').val(productBrand);
			$('#productGender').val(productGender);
			$('#productPrice').val(productPrice);
			$('#productDesc').val(productDesc);
			$('#productShow').val(productShow);
			$("#modalProduct").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
		},
		records: data
	});
}

function bindGridCategory(){
	var data = getData('../data/category.json');
	$('#gridCategory').w2grid({
		name: 'gridCategory',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Kategori', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'img_url', caption: 'Gambar', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'id', caption: 'categoryId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Kategori', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#categoryCrudType').text('Tambah Kategori');
			$('#categoryId').text('0');
			resetFormCategory();
			$("#modalCategory").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var categoryId = w2ui['gridCategory'].records[index]['id'];
			var categoryName = w2ui['gridCategory'].records[index]['name'];
			var categoryDesc = w2ui['gridCategory'].records[index]['description'];
			var categoryImg = w2ui['gridCategory'].records[index]['img_url'];
			var categoryShow = w2ui['gridCategory'].records[index]['show_flag'];
			$('#categoryCrudType').text('Ubah Kategori');
			$('#categoryId').text(categoryId);
			$('#categoryName').val(categoryName);
			$('#categoryDesc').val(categoryDesc);
			$('#categoryImg').val(categoryImg);
			$('#categoryShow').val(categoryShow);
			$("#modalCategory").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
        },
        records: data
    });
}

function bindGridBrand(){
	var data = getData('../data/brand.json');
	$('#gridBrand').w2grid({
		name: 'gridBrand',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Brand', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'img_url', caption: 'Gambar', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'id', caption: 'brandId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Brand', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#brandCrudType').text('Tambah Brand');
			$('#brandId').text('0');
			resetFormBrand();
			$("#modalBrand").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var brandId = w2ui['gridBrand'].records[index]['id'];
			var brandName = w2ui['gridBrand'].records[index]['name'];
			var brandDesc = w2ui['gridBrand'].records[index]['description'];
			var brandImg = w2ui['gridBrand'].records[index]['img_url'];
			var brandShow = w2ui['gridBrand'].records[index]['show_flag'];
			$('#brandCrudType').text('Ubah Brand');
			$('#brandId').text(brandId);
			$('#brandName').val(brandName);
			$('#brandDesc').val(brandDesc);
			$('#brandImg').val(brandImg);
			$('#brandShow').val(brandShow);
			$("#modalBrand").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
        },
        records: data
    });
}

function bindGridSize(){
	var data = getData('../data/size.json');
	$('#gridSize').w2grid({
		name: 'gridSize',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Size', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'id', caption: 'sizeId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Size', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#sizeCrudType').text('Tambah Size');
			$('#sizeId').text('0');
			resetFormSize();
			$("#modalSize").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var sizeId = w2ui['gridSize'].records[index]['id'];
			var sizeName = w2ui['gridSize'].records[index]['name'];
			var sizeDesc = w2ui['gridSize'].records[index]['description'];
			$('#sizeCrudType').text('Ubah Size');
			$('#sizeId').text(sizeId);
			$('#sizeName').val(sizeName);
			$('#sizeDesc').val(sizeDesc);
			$("#modalSize").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
		},
		records: data
	});
}

function bindGridBanner(){
	var data = getData('../data/banner.json');
	$('#gridBanner').w2grid({
		name: 'gridBanner',
		multiSearch: false,
		searches: [
			{ field: 'bannerName', caption: 'Nama Banner', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'bannerId', caption: 'bannerId', size: '30%', sortable: true, hidden: true },
			{ field: 'bannerName', caption: 'Banner Name', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#bannerCrudType').text('Tambah Banner');
			$('#bannerId').text('0');
			resetFormBanner();
			$("#modalBanner").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var bannerId = w2ui['gridBanner'].records[index]['bannerId'];
			var bannerName = w2ui['gridBanner'].records[index]['bannerName'];
			$('#bannerCrudType').text('Ubah Brand');
			$('#bannerId').text(bannerId);
			$('#bannerName').val(bannerName);
			$("#modalBanner").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
		},
		records: data
	});
}

function bindGridStore(){
	var data = getData('../data/store.json');
	$('#gridStore').w2grid({
		name: 'gridStore',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Nama Toko', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'icon_url', caption: 'Ikon', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true
			},
		columns: [
			{ field: 'id', caption: 'storeId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Nama Toko', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'icon_url', caption: 'Ikon', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#storeCrudType').text('Tambah Toko');
			$('#storeId').text('0');
			resetFormStore();
			$("#modalStore").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var storeId = w2ui['gridStore'].records[index]['id'];
			var storeName = w2ui['gridStore'].records[index]['name'];
			var storeDesc = w2ui['gridStore'].records[index]['description'];
			var storeIcon = w2ui['gridStore'].records[index]['icon_url'];
			$('#storeCrudType').text('Ubah Toko');
			$('#storeId').text(storeId);
			$('#storeName').val(storeName);
			$('#storeDesc').val(storeDesc);
			$('#storeIcon').val(storeIcon);
			$("#modalStore").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			alert("Delete Row " + index+" ?");
		},
		records: data
	});
}


$(function () {
	bindGridProduct();
	bindGridCategory();
	bindGridBrand();
	bindGridSize();
	bindGridBanner();
	bindGridStore();
	bindDdlCategory();
	bindDdlBrand();
	bindDdlSize();
	bindDdlGender();
});
