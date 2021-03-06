<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='city_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['city', 'country_id'];

    protected $dates = [
        'last_update'
    ];

    /**
     * override the set date attribute
     * as per the example
     *
     * @param $date
     *
     */
    public function setLastUpdateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['last_update'] =  Carbon::parse($date);
        } else {
            $this->attributes['last_update'] =  Carbon::createFromFormat('Y-m-d', $date);
        }
    }

    /**
     * Eloquent relation
     *
     * @return App\Address colection
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * get the country name
     * use countryName
     *
     * @return String
     **/
    public function getCountryNameAttribute()
    {
        return $this->country->country;
    }

    /**
     * return cities ordered by country
     * use orderByCountry
     *
     * @param Eloquent $query the eloquent query
     * @return App\City collection
     **/
    public function scopeOrderByCountry($query)
    {
        return $query->select(\DB::raw('city.*, country.country as countryName'))
        ->join('country', 'city.country_id', '=', 'country.country_id')
        ->orderBy('countryName')
        ->orderBy('city');
    }
}
