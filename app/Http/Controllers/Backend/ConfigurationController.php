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
use Storage;

class ConfigurationController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
    $models = Configuration::get();

    return response()->json($models);
	}

  public function update(){
		DB::beginTransaction();

		$model = Configuration::where('name','=',Input::get('name'))->first();

		if(isset($model)?($model->name=='category_pria_img_url' || $model->name=='category_wanita_img_url'):false){
			if(Input::hasFile('value')){
			 $img_file = Input::file('value');
				if($img_file->isValid()){
					try{
						$defaultPath = 'assets/uploads/images/configuration/'.$model->name.'.'.$img_file->getClientOriginalExtension();
						if(Storage::disk('public')->exists($model->name)){
							$destinationPath = 'assets/uploads/images/configuration/tmp.'.$img_file->getClientOriginalExtension();
						}else{
							$destinationPath = 'assets/uploads/images/configuration/'.$model->name.'.'.$img_file->getClientOriginalExtension();
						}

						$upload_success = Storage::disk('public')->put($destinationPath, file_get_contents($img_file->getRealPath()));

						if($upload_success){
							if(Storage::disk('public')->exists('tmp.'.$img_file->getClientOriginalExtension())){
								$model->value = $defaultPath;

								try{
									$success = Storage::disk('public')->move($destinationPath,$defaultPath);
									$success = $model->save();
								}catch(Exception $ex){
									Storage::disk('public')->delete($destinationPath);

									$success = false;
									$message = $ex->getMessage();
								}
							}else{
								$model->value = $defaultPath;

								try{
									$success = $model->save();
								}catch(Exception $ex){
									$success = false;
									$message = $ex->getMessage();
								}
							}
						}else{
							DB::rollback();
							$success = false;
							$message = "Storing file failed!";
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
		}else{
			if(isset($model)){
				$model->value = Input::get('value');

				try{
					$success = $model->save();
				}catch(Exception $ex){
					DB::rollback();
					$success = false;
					$message = $ex->getMessage();
				}
			}else{
				$success = false;
				$message = "Data tidak ditemukan!";
			}
		}

		if($success){
			DB::commit();

			$success = true;
			$message = "Operation Success!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }
}
