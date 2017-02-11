<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class Size
 * Created By: TOPP
 */
class Size extends Model
{
    //database table name
    protected $table = 'size';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'name',
      'description'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = [
      'products'
    ];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid'
    ];

    /** define relationship here **/

    /**
     * Get products of size.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'product_size', 'size_id', 'product_id');
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

    /** end of accessors & mutators **/
}
