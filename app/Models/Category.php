<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class Category
 * Created By: TOPP
 */
class Category extends Model
{
    //database table name
    protected $table = 'category';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
        'name',
        'description',
        'img_url',
        'show_flag',
        'input_date'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid'
    ];

    /** define relationship here **/

    /**
     * Get the displayed category.
     */
    public function displayCategory()
    {
        return $this->hasMany('App\Models\DisplayCategory','category_id','id');
    }

    /**
     * Get the displayed category.
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product','category_id','id');
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
