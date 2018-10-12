<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class step extends Model
{
    protected $table = 'divisi';

    protected $fillable = [
        'id_project','nama_divisi'
    ];

    public function Project()
    {
       return $this->belongsTo('App\Project','id','id_project');
    }    
}
