<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DisplayCategory
 * By: TOPP
 */
class DisplayCategory extends Model
{
    protected $table = 'display_category';

    public $timestamps = false;

    protected $fillable = [
        'category_id'
    ];

    protected $guarded = [];


}
