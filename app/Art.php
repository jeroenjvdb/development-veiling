<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function artist()
    {
        return $this->belongsTo('App\Artist', 'artist_id', 'id');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid', 'art_id', 'id');
    }

    public function myWatchlist()
    {
        if(Auth::check() && Watchlist::where('user_id', Auth::user()->id)->where('art_id', $this->id)->exists())
        {
            return true;
        } else
        {
            return false;
        }
    }

    public function sold()
    {
        return $this->hasMany('App\Sold', 'art_id', 'id');
    }

    public function pictures()
    {
        return $this->hasMany('App\Picture', 'art_id', 'id');
    }
}
