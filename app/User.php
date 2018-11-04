<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token','company','role','position','nip','image','tugas'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token','company','role','position'
    ];

    public function Project()
    {
        return $this->belongsTo('App\Project','user_id');
    }

    public function Divisi()
    {
        return $this->hasOne('App\Divisi','id','tugas');
    }

    public function Tasks ()
    {
        return $this->belongsTo('App\Tasks','handler','id');
    }

    public function Profile()
    {
        return $this->hasOne('App\Profile','user','id');
    }

    public function Steps()
    {
        return $this->belongsTo('App\Steps','leader','id');
    }

}
