<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\ViewActiveProduct;

class BrowseController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	public function index($category_id,$gender_id,$brand_id,$search_text,$sort_by,$direction){
    $view_active_product = ViewActiveProduct::select('*');
    if($category_id!="-"){
      $view_active_product = $view_active_product->where('category_id','=',$category_id);
    }
    if($gender_id!="-"){
      $view_active_product = $view_active_product->whereRaw('(gender_name = "Unisex" OR gender_id = '.$gender_id.')');
    }
    if($brand_id!="-"){
      $view_active_product = $view_active_product->where('brand_id','=',$brand_id);
    }
    if($search_text!="-"){
      $view_active_product = $view_active_product->where('name','LIKE','%'.$search_text.'%');
    }
    if($sort_by!="-"){
      if($direction!="-"){
        $view_active_product = $view_active_product->orderBy($sort_by,$direction);
      }else{
        $view_active_product = $view_active_product->orderBy($sort_by,'ASC');
      }
    }
    $data = $view_active_product->get()->toArray();

    $category = ViewActiveProduct::distinct()->select('category_id','category_name')->pluck('category_name','category_id')->all();
    $gender = ViewActiveProduct::distinct()->select('gender_id','gender_name')->pluck('gender_name','gender_id')->all();
    $brand = ViewActiveProduct::distinct()->select('brand_id','brand_name')->pluck('brand_name','brand_id')->all();

    $header = array();
    $header['source'] = ['category'=>$category,'gender'=>$gender,'brand'=>$brand];
    $header['filter'] = ['category_id'=>$category_id,'gender_id'=>$gender_id,'brand_id'=>$brand_id,'search_text'=>$search_text,'sort_by'=>$sort_by,'direction'=>$direction];

    $result = array();
    $result['header'] = $header;
    $result['data'] = $data;

    dd($result);

		return view('frontend/content/browse',['result'=>$result]);
	}
}
