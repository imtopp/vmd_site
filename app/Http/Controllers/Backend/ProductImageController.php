<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\ProductImage;
use Carbon\Carbon;
use Exception;
use DB;
use File;
use Storage;

class ProductImageController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
		$models = ProductImage::where('product_id','=',Input::get('product_id'))->get();

    return response()->json($models);
  }

  public function create(){
		if(Input::hasFile('img_file')){
			$img_file = Input::file('img_file');
			if ($img_file->isValid()){
				$data = Input::all();
				$data['input_date'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

				DB::beginTransaction();

				try{
					$model = ProductImage::create($data);
					$destinationPath = 'assets/uploads/images/product/'.$model->product_id.'/'.'image_'.$model->id.'.'.$img_file->getClientOriginalExtension();

					if(!empty($model)){
						$upload_success = Storage::disk('public')->put($destinationPath, file_get_contents($img_file->getRealPath()));
						if($upload_success){
							$model->img_url = $destinationPath;

							try{
								$success = $model->save();
							}catch(Exception $ex){
								DB::rollback();
								Storage::disk('public')->delete($destinationPath);
								$success = false;
								$message = $ex->getMessage();
							}

							if($success){
								DB::commit();
								$success = true;
								$message = "Operation Success!";
							}
						}else{
							DB::rollback();
							$success = false;
							$message = "Storing file failed!";
						}
					}else{
						DB::rollback();
						$success = false;
						$message = "Database record creation failed!";
					}
				}catch(Exception $ex){
					DB::rollback();
					$success = false;
					$message = $ex->getMessage();
				}
			}else{
				$success = false;
				$message = "File is invalid!";
			}
		}else{
			$success = false;
			$message = "File not found!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }

  public function update(){
		DB::beginTransaction();

		$model = ProductImage::where('id','=',Input::get('id'))->first();

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

		$model = ProductImage::where('id','=',Input::get('id'))->first();

		if(!empty($model)){
			try{
				$success = $model->delete();
				Storage::disk('public')->delete($model->img_url);
			}catch(\Exception $ex){
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
