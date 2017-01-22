<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\ProductStore;
use Request;

class ProductStoreController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
		$input = json_decode(Request::getContent(),TRUE);

    $models = ProductStore::where('product_id','=',$input['product_id'])->get();

		foreach($models as $key => $value){
			$models[$key]['recid'] = $models[$key]['id'];
		}

    return response()->json($models);
	}

  public function create(){
    var_dump($_POST);die;
  }

  public function update(){
    var_dump($_POST);die;
  }

  public function destroy(){
    var_dump($_POST);die;
  }
}
