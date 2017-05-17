<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weather extends Model
{
    public $timestamps = false;

    protected $fillable =[
        'Temperature','Wind','WindDirection','Humidity','Rain','user_id'
    ];

    public function getTemperatureAttribute()
    {
        return  substr($this->attributes['Temperature'],0,4);
    }
    public function getWindAttribute()
    {
        return  substr($this->attributes['Wind'],0,4);
    }
    public function getWindDirectionAttribute()
    {
        return  substr($this->attributes['WindDirection'],0,4);
    }
    public function getHumidityAttribute()
    {
        return  substr($this->attributes['Humidity'],0,4);
    }
    public function getRainAttribute()
    {
        return  substr($this->attributes['Rain'],0,4);
    }

public function user()
{
    return $this->hasOne('app\User', 'foreign_key', 'user_id');

}


}
