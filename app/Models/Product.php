<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class Product
 * Created By: TOPP
 */
class Product extends Model
{
    //database table name
    protected $table = 'product';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
      'code',
      'name',
      'category_id',
      'gender_id',
      'price',
      'description',
      'brand_id',
      'view_count',
      'show_flag',
      'input_date'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = [
      'category',
      'gender',
      'brand',
      'image',
      'sizes',
      'stores'
    ];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid',
      'category_name',
      'gender_name',
      'brand_name'
    ];

    /** define relationship here **/

    /**
     * Get the category of product.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    /**
     * Get the gender of product.
     */
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender','gender_id','id');
    }

    /**
     * Get the brand of product.
     */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    /**
     * Get the image of product.
     */
    public function image()
    {
        return $this->hasMany('App\Models\ProductImage','product_id','id');
    }

    /**
     * Get stores of product.
     */
    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'product_size', 'product_id', 'size_id');
    }

    /**
     * Get stores of product.
     */
    public function stores()
    {
        return $this->belongsToMany('App\Models\Store', 'product_store', 'product_id', 'store_id');
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
     * Get the category name.
     *
     * @return string
     */
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    /**
     * Get the gender name.
     *
     * @return string
     */
    public function getGenderNameAttribute()
    {
        return $this->gender->name;
    }

    /**
     * Get the brand name.
     *
     * @return string
     */
    public function getBrandNameAttribute()
    {
        return $this->brand->name;
    }

    /** end of accessors & mutators **/
}
