<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 * By: TOPP
 */
class ProductImage extends Model
{
    protected $table = 'product_image';

    public $timestamps = false;

    protected $fillable = [
      'product_id',
      'img_url',
      'show_flag',
      'input_date'
    ];

    protected $guarded = [];


}
