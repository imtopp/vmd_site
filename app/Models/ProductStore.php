<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class ProductStore
 * Created By: TOPP
 */
class ProductStore extends Model
{
    //database table name
    protected $table = 'product_store';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'product_id',
      'store_id',
      'url',
      'show_flag',
      'input_date'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = [
      'product',
      'store'
    ];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid',
      'product_name',
      'store_name'
    ];

    /** define relationship here **/

    /**
     * Get the product of relation.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    /**
     * Get the store of relation.
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }

    /** end of relationship **/

    /** define accessors & mutators **/

    /**
     * Copy id to varible rec_id for frontend.
     *
     * @return int
     */
    public function getRecidAttribute()
    {
        return $this->id;
    }

    /**
     * Get the product name.
     *
     * @return string
     */
    public function getProductNameAttribute()
    {
        return $this->product->name;
    }

    /**
     * Get the store name.
     *
     * @return string
     */
    public function getStoreNameAttribute()
    {
        return $this->store->name;
    }

    /** end of accessors & mutators **/
}
