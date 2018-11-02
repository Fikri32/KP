<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    protected $fillable = [
      'project',
      'desc',
      'paid_at',
      'payment_amount',
    ];

    public $timestamps = false;

    public function Invoices() 
    {
        return $this->hasOne('App\Invoices','Payment_id','id');
    }

    public function Project ()
    {
        return $this->belongsTo('App\Project','id','project');
    }
}
