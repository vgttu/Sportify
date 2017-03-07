<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use Searchable;
    
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
