<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class step extends Model
{
    protected $table = 'divisi';

    protected $fillable = [
        'id_project','nama_divisi','leader'
    ];

    public function Project()
    {
       return $this->belongsTo('App\Project','id','id_project');
    }    

    public function task()
    {
        return $this->hasMany('App\task','id_divisi','id');
    }
}
