<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Configuration
 * By: TOPP
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
