<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Address extends Model
{
    protected $table = 'address';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='address_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'address',
        'address2',
        'district',
        'city_id',
        'postal_code',
        'phone',
        'location'
    ];

    protected $dates = [
        'last_update'
    ];

    /**
     * location is a point geofild to store the lat-long
     * @var array
     */
    protected $geofields = ['location'];


    /**
     * override the set date attribute
     * as per the example
     *
     * @param $date
     * @return void
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
     * override the set location attribute
     *
     * @param POINT $value
     * @return void
     **/
    public function setLocationAttribute($value)
    {
            $value=empty($value)?'0,0':$value;
            $this->attributes['location'] = DB::raw("POINT($value)") ;
    }

    /**
     *  get tke location value as string
     *
     * @param  POINT $value
     * @return string
     */
    public function getLocationAttribute($value)
    {
 
        $loc = substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ', ', $loc, 1);
 
        return substr($loc, 0, -1);
    }

    /**
     * query database geofields
     *
     * @return void
     **/
    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach ($this->geofields as $column) {
            $raw .= ' astext('.$column.') as '.$column.' ';
        }
 
        return parent::newQuery($excludeDeleted)->addSelect('*', DB::raw($raw));
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\City
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Customer
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Staff
     */
    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    /**
     * get the city name
     * use cityName
     *
     * @return String
     **/
    public function getCityNameAttribute()
    {
        return $this->city->city;
    }

    /**
     * get the country name
     * use countryName
     *
     * @return String
     **/
    public function getCountryNameAttribute()
    {
        return $this->city->country->country;
    }
}
