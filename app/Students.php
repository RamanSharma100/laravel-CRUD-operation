<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone',
    ];
}
