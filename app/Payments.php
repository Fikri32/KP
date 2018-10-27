<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'id',
        'desc',
        'paid_at',
        'total',
        'invoice',
    ];

    protected $timestamps = false;
}
