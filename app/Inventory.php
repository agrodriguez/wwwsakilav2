<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventory';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='inventory_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'store_id'
    ];

    protected $dates = [
        'last_update'
    ];

    protected $dateFormat ='Y-m-d';

    /**
     * override the set date attribute
     * as per the example
     *
     * @param $date
     *
     */
    public function setLastUpdateAttribute($date)
    {
        $myDate = Carbon::createFromFormat($this->dateFormat, $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['last_update'] =  Carbon::parse($date);
        } else {
            $this->attributes['last_update'] =  Carbon::createFromFormat($this->dateFormat, $date);
        }
    }

    /**
     * Eloquent relation
     *
     * @return App\Film
     */
    public function film()
    {
        return $this->belongsTo(Film::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Store
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Rental colection
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
