<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class intDiv extends Model
{
    protected $table = 'jenis_proyek';

    public function Divisi()
    {
        return $this->HasMany('App\Divisi','id_kategory','id');
    }
}


