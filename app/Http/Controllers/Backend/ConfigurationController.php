<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\Configuration;
use Exception;
use DB;

class ConfigurationController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
    $models = Configuration::get();

    return response()->json($models);
	}

  public function update(){
		DB::beginTransaction();

		$model = Configuration::where('id','=',Input::get('id'))->first();

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

		return response()->json(['success'=>$success,'message'=>$message]);
  }
}
