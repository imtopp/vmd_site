<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Class Gender
 * Created By: TOPP
 */
class Gender extends Model
{
    //database table name
    protected $table = 'gender';

    //disable updated_at and created_at
    public $timestamps = false;

    //column that can mass assigned (filled)
    protected $fillable = [];

    //protect column from mass assignment so the value won't changed
    protected $guarded = ['name'];

    /** define relationship here **/

    /**
     * Get the product of category.
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product','gender_id','id');
    }

    /** end of relationship **/

    /** define accessors & mutators **/

    /** end of accessors & mutators **/
}
