<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='language_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['name'];

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
     * @return App\Film colection
     */
    public function films()
    {
        return $this->hasMany('App\Film');
    }
}
