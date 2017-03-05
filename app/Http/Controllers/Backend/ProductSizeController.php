<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\ProductSize;
use Carbon\Carbon;
use Exception;
use DB;

class ProductSizeController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
		$models = ProductSize::where('product_id','=',Input::get('product_id'))->get();

		return response()->json($models);
	}

  public function create(){
		$data = Input::all();
		$data['input_date'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

		DB::beginTransaction();

		try{
			$model = ProductSize::create($data);
		}catch(Exception $ex){
			DB::rollback();
			$success = false;
			$message = $ex->getMessage();
		}

		if(!empty($model)){
			DB::commit();
			$success = true;
			$message = "Operation Success!";
		}else{
			DB::rollback();
			$success = false;
			$message = "Database record creation failed!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }

  public function update(){
		DB::beginTransaction();

		$model = ProductSize::where('id','=',Input::get('id'))->first();

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

  public function destroy(){
		DB::beginTransaction();

		$model = ProductSize::where('id','=',Input::get('id'))->first();

		if(!empty($model)){
			try{
				$success = $model->delete();
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
			$message = "Data not found!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }
}
