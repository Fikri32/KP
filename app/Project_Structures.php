<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_Structures extends Model
{
    protected $table = 'project_structures';

    protected $fillable = [
        'id',
        'step',
        'project'
    ];

    public $timestamps = false;

}
