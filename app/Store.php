<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='store_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['manager_staff_id', 'address_id'];

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
     * @return App\Address
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Staff
     */
    public function manager()
    {
        return $this->belongsTo('App\Staff', 'manager_staff_id', 'staff_id');
    }

    /**
     * Eloquent relation
     *
     * @return App\Staff colection
     **/
    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Customer colection
     **/
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Inventory colection
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * Eloquent films relation Through inventories
     *
     * @return App\Film colection
     */
    public function films()
    {
        return $this->hasManyThrough(Film::class, Inventory::class, 'store_id', 'film_id');
    }

    /**
     * get the store name concatenated
     *
     * @return String
     */
    public function getStoreNameAttribute()
    {
        return $this->address->cityName.', '.$this->address->countryName;
    }

    /**
     * get the manager name concatenated
     *
     * @return String
     **/
    public function getManagerNameAttribute()
    {
        try {
            if (!is_null($this->manager)) {
                return $this->manager->first_name.' '.$this->manager->last_name;
            } else {
                return '';
            }
        } catch (Exeption $e) {
            return $e;
        }

    }
}
