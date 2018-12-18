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
        'client',
        'tanggal_mulai',
        'deadline',
        'settings'
    ];

    public function User()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function Settings()
    {
        return $this->belongsTo('App\Settings','settings','id');
    }

    public function Tasks()
    {
        return $this->hasMany('App\Tasks','project','id');
    }

    public function Client()
    {
        return $this->hasOne('App\Client','id','client');
    }

    public function Payments()
    {
        return $this->hasMany('App\Payments','project','id');
    }

}
