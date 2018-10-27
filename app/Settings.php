<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'name','company'
    ];

    public $timestamps = false;

    public function Project ()
    {
       return $this->hasOne('App\Projects','id','settings');
    }

    public function Steps()
    {
        return $this->HasMany('App\Steps','setting_id','id');
    }
}
