<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 */
class Configuration extends Model
{
    protected $table = 'configuration';

    public $timestamps = false;

    protected $fillable = [
        'value'
    ];

    protected $guarded = [];


}
