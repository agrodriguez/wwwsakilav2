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
     * relation
     *
     * @return relation
     */
    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function manager()
    {
        return $this->belongsTo('App\Staff', 'staff_id', 'manager_staff_id');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function getStoreName()
    {
        return $this->address->city->city.', '.$this->address->city->country->country;
    }
}
