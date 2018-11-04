<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    protected $table = 'steps';

    protected $fillable = [
        'id',
        'name',
        'setting_id',
        'leader',
    ];

    public $timestamps = false;

    public function Settings()
    {
        return $this->belongsTo('App\Settings','id','setting_id');
    } 

    public function Tasks()
    {
        return $this->belongsTo('App\Tasks','Steps_id','id');
    }

    public function User(){
        return $this->hasOne('App\User','id','leader');
    }
}
