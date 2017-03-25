/**
 * @author Ilham Mujaddid A
 */
function gD(url,d){
	$.ajax({
		type: "POST",
		async: false,
		url: url,
		data: d,
		contentType: "application/json; charset=utf-8",
		success: successFunc,
		error: errorFunc
	});
	function successFunc(result) {
		d = result;
	}
	function errorFunc() {
		alert('error');
	}
	return d;
}

function sD(url, d){
	$.ajax({
		type: "POST",
		url: url,
		data: d,
		contentType: false,
		processData: false,
		success: successFunc,
		error: errorFunc
	});
	function successFunc(result) {
		alert(result.message);
	}
	function errorFunc(result) {
		alert(result.message);
	}
}

function updateDC(idx){
	var prDc = new FormData($('#formDisplay'+idx)[0]);
	sD("display-category/update",prDc);
	ddlBind("dc");
}

function submitForm(key){
	switch(key){
		case "pr":
			var prD = new FormData($('#formProduct')[0]);
			prD.set("show_flag", prD.has("show_flag") ? 1 : 0);
			prD.set("is_special_product", prD.has("is_special_product") ? 1 : 0);
			prD.set("description", prD.has("description") ? CKEDITOR.instances['productDesc'].getData() : '');
			var prId = $('#productId').val();
			if( prId == "0" || prId == ""){
				sD("product/create",prD);
			}else{
				sD("product/update",prD);
			}
			var prProc = setTimeout(bindGridProduct,1000);
			resetForm(key);
			$("#modalProduct").modal("hide");
			break;
		case "prImg":	
			var prImgD = new FormData($('#formProductImage')[0]);
			prImgD.set("show_flag", prImgD.has("show_flag") ? 1 : 0);
			var prImgSubId = $('#productIdSubImage').val();
			var prImgId = $('#productImageId').val();
			if( prImgId == "0" || prImgId == ""){
				sD("product-image/create",prImgD);
			}else{
				sD("product-image/update",prImgD);
			}
			var prImgProc = setTimeout(bindGridProductImage(prImgSubId),1000);
				resetForm(key);
				$("#modalProductImage").modal("hide");
			break;
		case "prSz":	
			var prSzD = new FormData($('#formProductSize')[0]);
			prSzD.set("show_flag", prSzD.has("show_flag") ? 1 : 0);
			var prSzSubId = $('#productIdSubSize').val();
			var prSzId = $('#productSizeId').val();
			if( prSzId == "0" || prSzId == ""){
				sD("product-size/create",prSzD);
			}else{
				sD("product-size/update",prSzD);
			}
			var prSzProc = setTimeout(bindGridProductSize(prSzSubId),1000);
			resetForm(key);
			$("#modalProductSize").modal("hide");
			break;
		case "prSt":	
			var prStD = new FormData($('#formProductStore')[0]);
			prStD.set("show_flag", prStD.has("show_flag") ? 1 : 0);
			var prStSubId = $('#productIdSubStore').val();
			var prStId = $('#productStoreId').val();
			if( prStId == "0" || prStId == ""){
				sD("product-store/create",prStD);
			}else{
				sD("product-store/update",prStD);
			}
			var prStProc = setTimeout(bindGridProductStore(prStSubId),1000);
			resetForm(key);
			$("#modalProductStore").modal("hide");
			break;
		case "ct":	
			var ctD = new FormData($('#formCategory')[0]);
			ctD.set("show_flag", ctD.has("show_flag") ? 1 : 0);
			var ctId = $('#categoryId').val();
			if( ctId == "0" || ctId == ""){
				sD("category/create",ctD);
			}else{
				sD("category/update",ctD);
			}
			var ctProc = setTimeout(bindGridCategory,1000);
			resetForm(key);
			$("#modalCategory").modal("hide");
			break;
		case "br":
			var brD = new FormData($('#formBrand')[0]);
			brD.set("show_flag", brD.has("show_flag") ? 1 : 0);
			var brId = $('#brandId').val();
			if( brId == "0" || brId == ""){
				sD("brand/create",brD);
			}else{
				sD("brand/update",brD);
			}
			var brProc = setTimeout(bindGridBrand,1000);
			resetForm(key);
			$("#modalBrand").modal("hide");
			break;
		case "sz":
			var szD = new FormData($('#formSize')[0]);
			var szId = $('#sizeId').val();
			if( szId == "0" || szId == ""){
				sD("size/create",szD);
			}else{
				sD("size/update",szD);
			}
			var szProc = setTimeout(bindGridSize,1000);
			resetForm(key);
			$("#modalSize").modal("hide");
			break;
		case "bn":
			var bnD = new FormData($('#formBanner')[0]);
			bnD.set("show_flag", bnD.has("show_flag") ? 1 : 0);
			var bnId = $('#bannerId').val();
			if( bnId == "0" || bnId == ""){
				sD("banner/create",bnD);
			}else{
				sD("banner/update",bnD);
			}
			var bnProc = setTimeout(bindGridBanner,1000);
			resetForm(key);
			$("#modalBanner").modal("hide");
			break;
	}
}

function deleteD(key,id){
	switch(key){
		case "pr":
			var d = new FormData();
			d.append('id', id);
			sD("product/delete", d);
			var prProc = setTimeout(bindGridProduct,1000);
			break;
		case "prImg":
			var imgId = "";
			var prImgId = "";
			if(id.split('|').length > 1){
				imgId = id.split('|')[0];
				prImgId = id.split('|')[1];
			}
			var d = new FormData();
			d.append('id', imgId);
			sD("product-image/delete", d);
			var prImgProc = setTimeout(bindGridProductImage(prImgId),1000);
			break;
		case "prSz":	
			var szId = "";
			var prSzId = "";
			if(id.split('|').length > 1){
				szId = id.split('|')[0];
				prSzId = id.split('|')[1];
			}
			var d = new FormData();
			d.append('id', szId);
			sD("product-size/delete", d);
			var prSzProc = setTimeout(bindGridProductSize(prSzId),1000);
			break;
		case "prSt":	
			var stId = "";
			var prStId = "";
			if(id.split('|').length > 1){
				stId = id.split('|')[0];
				prStId = id.split('|')[1];
			}
			var d = new FormData();
			d.append('id', stId);
			sD("product-store/delete", d);
			var prSzProc = setTimeout(bindGridProductStore(prStId),1000);
			break;
		case "ct":	
			var d = new FormData();
			d.append('id', id);
			sD("category/delete", d);
			var ctProc = setTimeout(bindGridCategory,1000);
			break;
		case "br":
			var d = new FormData();
			d.append('id', id);
			sD("brand/delete", d);
			var brProc = setTimeout(bindGridBrand,1000);
			break;
		case "sz":
			var d = new FormData();
			d.append('id', id);
			sD("size/delete", d);
			var szProc = setTimeout(bindGridSize,1000);
			break;
		case "bn":
			var d = new FormData();
			d.append('id', id);
			sD("banner/delete", d);
			var bnProc = setTimeout(bindGridBanner,1000);
			break;
	}
}

function resetForm(key){
	switch(key){
		case "pr":
			$('#productId').val('0');
			$('#productName').val('');
			$('#productCode').val('');
			$('#productPrice').val('');
			CKEDITOR.instances['productDesc'].setData('');
			$("#productSpecial").prop("checked", false);
			$("#productShow").prop("checked", false);
			break;
		case "prImg":	
			$('#productImageId').val('0');
			$('#productImageShow').prop("checked", false);
			break;
		case "prSz":	
			$('#productSizeId').val('0');
			$('#productSizeShow').prop("checked", false);
			break;
		case "prSt":	
			$('#productStoreId').val('0');
			$('#productStoreUrl').val('');
			$('#productStoreShow').prop("checked", false);
			break;
		case "ct":	
			$('#categoryId').val('0');
			$('#categoryName').val('');
			$('#categoryDesc').val('');
			$('#categoryImg').val('');
			break;
		case "br":
			$('#brandId').val('0');
			$('#brandName').val('');
			$('#brandDesc').val('');
			$('#brandImg').val('');
			break;
		case "sz":
			$('#sizeId').val('0');
			$('#sizeName').val('');
			$('#sizeDesc').val('');
			break;
		case "bn":
			$('#bannerId').val('0');
			$('#bannerName').val('');
			$('#bannerDesc').val('');
			break;
	}
}

function ddlBind(key){
	switch(key){
		case "all":
			ddlBind("ct");
			ddlBind("dc");
			ddlBind("sz");
			ddlBind("st");
			ddlBind("br");
			ddlBind("g");
		case "ct":
			var d = gD('category/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#productCategory").html(el);
			break;
		case "dc":
			$("#loaderDc").show();
			var d = gD('category/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#displayCategory1").html(el);
			$("#displayCategory2").html(el);
			$("#displayCategory3").html(el);
			$("#displayCategory4").html(el);
			$("#displayCategory5").html(el);
			var dc = gD('display-category/read',{});
			for(j=0;j<dc.length;j++){
				$("#displayCategory"+(j+1)+"Id").val(dc[j].id);
				$("#displayCategory"+(j+1)).val(dc[j].category_id).trigger('change');
			}
			$("#loaderDc").hide();
			break;
		case "sz":
			var d = gD('size/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#productSize").html(el);
			break;
		case "st":
			var d = gD('store/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#productStore").html(el);
			break;
		case "br":
			var d = gD('brand/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#productBrand").html(el);
			break;
		case "g":	
			var d = gD('gender/read',{});
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].name+"</option>"
			}
			$("#productGender").html(el);
	}
}

function updateCon(name){
	var prCon = null;
	switch(name){
		case "app_name":
			prCon = new FormData($("#formConAppName")[0]);
			break;
		case "footer_instagram":
			prCon = new FormData($("#formConFootInstagram")[0]);
			break;
		case "footer_path":
			prCon = new FormData($("#formConFootPath")[0]);
			break;
		case "footer_facebook":
			prCon = new FormData($("#formConFootFb")[0]);
			break;
		case "footer_address":
			prCon = new FormData($("#formConFootAddress")[0]);
			break;
		case "footer_phone":
			prCon = new FormData($("#formConFootPhone")[0]);
			break;
		case "footer_whatsapp":
			prCon = new FormData($("#formConFootWA")[0]);
			break;
		case "footer_bbm":
			prCon = new FormData($("#formConFootBBM")[0]);
			break;
		case "footer_email":
			prCon = new FormData($("#formConFootEmail")[0]);
			break;
		case "special_section_name":
			prCon = new FormData($("#formConSpecialSection")[0]);
			break;
		case "username":
			prCon = new FormData($("#formConUserName")[0]);
			break;
		case "password":
			prCon = new FormData($("#formConPassword")[0]);
			break;
		case "email_recovery":
			prCon = new FormData($("#formConEmailRecovery")[0]);
			break;
		case "max_banner_count":
			prCon = new FormData($("#formConMaxBannerCount")[0]);
			break;
		case "category_pria_img_url":
			prCon = new FormData($("#formConCategoryPriaImgUrl")[0]);
			break;
		case "category_wanita_img_url":
			prCon = new FormData($("#formConCategoryWanitaImgUrl")[0]);
			break;
	}
	prCon.append('name', name);
	sD("configuration/update",prCon);
	var bnProc = setTimeout(configBind,1500);
}

function configBind(){
	$("#loaderCon").show();
	var d = gD('configuration/read',{});
	for(i=0;i<d.length;i++){
		switch(d[i].name){
			case "app_name":
				$("#conAppNameId").val(d[i].id);
				$("#conAppName").val(d[i].value);
			case "footer_instagram":
				$("#conFootInstagramId").val(d[i].id);
				$("#conFootInstagram").val(d[i].value);
			case "footer_path":
				$("#conFootPathId").val(d[i].id);
				$("#conFootPath").val(d[i].value);
			case "footer_facebook":
				$("#conFootFbId").val(d[i].id);
				$("#conFootFb").val(d[i].value);
			case "footer_address":
				$("#conFootAddressId").val(d[i].id);
				$("#conFootAddress").val(d[i].value);
			case "footer_phone":
				$("#conFootPhoneId").val(d[i].id);
				$("#conFootPhone").val(d[i].value);
			case "footer_whatsapp":
				$("#conFootWAId").val(d[i].id);
				$("#conFootWA").val(d[i].value);
			case "footer_bbm":
				$("#conFootBBMId").val(d[i].id);
				$("#conFootBBM").val(d[i].value);
			case "footer_email":
				$("#conFootEmailId").val(d[i].id);
				$("#conFootEmail").val(d[i].value);
			case "special_section_name":
				$("#conSpecialSectionId").val(d[i].id);
				$("#conSpecialSection").val(d[i].value);
			case "username":
				$("#conUserNameId").val(d[i].id);
				$("#conUserName").val(d[i].value);
			case "password":
				$("#conPasswordId").val(d[i].id);
				$("#conPassword").val(d[i].value);
			case "email_recovery":
				$("#conEmailRecoveryId").val(d[i].id);
				$("#conEmailRecovery").val(d[i].value);
			case "max_banner_count":
				$("#conMaxBannerCountId").val(d[i].id);
				$("#conMaxBannerCount").val(d[i].value);
			case "category_pria_img_url":
				$("#conCategoryPriaImgUrlId").val(d[i].id);
				$("#conCategoryPriaImgUrl").val(d[i].value);
				$("#conCategoryPriaImgUrlImg").attr("src","../"+d[i].value);
			case "category_wanita_img_url":
				$("#conCategoryWanitaImgUrlId").val(d[i].id);
				$("#conCategoryWanitaImgUrl").val(d[i].value);
				$("#conCategoryWanitaImgUrlImg").attr("src","../"+d[i].value);
		}
	}
	$("#loaderCon").hide();
}

function bindGridProduct(){
	$("#loaderPr").show();
	var d = gD('product/read',{});
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].is_special_product = d[i-1].is_special_product == 1 ? "Ya" : "Tidak";
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui['gridProduct'] != null) { 
		w2ui['gridProduct'].destroy();
	}
	$('#gridProduct').w2grid({
		name: 'gridProduct',
		multiSearch: false,
		searches: [
			{ field: 'code', caption: 'Kode', type: 'text' },
			{ field: 'name', caption: 'Nama Produk', type: 'text' },
			{ field: 'category_name', caption: 'Kategori', type: 'text' },
			{ field: 'gender_name', caption: 'Gender', type: 'text' },
			{ field: 'price', caption: 'Harga', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'brand_name', caption: 'Brand', type: 'text' },
			{ field: 'view_count', caption: 'View Count', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'productId', size: '30%', sortable: true, hidden: true },
			{ field: 'code', caption: 'Kode', size: '25%', sortable: true },
			{ field: 'name', caption: 'Nama Produk', size: '40%', sortable: true },
			{ field: 'category_id', caption: 'Kategori', size: '30%', sortable: true,hidden: true },
			{ field: 'category_name', caption: 'Kategori', size: '30%', sortable: true },
			{ field: 'gender_id', caption: 'Gender', size: '30%', sortable: true,hidden: true  },
			{ field: 'gender_name', caption: 'Gender', size: '30%', sortable: true },
			{ field: 'price', caption: 'Harga', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'brand_id', caption: 'Brand', size: '30%', sortable: true, hidden: true  },
			{ field: 'brand_name', caption: 'Brand', size: '30%', sortable: true },
			{ field: 'view_count', caption: 'View Count', size: '20%', sortable: true },
			{ field: 'primary_img_id', caption: 'Default Image', size: '30%', sortable: true, hidden: true  },
			{ field: 'is_special_product', caption: 'Spesial Produk', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '20%', sortable: true }
		],
		onAdd: function (event) {
			$('#productCrudType').text('Tambah Produk');
			$("#productImgDefault").parent().hide();
			resetForm("pr");
			$("#modalProduct").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui['gridProduct'].records[index]['id'];
			var code = w2ui['gridProduct'].records[index]['code'];
			var name = w2ui['gridProduct'].records[index]['name'];
			var ctId = w2ui['gridProduct'].records[index]['category_id'];
			var brId = w2ui['gridProduct'].records[index]['brand_id'];
			var gId = w2ui['gridProduct'].records[index]['gender_id'];
			var price = w2ui['gridProduct'].records[index]['price'];
			var desc = w2ui['gridProduct'].records[index]['description'];
			var defImg = w2ui['gridProduct'].records[index]['primary_img_id'];
			var special = w2ui['gridProduct'].records[index]['is_special_product'];
			var show = w2ui['gridProduct'].records[index]['show_flag'];
			$('#productCrudType').text('Ubah Produk');
			$('#productId').val(id);
			$('#productCode').val(code);
			$('#productName').val(name);
			$('#productCategory').val(ctId).trigger('change');
			$('#productBrand').val(brId).trigger('change');
			$('#productGender').val(gId).trigger('change');
			$('#productPrice').val(price);
			CKEDITOR.instances['productDesc'].setData(desc);
			$('#productSpecial').prop('checked', special == "Ya"? true:false );
			$('#productShow').prop('checked', show == "Ya"? true:false );
			
			var d = gD('product-image/read', JSON.stringify({"product_id" : id}));
			var el = "";
			for(i=0;i<d.length;i++){
				el+="<option value='"+d[i].id+"'>"+d[i].img_url+"</option>"
			}
			if(d.length > 0){
				$("#productImgDefault").html(el);
				$('#productImgDefault').val(defImg).trigger('change');
			}else{
				$("#productImgDefault").parent().hide();
			}
			
			$("#modalProduct").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#productId').val(w2ui['gridProduct'].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#productId').val();
				deleteD("pr",id);
			}
		},
		onExpand: function (event) {
			var prId = w2ui['gridProduct'].records[event.recid - 1]['id'];
			var el =
				"<div class='col-sm-4'>"+
					"<div class='box box-solid'>"+
						"<div class='box-body' style='padding:0px'>"+
							"<div id='gridProductImage" + prId + "' style='height:250px;'></div>"+
						"</div>"+
						"<div class='overlay' id='loaderPrImg" + prId + "' >"+
							"<i class='fa fa-spinner fa-spin'></i>"+
						"</div>"+
					"</div>"+
				"</div>"+		
				"<div class='col-sm-4'>"+
					"<div class='box box-solid'>"+
						"<div class='box-body' style='padding:0px'>"+
							"<div id='gridProductSize" + prId + "' style='height:250px;'></div>"+
						"</div>"+
						"<div class='overlay' id='loaderPrSz" + prId + "' >"+
							"<i class='fa fa-spinner fa-spin'></i>"+
						"</div>"+
					"</div>"+
				"</div>"+		
				"<div class='col-sm-4'>"+
					"<div class='box box-solid'>"+
						"<div class='box-body' style='padding:0px'>"+
							"<div id='gridProductStore" + prId + "' style='height:250px;'></div>"+
						"</div>"+
						"<div class='overlay' id='loaderPrSt" + prId + "' >"+
							"<i class='fa fa-spinner fa-spin'></i>"+
						"</div>"+
					"</div>"+
				"</div>";
			$('#' + event.box_id).html(el).animate({ height : 100 }, 100);
			bindGridProductImage(prId);
			bindGridProductSize(prId);
			bindGridProductStore(prId);
		},
		records: d
	});
	$("#loaderPr").hide();
}

function bindGridProductImage(prId){
	var d = gD('product-image/read', JSON.stringify({"product_id" : prId}));
	$("#loaderPrImg" + prId).show();
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui["gridProductImage" + prId] != null) { 
		w2ui["gridProductImage" + prId].destroy();
	}
	$("#gridProductImage" + prId).w2grid({
		name: "gridProductImage" + prId,
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarSearch: false,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'ID', size: '30%', sortable: true },
			{ field: 'product_id', caption: 'prId', size: '30%', sortable: true, hidden: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			debugger
			var el = 
				"<label for='productImageUpload'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='productImageUpload' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>";
				"</div>";
			$('#productImageCrudType').text('Tambah Gambar Produk');
			$('#productIdSubImage').val(prId);
			$('#productImageFile').html(el);
			$("#modalProductImage").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui["gridProductImage" + prId].records[index]['id'];
			var img = w2ui["gridProductImage" + prId].records[index]['img_url'];
			var show = w2ui["gridProductImage" + prId].records[index]['show_flag'];
			var el = 
				"<center>"+
					"<img alt='img' class='img-responsive pad' src='../" + img + "' style='min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de; '>"+
				"</center>";
			$('#productImageCrudType').text('Ubah Gambar Produk');
			$('#productIdSubImage').val(prId);
			$('#productImageId').val(id);
			$('#productImageShow').prop('checked', show == "Ya"? true:false );
			$('#productImageFile').html(el);
			$("#modalProductImage").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#productIdSubImage').val(w2ui["gridProductImage" + prId].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#productIdSubImage').val();
				deleteD("prImg",id+"|"+prId);
			}
        },
        records: d
    });
	$("#loaderPrImg" + prId).hide();
}

function bindGridProductSize(prId){
	var d = gD('product-size/read', JSON.stringify({"product_id" : prId}));
	$("#loaderPrSz" + prId).show();
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui["gridProductSize" + prId] != null) { 
		w2ui["gridProductSize" + prId].destroy();
	}
	$("#gridProductSize" + prId).w2grid({
		name: "gridProductSize" + prId,
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarSearch: false,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'id', size: '30%', sortable: true, hidden: true },
			{ field: 'product_id', caption: 'prId', size: '30%', sortable: true, hidden: true },
			{ field: 'size_id', caption: 'szId', size: '30%', sortable: true, hidden: true },
			{ field: 'size_name', caption: 'Ukuran', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#productSizeCrudType').text('Tambah Ukuran Produk');
			$('#productIdSubSize').val(prId);
			$("#modalProductSize").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui["gridProductSize" + prId].records[index]['id'];
			var szId = w2ui["gridProductSize" + prId].records[index]['size_id'];
			var show = w2ui["gridProductSize" + prId].records[index]['show_flag'];
			$('#productSizeCrudType').text('Ubah Ukuran Produk');
			$('#productSizeId').val(id);
			$('#productIdSubSize').val(prId);
			$('#productSize').val(szId).trigger("change");
			$('#productSizeShow').prop('checked', show == "Ya"? true:false );
			$("#modalProductSize").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#productSizeId').val(w2ui["gridProductSize" + prId].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#productSizeId').val();
				deleteD("prSz",id+"|"+prId);
			}
        },
        records: d
    });
	$("#loaderPrSz" + prId).hide();
}

function bindGridProductStore(prId){
	var d = gD('product-store/read', JSON.stringify({"product_id" : prId}));
	$("#loaderPrSt" + prId).show();
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui["gridProductStore" + prId] != null) { 
		w2ui["gridProductStore" + prId].destroy();
	}
	$("#gridProductStore" + prId).w2grid({
		name: "gridProductStore" + prId,
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarSearch: false,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'id', size: '30%', sortable: true, hidden: true },
			{ field: 'product_id', caption: 'prId', size: '30%', sortable: true, hidden: true },
			{ field: 'store_id', caption: 'stId', size: '30%', sortable: true, hidden: true },
			{ field: 'store_name', caption: 'Toko', size: '30%', sortable: true },
			{ field: 'url', caption: 'Link Produk', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#productStoreCrudType').text('Tambah Toko Produk');
			$('#productIdSubStore').val(prId);
			$("#modalProductStore").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui["gridProductStore" + prId].records[index]['id'];
			var stId = w2ui["gridProductStore" + prId].records[index]['store_id'];
			var url = w2ui["gridProductStore" + prId].records[index]['url'];
			var show = w2ui["gridProductStore" + prId].records[index]['show_flag'];
			$('#productStoreCrudType').text('Ubah Toko Produk');
			$('#productStoreId').val(id);
			$('#productIdSubStore').val(prId);
			$('#productStore').val(stId).trigger("change");
			$('#productStoreUrl').val(url);
			$('#productStoreShow').prop('checked', show == "Ya"? true:false );
			$("#modalProductStore").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#productStoreId').val(w2ui["gridProductStore" + prId].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#productStoreId').val();
				deleteD("prSt",id+"|"+prId);
			}
        },
        records: d
    });
	$("#loaderPrSt" + prId).hide();
}

function bindGridCategory(){
	$("#loaderCt").show();
	var d = gD('category/read',{});
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui['gridCategory'] != null) { 
		w2ui['gridCategory'].destroy();
	}
	$('#gridCategory').w2grid({
		name: 'gridCategory',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Kategori', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'categoryId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Kategori', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			var el = 
				"<label for='categoryImg'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='categoryImg' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>"+
				"</div>";
			$('#categoryCrudType').text('Tambah Kategori');
			$('#categoryImageFile').html(el);
			resetForm("ct");
			$("#modalCategory").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui['gridCategory'].records[index]['id'];
			var name = w2ui['gridCategory'].records[index]['name'];
			var desc = w2ui['gridCategory'].records[index]['description'];
			var img = w2ui['gridCategory'].records[index]['img_url'];
			var show = w2ui['gridCategory'].records[index]['show_flag'];
			var el = 
				"<label for='categoryImg'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='categoryImg' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>"+
				"</div>"+
				"<center>"+
					"<img alt='img' class='img-responsive pad' src='../" + img + "' style='min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de; '>"+
				"</center>";
			$('#categoryCrudType').text('Ubah Kategori');
			$('#categoryId').val(id);
			$('#categoryName').val(name);
			$('#categoryDesc').val(desc);
			$('#categoryShow').prop('checked', show == "Ya"? true:false );
			$('#categoryImageFile').html(el);
			$("#modalCategory").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#categoryId').val(w2ui['gridCategory'].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#categoryId').val();
				deleteD("ct",id);
			}
        },
        records: d
    });
	$("#loaderCt").hide();
}

function bindGridBrand(){
	$("#loaderBr").show();
	var d = gD('brand/read',{});
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui['gridBrand'] != null) { 
		w2ui['gridBrand'].destroy();
	}
	$('#gridBrand').w2grid({
		name: 'gridBrand',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Brand', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' },
			{ field: 'show_flag', caption: 'Tampilkan', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'brandId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Brand', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			var el = 
				"<label for='brandImg'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='brandImg' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>"+
				"</div>";
			$('#brandCrudType').text('Tambah Brand');
			$('#brandImageFile').html(el);
			resetForm("br");
			$("#modalBrand").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui['gridBrand'].records[index]['id'];
			var name = w2ui['gridBrand'].records[index]['name'];
			var desc = w2ui['gridBrand'].records[index]['description'];
			var img = w2ui['gridBrand'].records[index]['img_url'];
			var show = w2ui['gridBrand'].records[index]['show_flag'];
			var el = 
				"<label for='brandImg'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='brandImg' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>"+
				"</div>"+
				"<center>"+
					"<img alt='img' class='img-responsive pad' src='../" + img + "' style='min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de; '>"+
				"</center>";
			$('#brandCrudType').text('Ubah Brand');
			$('#brandId').val(id);
			$('#brandName').val(name);
			$('#brandDesc').val(desc);
			$('#brandShow').prop('checked', show == "Ya"? true:false );
			$('#brandImageFile').html(el);
			$("#modalBrand").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#brandId').val(w2ui['gridBrand'].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#brandId').val();
				deleteD("br",id);
			}
        },
        records: d
    });
	$("#loaderBr").hide();
}

function bindGridSize(){
	$("#loaderSz").show();
	var d = gD('size/read',{});
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
	}
	if (w2ui['gridSize'] != null) { 
		w2ui['gridSize'].destroy();
	}
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
			toolbarEdit: true,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'sizeId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Size', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			$('#sizeCrudType').text('Tambah Size');
			resetForm("sz");
			$("#modalSize").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui['gridSize'].records[index]['id'];
			var name = w2ui['gridSize'].records[index]['name'];
			var desc = w2ui['gridSize'].records[index]['description'];
			$('#sizeCrudType').text('Ubah Size');
			$('#sizeId').val(id);
			$('#sizeName').val(name);
			$('#sizeDesc').val(desc);
			$("#modalSize").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#sizeId').val(w2ui['gridSize'].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#sizeId').val();
				deleteD("sz",id);
			}
		},
		records: d
	});
	$("#loaderSz").hide();
}

function bindGridBanner(){
	$("#loaderBn").show();
	var d = gD('banner/read',{});
	for(i=1;i<d.length+1;i++){
		d[i-1].recid = i;
		d[i-1].show_flag = d[i-1].show_flag == 1 ? "Ya" : "Tidak";
	}
	if (w2ui['gridBanner'] != null) { 
		w2ui['gridBanner'].destroy();
	}
	$('#gridBanner').w2grid({
		name: 'gridBanner',
		multiSearch: false,
		searches: [
			{ field: 'name', caption: 'Nama Banner', type: 'text' },
			{ field: 'description', caption: 'Deskripsi', type: 'text' }
		],
		show: {
			toolbar: true,
			lineNumbers: true,
			footer: true,
			toolbarAdd: true,
			toolbarDelete: true,
			toolbarEdit: true,
            toolbarReload: false,
            toolbarColumns  : false,
			},
		columns: [
			{ field: 'id', caption: 'bannerId', size: '30%', sortable: true, hidden: true },
			{ field: 'name', caption: 'Banner Name', size: '30%', sortable: true },
			{ field: 'description', caption: 'Deskripsi', size: '30%', sortable: true },
			{ field: 'img_url', caption: 'Gambar', size: '30%', sortable: true },
			{ field: 'show_flag', caption: 'Tampilkan', size: '30%', sortable: true }
		],
		onAdd: function (event) {
			var el = 
				"<label for='bannerImg'>Gambar</label>"+
				"<div class='well well-sm'>"+
					"<input name='img_file' type='file' id='bannerImg' style='width:100%;'>"+
					"<small class='help-block'>*ektensi yg diperbolehkan : jpg,jpeg,png</small>"+
				"</div>";
			$('#bannerCrudType').text('Tambah Banner');
			$('#bannerImageFile').html(el);
			resetForm("bn");
			$("#modalBanner").modal("show");
		},
		onEdit: function (event) {
			var index = event.recid - 1;
			var id = w2ui['gridBanner'].records[index]['id'];
			var name = w2ui['gridBanner'].records[index]['name'];
			var desc = w2ui['gridBanner'].records[index]['description'];
			var img = w2ui['gridBanner'].records[index]['img_url'];
			var show = w2ui['gridBanner'].records[index]['show_flag'];
			var el = 
				"<label for='bannerImg'>Gambar</label>"+
				"<center>"+
					"<img alt='img' class='img-responsive pad' src='../" + img + "' style='min-width:100px;min-height:100px;max-height:300px;border:1px solid #d2d6de; '>"+
				"</center>";
			$('#bannerCrudType').text('Ubah Banner');
			$('#bannerId').val(id);
			$('#bannerName').val(name);
			$('#bannerDesc').val(desc);
			$('#bannerShow').prop('checked', show == "Ya"? true:false );
			$('#bannerImageFile').html(el);
			$("#modalBanner").modal("show");
		},
		onDelete: function (event) {
			var index = this.getSelection()-1;
			if(index!=undefined){
				$('#bannerId').val(w2ui['gridBanner'].records[index]['id']);
			}
			event.onComplete = function(){
				var id = $('#bannerId').val();
				deleteD("bn",id);
			}
		},
		records: d
	});
	$("#loaderBn").hide();
}




$(function () {
	bindGridProduct();
	bindGridCategory();
	bindGridBrand();
	bindGridSize();
	bindGridBanner();
	ddlBind("all");
	configBind();
});
