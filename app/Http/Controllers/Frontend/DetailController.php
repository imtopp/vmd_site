<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\ViewActiveProduct;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\ProductStore;

class DetailController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	public function index($product_id){
		if(!empty($product_id)){
			$data = ViewActiveProduct::where(['id'=>$product_id])->first()->toArray();

			if(!empty($data)){
				$images = ProductImage::where(['product_id'=>$product_id,'show_flag'=>1])->get()->lists('img_url','id')->toArray();
				$data['images'] = $images;

				$size = ProductSize::with('size')->where(['product_id'=>$product_id,'show_flag'=>1])->get()->lists('size.name','id')->toArray();
				$data['size'] = $size;

				$store = ProductStore::with('store')->where(['product_id'=>$product_id,'show_flag'=>1])->get()->lists('url','store.name')->toArray();
				$data['store'] = $store;
			}

			return view('frontend/content/detail',['data'=>$data]);
		}else{
			return abort(404);
		}
	}
}
