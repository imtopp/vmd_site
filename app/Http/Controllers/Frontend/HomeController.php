<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Banner;
use App\Models\DisplayCategory;
use App\Models\ViewActiveProduct;

class HomeController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	public function index(){
		$displays = DisplayCategory::get();
		$display_category = array();

		foreach($displays as $display){
			$display_category[] = array('id'=>$display->category->id,'name'=>$display->category->name,'img_url'=>$display->category->img_url);
		}

		$banner = Banner::get();

		$special_product = ViewActiveProduct::where('is_special_product','=','1')->limit(5)->get();

		return view('frontend/content/home',['display_category'=>$display_category,'banner'=>$banner->toArray(),'special_product'=>$special_product->toArray()]);
	}
}
