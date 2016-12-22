<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * By: TOPP
 */
class Store extends Model
{
    protected $table = 'store';

    public $timestamps = false;

    protected $fillable = [
      'name',
      'description',
      'icon_url'
    ];

    protected $guarded = [];


}
