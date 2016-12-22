<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 */
class Product extends Model
{
    protected $table = 'product';

    public $timestamps = false;

    protected $fillable = [
      'code',
      'name',
      'category_id',
      'gender_id',
      'price',
      'description',
      'brand_id',
      'view_count',
      'show_flag',
      'input_date'
    ];

    protected $guarded = [];


}
