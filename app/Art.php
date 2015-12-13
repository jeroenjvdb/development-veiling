<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'art';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 	['user_id', 
    						'artist_id', 
    						'date_of_creation',
    						'est_low_price',
    						'est_high_price',
    						'end_datetime',
    						'dimensions',
    						'color',
    						'title',
    						'description_nl',
    						'description_en',
    						'condition_nl',
    						'condition_en'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
