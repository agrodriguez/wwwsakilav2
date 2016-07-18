<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Rental extends Model
{
    protected $table = 'rental';
    
    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='rental_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id'
    ];

    protected $dates = [
        'last_update',
        'rental_date',
        'return_date'
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
    public function setRentalDateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['rental_date'] =  Carbon::parse($date);
        } else {
            $this->attributes['rental_date'] =  Carbon::createFromFormat('Y-m-d', $date);
        }
    }

    /**
     * override the set date attribute
     * as per the example
     *
     * @param $date
     *
     */
    public function setReturnDateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['return_date'] =  Carbon::parse($date);
        } else {
            $this->attributes['return_date'] =  Carbon::createFromFormat('Y-m-d', $date);
        }
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function getCustomerNameAttribute()
    {
        return $this->customer->first_name.' '.$this->customer->last_name;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function getStaffNameAttribute()
    {
        return $this->staff->first_name.' '.$this->staff->last_name;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function getFilmTitleAttribute()
    {
        return $this->inventory->film->title;
    }

    /**
     * get the correct money format
     * @return string number 2 decimals with sign
     */
    public function getTotalAttribute()
    {
        return $this->payments->sum('amount');
    }


    /**
     * relation
     *
     * @return relation
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }


    /**
     * relation
     *
     * @return relation
     */
    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }

    /**
     * relation
     *
     * @return relation
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}
