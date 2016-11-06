<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function options() 
    {
        return $this->hasMany('App\Option');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_correct')->withTimestamps();
    }
}
