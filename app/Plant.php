<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Plant extends Model
{
    protected $table = 'plant';

    public $timestamps = false;


    protected $fillable = ['Libelle', 'Age', 'Description', 'Image'
    ];


    public function getLibelleAttribute()
    {
        return $this->attributes['Libelle'];

    }


    public function getAgeAttribute()
    {
        return $this->attributes['Age'];

    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['Description'];

    }

    public function getImageAttribute()
    {
        return $this->attributes['Image'];

    }

    public function Users()
    {
        return $this->belongsToMany('App\User', 'graines', 'plant_id', 'user_id');
    }

    public function UsersForPlanted()
    {
        return $this->belongsToMany('App\User', 'planted', 'plant_id', 'user_id');
    }



}




