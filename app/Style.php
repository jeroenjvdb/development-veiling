<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'styles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public $timestamps = false;
}
