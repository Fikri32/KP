<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table = 'tasklist';

    protected $fillable = [
        'id_divisi','task'
    ];

    public function step()
    {
        return $this->belongsTo('App\step','id_divisi','id');
    }
}
