<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative_Tasks extends Model
{
    protected $table = 'alternative_tasks';

    protected $fillable = [
        'id','name','alt_steps'
    ];

    public $timestamps = false;
}
