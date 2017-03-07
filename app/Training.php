<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'price_min', 'price_max', 'price_type'
    ];

    /**
     * Get the club that owns the training.
     */
    public function club()
    {
        return $this->belongsTo('App\Club');
    }
}
