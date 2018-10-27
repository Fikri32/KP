<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'name',
        'Steps_id',
        'project',
        'handler',
        'deadline',
        'finished_at',
        'status',
    ];

    public $timestamps = false;

    public function Steps()
    {
        return $this->hasOne('App\Steps','id','Steps_id');
    }

    public function Project()
    {
        return $this->hasOne('App\Project','id','project');
    }

    public function User()
    {
        return $this->hasOne('App\User','id','handler');
    }

}
