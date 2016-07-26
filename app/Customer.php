<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Customer extends Model
{
    protected $table = 'customer';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='customer_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'first_name',
        'last_name',
        'email',
        'address_id',
        'active',
    ];

    protected $dates = [
        'last_update',
        'create_date'
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
     * override the set date attribute
     * as per the example
     *
     * @param $date
     *
     */
    public function setCreateDateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['create_date'] =  Carbon::parse($date);
        } else {
            $this->attributes['create_date'] =  Carbon::createFromFormat('Y-m-d', $date);
        }
    }


    /**
     * set the active attribute
     *
     * @return void
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Address
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    /**
     * Eloquent relation
     *
     * @return App\Store
     */
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    /**
     * Eloquent relation
     *
     * @return App\Payment colection
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * Eloquent relation
     *
     * @return App\Rental collection
     */
    public function rentals()
    {
        return $this->hasMany('App\Rental');
    }


    /**
     * get the balance for the customer
     * use getBalance
     *
     * @return decimal
     **/
    public function getBalanceAttribute()
    {
        $queryString='select get_customer_balance('.$this->customer_id.',NOW()) as ammount;';
        $ammount=\DB::select($queryString);
        return $ammount[0]->ammount;
    }

    /**
     * get the address name concatenated
     * use addressName
     *
     * change default id field names
     * @return relation
     */
    public function getAddressNameAttribute()
    {
        return $this->address->cityName.', '.$this->address->countryName;
    }

    /**
     * get the full name concatenated first and las name
     * use fullName
     *
     * @return string
     **/
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * get the slug for the URI
     * use slug
     *
     * @return string
     **/
    public function getSlugAttribute()
    {
        return str_slug($this->first_name.' '.$this->last_name, '-');
    }

    /**
     * select customer by the slug
     * use whereSlug()
     *
     * @param  Eloquent $query eloquent class
     * @param  String $value customer criteria as "first_name-last_Name"
     * @return App\Customer        return the customer for the value
     */
    public function scopeWhereSlug($query, $value)
    {
        $names=explode('-', $value);
        return $query->where('first_name', $names[0])->where('last_name', $names[1]);
    }
}
