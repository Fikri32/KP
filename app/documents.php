<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'id',
        'nama_document',
        'url',
        'attached_at',
        'task',
        'deskripsi',
        
    ];

    public $timestamps = false;

    public function Tasks()
    {
        return $this->belongsTo('App\Tasks','id','task');
    }

    // public function Alternative_Tasks()
    // {
    //         return $this->hasMany('App\Alternative_Tasks','id','alt_task');
    // }

}

