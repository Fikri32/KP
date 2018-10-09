<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $hidden = [
        'kd_jabatan',
        'id_kategory'
    ];

    public function intdiv()
    {
        return $this->belongsTo('App\intDiv','id','id_kategory');
    }

    public function User()
    {
        return $this->belongsTo('App\User','tugas','id');
    }
}

