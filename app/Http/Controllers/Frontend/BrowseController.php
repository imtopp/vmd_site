<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\ViewActiveProduct;

class BrowseController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	public function index(){
    //header preparation for data return
    $category = ViewActiveProduct::distinct()->select('category_id','category_name')->pluck('category_name','category_id')->all();
    $gender = ViewActiveProduct::distinct()->select('gender_id','gender_name')->where('gender_id','<>','3')->pluck('gender_name','gender_id')->all();
    $brand = ViewActiveProduct::distinct()->select('brand_id','brand_name')->pluck('brand_name','brand_id')->all();

    $header = array();
    $header['source'] = ['category'=>$category,'gender'=>$gender,'brand'=>$brand];

    $result = $this->getProductData((Input::has('category_id')?Input::get('category_id'):null),
                                    (Input::has('gender_id')?Input::get('gender_id'):null),
                                    (Input::has('brand_id')?Input::get('brand_id'):null),
                                    (Input::has('search_text')?Input::get('search_text'):null),
                                    (Input::has('sort_by')?Input::get('sort_by'):null),
                                    (Input::has('direction')?Input::get('direction'):null));

    $header['filters'] = $result['filters'];

    $data = $result['data'];

    $result = array();
    $result['header'] = $header;
    $result['data'] = $data;

    dd($result);

		return view('frontend/content/browse',['result'=>$result]);
	}

  private function getProductData($category_id,$gender_id,$brand_id,$search_text,$sort_by,$direction){
    $filters = array();

    //getting product data
    $view_active_product = ViewActiveProduct::select('*');
    if(!empty($category_id)){
      $view_active_product = $view_active_product->where('category_id','=',$category_id);
      $filters['category_id'] = $category_id;
    }
    if(!empty($gender_id)){
      if(is_numeric($gender_id)){
        $view_active_product = $view_active_product->whereRaw('(gender_id = 3 OR gender_id = '.$gender_id.')');
      }else if(is_array($gender_id)){
        $i = 0;
        $genders = "";
        foreach($gender_id as $gender){
          if(++$i === count($gender_id)){
            $genders = $gender.",";
          }else{
            $genders = $gender;
          }
        }
        $view_active_product = $view_active_product->whereRaw('gender_id IN('.$genders.')');
      }

      $filters['gender_id'] = $gender_id;
    }
    if(!empty($brand_id)){
      if(is_numeric($brand_id)){
        $view_active_product = $view_active_product->where('brand_id','=',$brand_id);
      }else if(is_array($brand_id)){
        $i = 0;
        $brands = "";
        foreach($brand_id as $brand){
          if(++$i === count($brand_id)){
            $brands = $brand.",";
          }else{
            $brands = $brand;
          }
        }
        $view_active_product = $view_active_product->whereRaw('brand_id IN('.$brands.')');
      }
      $filters['brand_id'] = $brand_id;
    }
    if(!empty($search_text)){
      $view_active_product = $view_active_product->where('name','LIKE','%'.$search_text.'%');
      $filters['search_text'] = $search_text;
    }
    if(!empty($sort_by)){
      if(!empty($sort_by)){
        $view_active_product = $view_active_product->orderBy($sort_by,$direction);
        $filters['sort_by'] = $sort_by;
        $filters['direction'] = $direction;
      }else{
        $view_active_product = $view_active_product->orderBy($sort_by,'ASC');
        $filters['sort_by'] = $sort_by;
      }
    }

    $data = $view_active_product->get()->toArray();

    $result = array();
    $result['filters'] = $filters;
    $result['data'] = $data;

    return $result;
  }
}
