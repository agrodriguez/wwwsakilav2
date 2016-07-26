<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Payment extends Model
{
    protected $table = 'payment';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='payment_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $dates = [
        'last_update',
        'payment_date'
    ];

    protected $fillable = [
        'customer_id',
        'staff_id',
        'rental_id',
        'amount'
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
    public function setPaymentDateAttribute($date)
    {
        $myDate = Carbon::createFromFormat('Y-m-d', $date);
        if ($myDate > Carbon::now()) {
            $this->attributes['payment_date'] =  Carbon::parse($date);
        } else {
            $this->attributes['payment_date'] =  Carbon::createFromFormat('Y-m-d', $date);
        }
    }

    /**
     * get the customer name concatenated
     * use customerName
     *
     * @return String
     **/
    public function getCustomerNameAttribute()
    {
        return $this->customer->first_name.' '.$this->customer->last_name;
    }

    /**
     * get the staff name concatenated
     * use staffName
     *
     * @return String
     **/
    public function getStaffNameAttribute()
    {
        return $this->staff->first_name.' '.$this->staff->last_name;
    }

    /**
     * Eloquent relation
     *
     * @return App\Customer
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Eloquent relation
     *
     * @return App\Rental
     */
    public function rental()
    {
        return $this->belongsTo('App\Rental');
    }

    /**
     * Eloquent relation
     *
     * @return App\Staff
     */
    public function staff()
    {
        return $this->belongsTo('App\Staff');
    }
}
