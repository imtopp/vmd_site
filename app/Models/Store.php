<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class Store
 * Created By: TOPP
 */
class Store extends Model
{
    //database table name
    protected $table = 'store';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'name',
      'description',
      'icon_url'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = [
      'products'
    ];

    /** define relationship here **/

    /**
     * Get products of store.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_store', 'store_id', 'product_id');
    }

    /** end of relationship **/

    /** define accessors & mutators **/

    /** end of accessors & mutators **/
}
