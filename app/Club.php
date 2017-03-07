<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'address', 'lat', 'long'
    ];

    /**
     * Get the trainings for the club.
     */
    public function trainings()
    {
        return $this->hasMany('App\Training');
    }
}
