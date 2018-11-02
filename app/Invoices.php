<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'Payment_id',
        'notes',
        'status',
        'due_date'
    ];

    protected $timestamps = false;

    public function Payments ()
    {
        return $this->belongsTo('App\payments','id','Payment_id');
    }
}
