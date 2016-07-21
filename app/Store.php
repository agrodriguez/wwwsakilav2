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
        return $this->belongsTo(Address::class);
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function manager()
    {
        return $this->belongsTo('App\Staff', 'manager_staff_id', 'staff_id');
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function getStoreNameAttribute()
    {
        return $this->address->cityName.', '.$this->address->countryName;
    }

    /**
     * undocumented function
     *
     * @return void
     * @author     **/
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
