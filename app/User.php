<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','longitude','latitude','id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

public  function getLongitudeAttribute()
{
    return  $this->attributes['longitude'];

}

    public function getId()
    {
        return $this->attributes['id'];
    }
    public  function getLatitudeAttribute()
    {
        return  $this->attributes['latitude'];

    }


    public function graines()
    {
        return $this->belongsToMany('App\Plant','graines')->withPivot('position','id')->withTimestamps();
    }

    public function PlantesPlanted()
    {
        return $this->belongsToMany('App\Plant','planted')->withPivot('X','Y','sync','id')->withTimestamps();
    }




}
