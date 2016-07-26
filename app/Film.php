<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'film';

    /**
     * change default primary key
     * @var string
     */
    protected $primaryKey ='film_id';

    /**
     * set timestaps to false
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'language_id',
        'original_language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];

    protected $dates = [
        'last_update'
    ];

    /**
     * Set the last update date attribute
     *
     * @param  $date
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
     * @return App\Inventory colection
     */
    public function inventories()
    {
        return $this->hasMany('App\Inventory');
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Category colection
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'film_category', 'film_id', 'category_id');
    }

    /**
     * Eloquent relation
     *
     * change default id field names
     * @return App\Actor colection
     */
    public function actors()
    {
        return $this->belongsToMany('App\Actor', 'film_actor', 'film_id', 'actor_id');
    }

    /**
     * Eloquent relation
     *
     * @return App\Language
     */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }

    /**
     * Eloquent relation
     *
     * @return App\Language
     */
    public function originalLanguage()
    {
        return $this->belongsTo('App\Language', 'original_language_id', 'language_id');
    }

    
    /**
     * get the relation in list form
     * use categoryList
     *
     * @return array
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->lists('category_id')->all();
    }

    /**
     * get the relation in list form
     * use actorList
     *
     * @return array
     */
    public function getActorListAttribute()
    {
        return $this->actors->lists('actor_id')->all();
    }

    /**
     * set the set field as imploded array
     *
     * @return void
     */
    public function setSpecialFeaturesAttribute($array)
    {
        $this->attributes['special_features'] = implode(',', $array);
    }

    /**
     * get the relation in list form as exploded array
     *
     * @return array
     */
    public function getSpecialFeaturesAttribute()
    {
        return explode(',', $this->attributes['special_features']) ;
    }
}
