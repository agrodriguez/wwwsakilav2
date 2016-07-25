<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * override default table name, index field
     * and timestaps to
     * for use with the database AS IS
     */
    protected $table = 'staff';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='staff_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    /**
     * defina fillable fields
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'address_id',
        'email',
        'store_id',
        'active',
        'username',
        'password',
        'picture',
    ];

    /**
     * define the dates fields
     */
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
     * set the active attribute
     *
     * @return void
     * @author
     **/
    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = $value? 1 : 0;
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
     * @return relation
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    /**
     * relation
     *
     * @return relation
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function manages()
    {
        return $this->hasOne(Store::class, 'manager_staff_id', 'staff_id');
    }

    /**
     * relation
     *
     * change default id field names
     * @return relation
     */
    public function getAddressNameAttribute()
    {
        return $this->address->cityName.', '.$this->address->countryName;
    }

    /**
     * get the full name
     *
     * @return string
     **/
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * get the full name of the customer
     *
     * @return string
     **/
    public function getSlugAttribute()
    {
        return str_slug($this->first_name.' '.$this->last_name, '-');
    }
    
    /**
     * get the store manager and all the other staff that is not manager in other store
     *
     * @param Staff $query staff query scope
     * @return Query
     **/
    public function scopeGetNotManager($query)
    {
        return $query->select(\DB::raw('staff_id, concat(first_name," ", last_name) as name, store.*'))
        ->leftJoin('store', 'store.manager_staff_id', '=', 'staff.staff_id')
        ->whereNull('manager_staff_id')
        ->orWhereColumn('manager_staff_id', 'staff_id');
        /**
         * is the same as
         * select staff_id, concat(first_name," ", last_name) as name, store.* from staff
         * left join store on store.manager_staff_id = staff.staff_id
         * where manager_staff_id is null or manager_staff_id=staff_id and store.store_id=4
         *
         */
    }


    /**
     * return the staff record from the given slug
     * @param  Staff $query scope for the staff
     * @param  String $value the slug value as "first_name-last_name"
     * @return Staff query the filtered query
     */
    public function scopeWhereSlug($query, $value)
    {
        $names=explode('-', $value);
        return $query->where('first_name', $names[0])->where('last_name', $names[1]);
    }
}
