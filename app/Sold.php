<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sold extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sold';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['buyer_id', 'art_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function auction()
    {
    	return $this->belongsTo('App\Art', 'art_id', 'id');
    }
}
