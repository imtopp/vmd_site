<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class ProductImage
 * Created By: TOPP
 */
class ProductImage extends Model
{
    //database table name
    protected $table = 'product_image';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'product_id',
      'img_url',
      'show_flag',
      'input_date'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = ['product'];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid',
      'product_name'
    ];

    /** define relationship here **/

    /**
     * Get the product of image.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
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

    /** end of accessors & mutators **/
}
