<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Models\Banner;
use Carbon\Carbon;
use Exception;
use DB;
use File;
use Storage;

class BannerController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

	public function read(){
    $models = Banner::get();

    return response()->json($models);
	}

  public function create(){
		$banner_count = Banner::where('show_flag','=','1')->count();

		if((Input::get('show_flag') == 1 && ($banner_count < config('settings.max_banner_count'))) || Input::get('show_flag') == 0){
	    if(Input::hasFile('img_file')){
				$img_file = Input::file('img_file');
				if ($img_file->isValid()){
					$data = Input::all();
					$data['input_date'] = Carbon::now('Asia/Jakarta')->toDateTimeString();

					DB::beginTransaction();

					try{
						$model = Banner::create($data);
						$destinationPath = 'assets/uploads/images/banners/'.'banner_'.$model->id.'.'.$img_file->getClientOriginalExtension();

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
		}else{
			$success = false;
			$message = "Active banner count already ".config('settings.max_banner_count')."!";
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }

  public function update(){
		DB::beginTransaction();

		$model = Banner::where('id','=',Input::get('id'))->first();

		if(Input::get('show_flag') == 1){
			$banner_count = Banner::where('show_flag','=','1')
														->where('id','<>',Input::get('id'))
														->count();
		}

		if((Input::get('show_flag') == 1 && ($banner_count < config('settings.max_banner_count'))) || Input::get('show_flag') == 0){
			$model->fill(Input::all());

			try{
				$success = $model->save();
			}catch(\Exception $ex){
				DB::rollback();
				$success = false;
				$message = $ex->getMessage();
			}

			if($success){
				DB::commit();
				$message = "Operation Success!";
			}
		}

		return response()->json(['success'=>$success,'message'=>$message]);
  }

  public function destroy(){
		DB::beginTransaction();

		$model = Banner::where('id','=',Input::get('id'))->first();

		if(!empty($model)){
			try{
				$success = $model->delete();
				Storage::disk('public')->delete($model->img_url);
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
