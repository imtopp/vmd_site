<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Size
 * By: TOPP
 */
class Size extends Model
{
    protected $table = 'size';

    public $timestamps = false;

    protected $fillable = [
      'name',
      'description'
    ];

    protected $guarded = [];


}
