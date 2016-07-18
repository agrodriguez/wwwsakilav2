<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='actor_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name'
    ];

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
     * change default id field names
     * @return relation
     */
    public function films()
    {
        return $this->belongsToMany('App\Film', 'film_actor', 'actor_id', 'film_id');
    }

    /**
     * get the full name of the customer
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
     * [scopeWhereSlug description]
     * @param  [type] $query [description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function scopeWhereSlug($query, $value)
    {
        $names=explode('-', $value);
        return $query->where('first_name', $names[0])->where('last_name', $names[1]);
    }
}
