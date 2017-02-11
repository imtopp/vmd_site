<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class ProductSize
 * Created By: TOPP
 */
class ProductSize extends Model
{
    //database table name
    protected $table = 'product_size';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'product_id',
      'size_id',
      'show_flag',
      'input_date'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = [
      'product',
      'size'
    ];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid',
      'product_name',
      'size_name'
    ];

    /** define relationship here **/

    /**
     * Get the product of size.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    /**
     * Get the product of size.
     */
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id','id');
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
     * Get the product name.
     *
     * @return string
     */
    public function getSizeNameAttribute()
    {
        return $this->size->name;
    }

    /** end of accessors & mutators **/
}
