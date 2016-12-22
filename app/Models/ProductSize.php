<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 */
class ProductSize extends Model
{
    protected $table = 'product_size';

    public $timestamps = false;

    protected $fillable = [
      'product_id',
      'size_id',
      'show_flag',
      'input_date'
    ];

    protected $guarded = [];


}
