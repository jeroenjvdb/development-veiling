<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'watchlist';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'art_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;

    public function art()
    {
        return $this->belongsTo('App\Art', 'art_id', 'id');
    }
}
