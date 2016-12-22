<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 */
class Brand extends Model
{
    protected $table = 'brand';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'img_url',
        'show_flag',
        'input_date'
    ];

    protected $guarded = [];


}
