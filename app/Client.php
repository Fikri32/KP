<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'client';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'fax',
        'company'
    ];

    public $timestamps = false;

    public function Project()
    {
        return $this->belongsTo('App\Project','client','id');
    }
}
