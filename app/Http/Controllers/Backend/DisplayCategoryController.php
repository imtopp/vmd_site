<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\DisplayCategory;
use Exception;
use DB;

class DisplayCategoryController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
    $models = DisplayCategory::get();

    return response()->json($models);
	}

  public function update(){
		DB::beginTransaction();

		$model = DisplayCategory::where('id','=',Input::get('id'))->first();

		if(!empty($model)){
			$model->fill(Input::all());

			try{
				$success = $model->save();
			}catch(Exception $ex){
				DB::rollback();
				$success = false;
				$message = $ex->getMessage();
			}

			if($success){
				DB::commit();
				$message = "Operation Success!";
			}
		}else{
			$success = false;
			$message = "Data tidak ditemukan!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }
}
