<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{

    protected $fillable =[
        'up','down','left','right','camera','zoom_in','zoom_out','user_id','GoToX','GoToY','GoToZ','speed'
    ];

    public function user()
    {
        return $this->hasOne('app\User', 'foreign_key', 'user_id');

    }
}
