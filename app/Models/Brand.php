<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ELoquent Class Brand
 * Created By: TOPP
 */
class Brand extends Model
{
    //database table name
    protected $table = 'brand';

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
