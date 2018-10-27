<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class p_struct_staff extends Model
{
    protected $table = 'project_structure_staff';

    protected $fillable = [
        'id_project_structure',
        'staff',
    ];

    protected $timestamps = false;
}
