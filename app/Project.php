<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'nama_project',
        'status_konfirmasi',
        'deskripsi_project',
        'user_id',
        'company_id',
        'client_company',
        'tanggal_mulai',
        'deadline',
    ];

    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }

}
