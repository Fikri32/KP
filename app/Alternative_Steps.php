<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative_Steps extends Model
{
    protected $table = 'alternative_steps';

    protected $fillable = [
        'id','name','id_project'
    ];

    public $timestamps = false;
}
