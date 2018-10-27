<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'id',
        'url',
        'attached_at',
        'task',
        'alt_task'
    ];

    public $timestamps = false;
}
