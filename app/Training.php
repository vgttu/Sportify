<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use Searchable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'price_min', 'price_max', 'price_type'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'price_min', 'price_max'
    ];

    /**
     * Get the club that owns the training.
     */
    public function club()
    {
        return $this->belongsTo('App\Club');
    }

    /**
     * Get the training price.
     *
     * @return string
     */
    public function getPriceAttribute()
    {
        if (! is_null($this->price_min)) {
            $price = $this->price_min;

            if (! is_null($this->price_max)) {
                $price .= ' - ' . $this->price_max;
            }

            return $price;
        }

        return null;
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $array['club'] = $this->club;

        return $array;
    }
}
