<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductStore
 * By: TOPP
 */
class ProductStore extends Model
{
    protected $table = 'product_store';

    public $timestamps = false;

    protected $fillable = [
      'product_id',
      'store_id',
      'url',
      'show_flag',
      'input_date'
    ];

    protected $guarded = [];


}
