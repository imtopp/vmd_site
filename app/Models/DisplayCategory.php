<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class DisplayCategory
 * Created By: TOPP
 */
class DisplayCategory extends Model
{
    //database table name
    protected $table = 'display_category';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [
        'category_id'
    ];

    //protect column from mass assignment so the value won't changed
    protected $guarded = [];

    //hide attributes from model array.
    protected $hidden = ['category'];

    //The accessors to append to the model's array form.
    protected $appends = [
      'recid',
      'category_name'
    ];

    /** define relationship here **/

    /**
     * Get the category that displayed.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
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

    /** end of accessors & mutators **/
}
