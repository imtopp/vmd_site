<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Models\Category;

class CategoryController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  public function read(){
    $models = Category::get();

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
