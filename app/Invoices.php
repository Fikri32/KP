<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'invoice_id',
        'notes',
        'total',
        'status',
        'due_date',
        'project'
    ];

    protected $timestamps = false;
}
