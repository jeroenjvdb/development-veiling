<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pictures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['art_id', 'url'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;
}
